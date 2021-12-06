<!DOCTYPE html>
<!-- 
Template Name: Griffin - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Support: support@hencework.com

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">
	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Login</title>
		<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
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
		<div class="hk-wrapper">
			
			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				<header class="d-flex justify-content-end align-items-center">
				</header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<form id="form_login">
										<h1 class="display-4 text-center mb-20">Kalkulator</h1>
										<div class="form-group">
											<input id="username" name="username" class="form-control" placeholder="username" type="text" autocomplete="off" required>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input id="password" name="password" class="form-control" placeholder="Password" type="password" autocomplete="off" required>
											</div>
										</div>
										<button class="btn btn-red btn-block" type="submit">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /HK Wrapper -->
		
		<!-- JavaScript -->
		
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
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>

		<!-- js-sha256 -->
		<script src="js/js-sha256/src/sha256.js"></script>

		<script type="text/javascript">
			
			$("#form_login").submit(function(e){

				e.preventDefault();

				var username = $("#username").val();
				var password = $("#password").val();
				var password = sha256( username+password );

				var formData = new FormData($('#form_login')[0]);
				formData.set('password', password);

				$.ajax({
					type: 'POST',
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					url: '/login_process',
					success: function(data){   
					  	
					  	if(data.login == true){

						  	alert("Berhasil Login");
						  	window.location.replace("/home");
						  
						}else{

							alert("Gagal Login");
							window.location.replace("/index");
						}

					}
				});

			});

		</script>
	</body>
</html>