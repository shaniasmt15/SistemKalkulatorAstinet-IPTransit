@extends('layout')

@section('title', 'IPtransitbb')

@section('beranda-nav', '')
@section('IPtransitbb-nav', 'active')
@section('display-IPtransit-dropdown', 'd-none')

@section('astinet-nav', 'd-none')
@section('astinetlite-nav', 'd-none')
@section('astinetbb-nav', 'd-none')

@section('content')

	<!-- HK Wrapper -->
	<div class="hk-wrapper">
		
		<!-- Main Content -->
		<div class="hk-pg-wrapper hk-auth-wrapper bg-light">
			<header class="d-flex justify-content-end align-items-center">
			</header>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 pa-0">
						<div class="auth-form-wrap pt-xl-0 pt-70">
							<div class="auth-form w-xl-35 w-lg-80 w-sm-70 w-100">
								<form id="form_IPtransit_bb">
									<h1 class="display-4 text-center mb-20">Kalkulator IP Transit BB</h1>
								    <section class="hk-sec-wrapper" style="border-radius: 5px">	 
                       					<div class="row mt-15">
                       					 	<div class="col-5 mt-10">
                       					 	 	<h6>Lokasi</h6>
                       					 	</div>
                            				<div class="col-7">
                                       			<select id="input_daerah" name="input_daerah" class="form-control custom-select" required>
	                                                <option value="" disabled selected>Pilih</option>
	                                                <?php 
	                                                	foreach ($list_daerah as $key => $value){
	                                                		echo "<option value='". $key ."'>".$value."</option>";
	                                                	} 

	                                                ?>
                                       			</select>
                           					</div>
                       					</div>
                       					<div class="row mt-15">
                       						<div class="col-5 mt-10">
                           						<h6>Bandwidth Global</h6>
                       						</div>
                           					<div class="col-5 pr-10">
												<input id="input_bw_global" name="input_bw_global" class="form-control" type="number" min="1" max="10000" placeholder="0" required>
											</div>
											<div class="col-1 mt-10 pl-0">
												<label>Mbps</label>
											</div>
										</div>
										<div class="row mt-15">
                       						<div class="col-5 mt-10">
                           						<h6>Bandwidth Domestik</h6>
                       						</div>
                           					<div class="col-5 pr-10">
												<input id="input_bw_domestik" name="input_bw_domestik" class="form-control" type="number" min="1" max="10000" placeholder="0" required>
											</div>
											<div class="col-1 mt-10 pl-0">
												<label>Mbps</label>
											</div>
										</div>
										<div class="row mt-15">
											<div class="col-5 mt-5">
                           						<h6>Lastmile</h6>
											</div>
                           					<div class="col-2 custom-control custom-radio mt-5 ml-20">
                                				<input type="radio" id="input_lm_yes" name="radio_lastmile" checked class="custom-control-input" value="yes">
                                				<label class="custom-control-label" for="input_lm_yes">Ya</label>
                                            </div>
                                		  	<div class="col-4 custom-control custom-radio mt-5">
                                				<input type="radio" id="input_lm_no" name="radio_lastmile" class="custom-control-input" value="no">
                               					<label class="custom-control-label" for="input_lm_no">Tidak</label>
                           				  	</div>
										</div>
                       					<div class="row mt-25">
                           					<div class= "col-12">
                       					 		<button id="btn_submit_bb" style="float: right" class="btn btn-red btn-right" type="submit">Hitung</button>
                       						</div>
                       					</div>
                       					<div id="tabel_hasil_bb" class="mt-40" style="display: none">
                           					<div class="card mb-0">
		                                        <h6 class="card-header border-0">
													<i class="ion ion-md-clipboard font-21 mr-10"></i>Rincian Tarif
												</h6>
                                            	<div class="card-body pa-0">
                                               		<div class="table-wrap">
                                                    	<div class="table mb-0">
                                                        	<table class="table table-sm mb-0">
	                                                            <tbody>
	                                                                <tr>
																		<td>Tarif Bulanan Global</td>
																		<td id="tarif_bulanan_global" class="pl-0 pr-5"></td>
																	</tr>
																	 <tr>
																		<td>Tarif Bulanan Domestik</td>
																		<td id="tarif_bulanan_domestik" class="pl-0 pr-5"></td>
																	</tr>
																	<tr>
																		<td>Tarif Lastmile</td>
																		<td id="tarif_lastmile" class="pl-0 pr-5"></td>
																	</tr>
	                                                            </tbody>
	                                                            <tfoot>
	                                                                <tr class="bg-light">
	                                                                    <th class="text-dark text-uppercase" scope="row">Total Tarif Biaya Bulanan</th>
	                                                                    <th id="total_tarif_bb" class="text-dark font-15 pl-0 pr-5" scope="row"></th>
	                                                                </tr>
	                                                            </tfoot>
                                                       		</table>
                                                   		</div>
                                                	</div>
                                            	</div>
                                        	</div>
                                        	<table class="table table-sm mb-0">
	                                            <tbody>
	                                                <tr>
														<td class="font-5 text-dark">*Tarif Instalasi (OTC)</td>
														<td class="font-5 text-dark pl-5 pr-0">Rp 2.500.000</td>
													</tr>
	                                            </tbody>              
                                            </table>
                                        </div>
                                       
                   					</section>
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
@endsection

@section('javascript')

	<script type="text/javascript">
		
		$("#btn_submit_bb").click(function(){

			$("#tabel_hasil_bb").css("display", "none");				
		});

		$('#input_bw_global').on('input',function() {

			var input_bw_global = $('#input_bw_global').val();
			var limit 			= input_bw_global*10;

			$('#input_bw_domestik').prop('max',limit);
			// body...
		});

		$("#form_IPtransit_bb").submit(function(e){

			e.preventDefault();
			
			// var input_daerah 	= $("#input_daerah").val();
			// var input_bw 		= $("#input_bw").val();
			// var input_lastmile 	= $("input[name='radio_lastmile']:checked").val();

			var formData = new FormData($('#form_IPtransit_bb')[0]);
			console.log(formData);

			$.ajax({
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				url:'/calculate_IPtransit_bb',
				success: function(data){   
				  	
				  	$("#tarif_bulanan_global").html(data['harga_global']);
				  	$("#tarif_bulanan_domestik").html(data['harga_domestik']);
				  	$("#tarif_lastmile").html(data['harga_lastmile']);
				  	$("#total_tarif_bb").html(data['total_IPtransit_bb']);
				  	//console.log(data);
				}
			});

			// $.ajax({
			//     url: '/calculate_IPtransit',
			//     dataType: 'json',
			//     type: 'post',
			//     contentType: 'application/json',
			//     data: { 
			//     	"input_daerah": input_daerah, 
			//     	"input_bw": input_bw,
			//     	"input_lastmile": input_lastmile 
			//     },
			//     processData: false,
			//     success: function( data ){
			//         alert(data);
			//     }
			// });

			$("#tabel_hasil_bb").css("display", "block");

		});


	</script>
@endsection