<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Halaman Admin</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
	
    <!-- Toggles CSS -->
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
	

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
	
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="nav-link font-24 pl-0" href="/admin">Halaman Admin</a>
            <ul class="navbar-nav hk-navbar-content">
            <li class="nav-item">
	                    <a class="nav-link font-16" href="/home">Home</a>    
	                </li>
               <li class="nav-item">
                    <a class="nav-link font-16" href="/" >Logout</a>    
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->
	

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                              <a class="nav-link" href="/audittrail" >
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Log Aktivitas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/daftar_pengguna" >
                                <span class="feather-icon"><i data-feather="users"></i></span>
                                <span class="nav-link-text">Daftar Pengguna</span>
                            </a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="/daftar_lokasi" >
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Daftar Lokasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#harga_drp">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Daftar Harga</span>
                            </a>
                            <ul id="harga_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/harga_astinet">Astinet</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="invoice.html">Astinet Lite</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="gallery.html">Astinet BB</a>
                                        </li>
                                        <li class="nav-item @yield('IPtransit-drp')">
	                                            <a class="nav-link" href="/harga_IPtransit">IP Transit</a>
	                                        </li>
	                                        <li class="nav-item @yield('IPtransitbb-drp')">
	                                            <a class="nav-link" href="/harga_IPtransitbb">IP Transit BB</a>
	                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-50 mt-35">
               <!-- Row -->
                <div class="row pl-10">
                    <div class="col-xl-12">
                        <div class="hk-row">
							<div class="col-sm-6">
                                <div class="card card-sm">
                                    <div class="card-body text-secondary">
                                        <h5 class="card-title text-dark">Log Aktivitas</h5>
                                        <p class="card-text" align ="justify">Halaman ini berguna untuk memperlihatkan aktivitas para pengguna seperti waktu dan menu yang dipilih ketika menggunakan web kalkulator astinet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
								<div class="card card-sm">
									<div class="card-body text-secondary">
                                        <h5 class="card-title text-dark">Daftar Pengguna</h5>
                                        <p class="card-text" align ="justify">Halaman ini berguna untuk menambahkan, mengubah atau menghapus data pengguna/user yang dapat mengakses web kalkulator astinet yang ada pada database</p>
                                    </div>
								</div>
							</div>
							
						</div>
					</div>
                </div>
                 <div class="row pl-10">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-sm-6">
                                <div class="card card-sm">
                                    <div class="card-body text-secondary">
                                        <h5 class="card-title text-dark">Daftar Lokasi</h5>
                                        <p class="card-text" align ="justify">Halaman ini berguna untuk menambahkan, mengubah atau menghapus data daftar lokasi untuk kalkulator astinet yang ada pada database</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-sm">
                                   <div class="card-body text-secondary">
                                        <h5 class="card-title text-dark">Daftar Harga</h5>
                                        <p class="card-text" align ="justify">Halaman ini berguna untuk menambahkan, mengubah atau menghapus data daftar harga beserta dengan besaran bandwidth untuk kalkulator astinet yang ada pada database</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /HK Wrapper -->

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

    <!-- Toggles JavaScript -->
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    
	<!-- Counter Animation JavaScript -->
	<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
   
    
    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard2-data.js"></script>
	
</body>

</html>