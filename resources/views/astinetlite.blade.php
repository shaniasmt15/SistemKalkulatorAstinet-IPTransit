@extends('layout')

@section('title', 'astinet')
@section('display-IPtransit-dropdown', 'd-none')
@section('display-IPtransit', 'd-none')
@section('display-IPtransitbb', 'd-none')
@section('display-IPtransit', 'd-none')
@section('display-IPtransitbb', 'd-none')
@section('beranda-nav', '') 
@section('astinet-nav', '')
@section('astinetlite-nav', 'active')
@section('astinetbb-nav', '')

@section('content')	
	<!-- HK Wrapper -->
	<div class="hk-wrapper">
		<!-- Main Content -->
		<div class="hk-pg-wrapper hk-auth-wrapper bg-light">
			<div class="container-fluid">
				<br>
				<br>
				<br>
			
				<div class="row">
					<div class="col-xl-12 pa-0">
						<div class="auth-form-wrap pt-xl-0 pt-20">
							<div class="auth-form w-xl-35 w-lg-80 w-sm-70 w-100">
								<form id="form_astinet_lite">
								    <section class="hk-sec-wrapper" style="border-radius: 5px">
								    <div class="pt-10 pb-30">	
    								    	<h3 class="display-4 text-center">Kalkulator Astinet Lite</h3>
    								    	<h6 class="text-center text-red font-12">Nota Dinas EVP DBS No. C.Tel. 45/YN 000/DBS-00000000/2018</h6>
								    	</div>	 
                       					<div class="row mt-15">
                       					 	<div class="col-3 mt-10">
                       					 	 	<h6>Lokasi</h6>
                       					 	</div>
                            				<div class="col-9">
                                       			<select id="input_daerah" name="input_daerah" class="form-control custom-select" required>
	                                                <option value="" disabled selected>Pilih</option>
	                                                <option value="1" >Jabodetabek</option>
	                                                <option value="2" >Jawa</option>
	                                                <option value="3" >Sumatera</option>
	                                                <option value="4" >Kalimantan & KTI</option>
                                       			</select>
                           					</div>
                       					</div>
                       					<div class="row mt-15">
                       						<div class="col-3 mt-10">
                           						<h6>Bandwidth</h6>
                       						</div>
                           					<div class="col-7 pr-10">
												<select id="input_bw_lite" name="input_bw_lite" class="form-control custom-select" required>
	                                                <option value="" disabled selected>Pilih</option>
	                                                <option value="1" >1</option>
	                                                <option value="2" >2</option>
	                                                <option value="3" >3</option>
	                                                <option value="5" >5</option>
	                                                <option value="10" >10</option>
	                                                <option value="20" >20</option>
	                                                <option value="30" >30</option>
	                                                <option value="40" >40</option>
	                                                <option value="50" >50</option>
                                       			</select>
											</div>
											<div class="col-1 mt-10 pl-0">
												<label>Mbps</label>
											</div>
										</div>
										<div class="row mt-15">
											<div class="col-3 mt-5">
                           						<h6>Lastmile</h6>
											</div>
                           					<div class="col-2 custom-control custom-radio mt-5 ml-25">
                                				<input type="radio" id="input_lm_yes" name="radio_lastmile" checked class="custom-control-input" value="yes">
                                				<label class="custom-control-label" for="input_lm_yes">Ya</label>
                                            </div>
                                		  	<div class="col-5 custom-control custom-radio mt-5">
                                				<input type="radio" id="input_lm_no" name="radio_lastmile" class="custom-control-input" value="no">
                               					<label class="custom-control-label" for="input_lm_no">Tidak</label>
                           				  	</div>
										</div>
                       					<div class="row mt-25">
                           					<div class= "col-12">
                       					 		<button id="btn_submit" style="float: right" class="btn btn-red btn-right" type="submit">Hitung</button>
                       						</div>
                       					</div>
                       					<div id="tabel_hasil" class="mt-40" style="display: none">
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
																		<td>Tarif Bulanan</td>
																		<td id="tarif_bulanan" class="pl-0 pr-5"></td>
																	</tr>
																	<tr>
																		<td>Tarif Lastmile</td>
																		<td id="tarif_lastmile" class="pl-0 pr-5"></td>
																	</tr>
	                                                            </tbody>
	                                                            <tfoot>
	                                                                <tr class="bg-light">
	                                                                    <th class="text-dark text-uppercase" scope="row">Total Tarif Biaya Bulanan</th>
	                                                                    <th id="total_tarif" class="text-dark font-15 pl-0 pr-5" scope="row"></th>
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
														<td class="font-5 text-dark  pl-5 pr-0">Rp 2.500.000</td>
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
		
		$("#btn_submit").click(function(){

			$("#tabel_hasil").css("display", "none");				
		});

		$("#form_astinet_lite").submit(function(e){

			e.preventDefault();
			
			// var input_daerah 	= $("#input_daerah").val();
			// var input_bw 		= $("#input_bw").val();
			// var input_lastmile 	= $("input[name='radio_lastmile']:checked").val();

			var formData = new FormData($('#form_astinet_lite')[0]);

			$.ajax({
				type: 'POST',
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				url: '/calculate_astinet_lite',
				success: function(data){   
				  	
				  	$("#tarif_bulanan").html(data['harga_astinetLite']);
				  	$("#tarif_lastmile").html(data['harga_lastmile']);
				  	$("#total_tarif").html(data['total_astinetLite']);
				}
			});

			$("#tabel_hasil").css("display", "block");

		});

	</script>

@endsection