<!DOCTYPE html>
<!-- 
Template Name: Griffin - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Support: support@hencework.com

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">

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
    <!-- /Preloader -->
	
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
           <a class="nav-link font-24" href="/admin">Halaman Admin</a>
            <ul class="navbar-nav hk-navbar-content">
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
                        <li class="nav-item active">
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
                                            <a class="nav-link" href="/harga_astinetlite">Astinet Lite</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/harga_astinetbb">Astinet BB</a>
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
            <div class="container-fluid mt-xl-50 mt-sm-30 ml-10 mt-25">
               <!-- Row -->
                <div class="row pb-20 pr-10">
                    <div class= "col-12">
                        <button id="btn_submit" style="float: right" class="btn btn-outline-red btn-right" type="submit" data-toggle="modal" data-target="#add_new_pengguna">Tambah Data Baru</button>
                    </div>
                </div>
                <div class="row pr-10">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div id="datable_1_wrapper" class="dataTables_wrapper dt-bootstrap4 ">
                                            <table id="user" class="table table-striped w-100 mb-50 dataTable dtr-inline " role="grid" aria-describedby="datable_1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="user" aria-sort="ascending" aria-label="Name: activate to sort column descending" width="30%">Username</th>
<!--                                                         <th class="sorting" tabindex="0" aria-controls="user" aria-label="Position: activate to sort column ascending" width="25%">Kata Sandi</th> -->
                                                        <th class="sorting" tabindex="0" aria-controls="user" aria-label="Office: activate to sort column ascending" width="25%">Keterangan</th>
                                                        <th width="20%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="coldata_username" style="color:grey;">Lunar probe project</td>
                                                        <!-- <td class="coldata_password" style="color:grey;">May 15, 2015</td> -->
                                                        <td class="coldata_keterangan" style="color:grey;">Apr 12, 2015</td>
                                                        <td>
                                                            <a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Ubah"> <i class="icon-pencil"></i> </a>
                                                            <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    <!-- /HK Wrapper -->
    </div>
    <!-- Modal add new data -->
        <div class="modal fade" id="add_new_pengguna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"style="border-radius: 5px">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" placeholder="Username" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="text" id="password" placeholder="Kata Sandi" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="flag_admin">Keterangan</label>
                        <select id="flag_admin" name="flag_admin" class="form-control custom-select" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="1" >Admin</option>
                            <option value="2" >Pengguna</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="add_user()">Tambah Pengguna</button>
                </div>
            </div>
        </div>
        </div>

    <!-- Modal edit data -->
        <div class="modal fade" id="edit_pengguna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"style="border-radius: 5px">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ubah Data</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" placeholder="Username" class="form-control" disabled />
                    </div>
                    <div class="form-group">
                        <label for="flag_admin">Keterangan</label>
                        <select id="flag_admin" name="flag_admin" class="form-control custom-select" required>
                            <option value="" disabled selected>Pilih</option>
                            <option value="1" >Admin</option>
                            <option value="0" >Pengguna</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password_baru" name="password_baru" class="form-control" placeholder="Password Baru" type="password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input id="password_verifikasi" name="password_verifikasi" class="form-control" placeholder="Ketik Ulang Password Baru Anda" type="password" autocomplete="off" required><span id='message'></span></input>
                        </div>
                    </div>
                   
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="update_user()">Simpan</button>
                </div>
            </div>
        </div>
        </div>

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
    <script type="text/javascript">
        
        var table = $('#user').DataTable();

        $(document).ready(function() {

        table.clear().draw();

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/get_user_data',
            success: function(msg){
                var total_data = msg.length;
                // console.log(msg);
                for (var i = 0; i < total_data ; i++) {
                    var no = i+1;

                    if (msg[i].flag_admin==1) {

                        var status = 'admin';

                    }

                    else{

                        var status = 'user';

                    }
                    var dRow = $('<tr>').append(
                        '<td class="coldata_username">' +msg[i].username+ '</td>',
                        // '<td class="coldata_password">' +msg[i].password+ '</td>',
                        '<td class="coldata_keterangan">' +status+ '</td>',
                        '<td><span data-toggle="tooltip"  data-original-title="Ubah" class="mr-25"><a href="#edit_pengguna" data-toggle="modal"><i class="icon-pencil"></i></a></span><span data-toggle="tooltip" data-original-title="Hapus"><a href="#"><i class="icon-trash txt-danger"></i></a></span> </td>'
                    );

                    table.row.add(dRow).draw();
                  
                }
            }
        });
        });

    </script>
	
</body>

</html>