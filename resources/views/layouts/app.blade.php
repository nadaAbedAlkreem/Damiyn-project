<!DOCTYPE html>

<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>projects</title>

	<!-- ** Mobile Specific Metas ** -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Agency HTML Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Classified Marketplace Template v1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- theme meta -->
	<meta name="theme-name" content="classimax" />
 

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

	<!-- favicon -->
	<link href="images/favicon.png" rel="shortcut icon">
 
	<!-- 
  Essential stylesheets
  =====================================-->
  @include('asset.css')


</head>

<body class="body-wrapper">
	<header>
    @include('components.header')
    </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('components.footer')
    @include('asset.js')
 
	<script type="text/javascript">

$('#SubmitFormOrder').on('submit',function(e){
e.preventDefault();
let auth_check = $('#auth').val();
if(auth_check)
{
let phone = $('#recipient-name').val();
let type_order= $('.form-select option:selected').val();
let details = $('#message-text').val();
console.log(name);
var token = $("meta[name='csrf-token']").attr("content");

// Set CSRF in header
// $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

$.ajax({
 url: "order",
 method:"post",
 cache: false,

 data:{
	phone:phone,
   type_order:type_order,
   details:details,
   "_token": token,

  },
 success:function(response){
   $('#successMsg').show();
   console.log(response);

   swal({
        title:  'نجحت عملية ارسال الطلب ',
         icon: "success",
        buttons: true,
        dangerMode: false,
    })

 },
 error: function(response ) {
  var jsonData = response.responseJSON.message;
 console.log(jsonData);  

swal({
        title:  jsonData ,
         icon: "warning",
        buttons: true,
        dangerMode: true,
    })

 },
 });

}else{
   window.location.href = "login";
}
});
</script>
</body>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</html>
