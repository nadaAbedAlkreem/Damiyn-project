<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest ; 
use App\Models\Order ;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Validator;
use DataTables;
class OrdersController extends Controller
{
  

        
   public function actionAddOrder(OrderRequest  $request)
    {
   
   
    $order = new Order;
    $order->code = $request->type_order.substr((string)Str::uuid() , 0 , 4) ;
    $order->mobile_phone_vendor = $request->phone;
    $order->status_order ="wait";
     
    $order->type_order = $request->type_order;
    $order->description = $request->details;
    $order->user_id  = Auth::id()  ;
    $save =$order->save();
    if($save){
    return response()->json(['success'=>'Successfully']);

       }else{
        return response()->json(['error'=>$validator->errors()]);

             } 
    }  
   public function showOrders(Request $request)
   {

    $id =  Auth::user()->id  ; 

    if ($request->ajax()) 
    {
        $data = Order::with('users')->select('*')->where('orders.user_id' , $id);
        return Datatables::of($data)
                ->addIndexColumn()
                
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('type_order'))  ) {
                        $instance->where('type_order', $request->get('type_order'));
                    }
                   if (!empty($request->get('search')) ) { 
                      $search =$request->get('search');
                     $instance->where('code','like' , "%$search%");
                 }
                   })
 
                ->addColumn('created_at', function ($data) {  
                    return  date('d M Y', strtotime($data->created_at)); 
               
                })

                ->addColumn('status_order', function ($data) { 

                    if($data->status_order == "Wait"){
                        return'<td><button class="btn btn-payment">بإنتظار الدفع</button></td>'; 

                    }elseif($data->status_order == "Complete"){
                        return'<td class="text-center"><button class="btn btn-finish">مكتمل </button></td>' ; 

                    }else{
                     return '<td><button class="btn btn-waiting">قيد التنفيد</button></td>' ;

                    }
                        })
                ->addColumn('type_order', function ($data) { 
                    if($data->type_order == 'p'){
                        return   '<td>منتج</td> '; 

                    }else{
                        return   '<td>خدمة</td> '; 

                    }
                      })
                 ->addColumn('description', function ($data) { 
                    
                            return 
                           '<td> <a data-bs-toggle="modal" data-bs-target="#exampleModal3" 
                           data-bs-whatever="@mdo" 
                           data-des="'.$data->description.'"     
                           data-code="'.$data->code.'"
                           id="show_des" 
                           class="show"   
                           >مشاهدة التفاصيل</a> </td>'; 
                          })
                          
                ->addColumn('mobile_phone_vendor', function ($data) { 
                            return 
                            '<td>+966 '.$data->mobile_phone_vendor.'</td>'
 
                            ; 
                           })
                           
                ->rawColumns([ 'status_order'  ,'type_order'  , 'description' , 'mobile_phone_vendor'])
                ->make(true);
    }
  
    return view('orders');

   }   

   public function view(Request $request)
   {
        // return $request->all();
        $data = Order::with('users')->select('*');
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                        
                    ->filter(function ($instance) use ($request) {
 
                          if (!empty($request->get('type_order')) &&  $request->get('type_order') != -1 )  {
                             $instance->where('type_order', $request->get('type_order'));
                          }
                          if (!empty($request->get('status')) &&  $request->get('status') != -1 )  {
                            $instance->where('status_order', $request->get('status'));
                          }
                            if (!empty($request->get('search')))
                           {
                             $search = $request->get('search');
                             $instance->whereHas('users', function ($query) use ($search) 
                             {
                                   $query->where('name', 'like', "%$search%");
                             });
                             $instance->orWhere('code','like', "%$search%");

                           }

                     
                       })
                    ->addColumn('create', function ($data)
                    {  
                        return  date('d M Y', strtotime($data->created_at)); 
                
                    })
                    ->addColumn('action', function ($data)
                    {
                        return '
                        <button name="bstable-actions" class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg> </button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        ';
                    })
                    ->addColumn('status', function ($data) 
                    { 

                        if($data->status_order == "Wait"){
                            return'<td><button class="btn btn-payment">   wait</button></td>'; 

                        }elseif($data->status_order == "Complete"){
                            return'<td class="text-center"><button class="btn btn-finish"> complete </button></td>' ; 

                        }else{
                        return '<td><button class="btn btn-waiting"> progress  </button></td>' ;

                        }
                    })
                ->addColumn('type', function ($data)
                    { 

                    return$data->type_order; 
                
                    })
                    ->addColumn('user', function ($data)
                    { 
                            return  $data->users->name ; 
                    
                    })
                    ->addColumn('description', function ($data) { 
                        
                                return 
                            '<td> <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" 
                            data-bs-whatever="@mdo" 
                            data-des="'.$data->description.'"     
                            data-code="'.$data->code.'"
                            id="show_des" 
                            class="show"   
                            >مشاهدة التفاصيل</a> </td>'; 
                            })
                            
                    ->addColumn('mobile', function ($data) { 
                                return 
                                '<td>+966 '.$data->mobile_phone_vendor.'</td>'

                                ; 
                            })
                            
                    ->rawColumns(['description' , 'mobile'  ,'action'  , 'status'  ])
                    ->make(true);

                }
        
        return view('dashborad.orders.view');

 
   }


    public function delete($id)
    {
            $result =  Order::find($id)->delete($id);
        
            if($result)
            {
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
            }else
            {
            return response()->json([
                'falid ' => 'Record deleted falid!'
            ]);
            }
   
    }







}
