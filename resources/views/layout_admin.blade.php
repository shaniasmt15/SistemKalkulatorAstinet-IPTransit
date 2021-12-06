<!DOCTYPE html>
<!-- 
Template Name: Griffin - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Support: support@hencework.com

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<?php  ?>

<html lang="en">
    <style>
        .d-none{
            display: none;
        }
    </style>
	
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Daftar Pengguna</title>
		<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- Morris Charts CSS -->
		<link href="vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />

		<!-- Toggles CSS -->
		<link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
		<link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

		<!-- Toastr CSS -->
		<link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<!-- Preloader -->
		<div class="preloader-it">
			<div class="loader-pendulums"></div>
		</div>
        
        <div class="hk-wrapper hk-alt-nav hk-icon-nav">
            <nav class="navbar navbar-expand-xl navbar-dark bg-red fixed-top hk-navbar hk-navbar-alt pb-5">
                <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
                <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                    <ul class="navbar-nav">
                         <li class="nav-item @yield('display-home')">
                            <a class="nav-link font-18 pr-20 @yield('beranda-nav')" href="{{ URL::to('home') }}">Home</a>
                        </li>
                        <li class="nav-item @yield('display-astinet')">
                            <a class="nav-link font-18 pr-20 @yield('astinet-nav')" href="{{ URL::to('astinet') }}">Astinet</a>
                        </li>
                        <li class="nav-item @yield('display-astinetlite')">
                            <a class="nav-link font-18 pr-20 @yield('astinetlite-nav')" href="{{ URL::to('astinetlite') }}">Astinet Lite</a>
                        </li>
                         <li class="nav-item @yield('display-astinetbb')">
                            <a class="nav-link font-18 @yield('astinetbb-nav')" href="{{ URL::to('astinetbb') }}">Astinet BB</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav hk-navbar-content">
                    <li class="nav-item dropdown dropdown-authentication">
                        <a class="nav-link dropdown-toggle font-18 " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengaturan</a>
                        <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <!--<a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-edit"></i><span>Ubah Password</span></a>-->
                            <a class="dropdown-item" href="/ubah_password"><i class="dropdown-icon zmdi zmdi-edit"></i><span>Ganti Password</span></a>
                            <a class="dropdown-item" href="/logout_process"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
		

		<!-- /Preloader -->
		@yield('content')
		
		
		<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Data Table JavaScript -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>

    <!-- Toggles JavaScript -->
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
	
	<!-- Toastr JS -->
    <script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    
	<!-- Counter Animation JavaScript -->
	<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
	
	 <!-- Tablesaw JavaScript -->
    <script src="vendors/tablesaw/dist/tablesaw.jquery.js"></script>
    <script src="dist/js/tablesaw-data.js"></script>
   
    
    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard2-data.js"></script>

		@yield('javascript')
		

	</body>
</html>