<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend-asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Custom styles for this template-->
    <link href="{{asset('backend-asset/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="{{asset('backend-asset/js/axios.min.js')}}"></script>
    <script src="{{asset('backend-asset/js/script.js')}}"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.parts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.parts.top')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('admin')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.parts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin.parts.logout')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend-asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend-asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend-asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend-asset/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('backend-asset/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend-asset/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('backend-asset/js/demo/chart-pie-demo.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
		
    	$(document).ready(function(){

			@if(Session::has('message'))
             	var type ="{{Session::get('alert-type','info')}}"
             	switch(type){
                 	case 'info':
                     	toastr.info(" {{Session::get('message')}} ");
                     	break;
                 	case 'success':
                     	toastr.success(" {{Session::get('message')}} ");
                     	break;
                 	case 'warning':
                    	 toastr.warning(" {{Session::get('message')}} ");
                    	 break;
                 	case 'error':
                     	toastr.error(" {{Session::get('message')}} ");
                     	break;
             	}
         	@endif

			

			


		});
	</script>
</body>

</html>