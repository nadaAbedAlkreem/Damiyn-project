<?php
use App\Models\Order ; 
use Illuminate\Support\Facades\Auth;



if(!function_exists('TotalNumberOfUserOrders')){ 
    function TotalNumberOfUserOrders(){
        $id =  Auth::user()->id  ; 
         $total_number_order = Order::with('users')
         ->select('*')
         ->where('orders.user_id' , $id);
               return $total_number_order->count(); 
    }
}
 


if(!function_exists('TotalNumberOfProgressOrders')){ 
    function TotalNumberOfProgressOrders(){
        $id =  Auth::user()->id  ; 
         $rotal_number_of_progress_order =
          Order::with('users')->select('*')
         ->where('orders.user_id' , $id)
         ->where('status_order' , 'Progress');
               return $rotal_number_of_progress_order->count(); 
    }
}
if(!function_exists('TotalNumberOfWaitOrders')){ 
    function TotalNumberOfWaitOrders(){
        $id =  Auth::user()->id  ; 
         $rotal_number_of_wait_order =
          Order::with('users')->select('*')
         ->where('orders.user_id' , $id)
         ->where('status_order' , 'Wait');
               return $rotal_number_of_wait_order->count(); 
    }
}
if(!function_exists('TotalNumberOfCompleteOrders')){ 
    function TotalNumberOfCompleteOrders(){
        $id =  Auth::user()->id  ; 
         $rotal_number_of_complete_order =
          Order::with('users')->select('*')
         ->where('orders.user_id' , $id)
         ->where('status_order' , 'Complete');
               return $rotal_number_of_complete_order->count(); 
    }
}
 
 
 





?>