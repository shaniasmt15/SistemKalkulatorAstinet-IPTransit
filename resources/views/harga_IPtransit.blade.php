@extends('layout_admin')

@section('titleadmin', 'Harga IPtransit')

@section('admin-nav', '')
@section('audittrail-nav', '')
@section('pengguna-nav', '')
@section('lokasi-nav', '')
@section('harga-nav', 'active')
@section('IPtransit-drp', 'active')
@section('IPtransitlite-drp', '')
@section('IPtransitbb-drp', '')


@section('contentadmin')
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container-fluid mt-xl-25 mt-sm-30 ml-10 mb-15 mt-25">
                <div class="hk-pg-header">     
                </div>
               <!-- Row -->
                <div class="row pb-20 pl-5 pr-10">
                    <div class= "col-6">
                        <h4 class="mt-15">IP Transit</h4>
                    </div>
                    <div class= "col-6">
                        <button id="btn_submit" style="float: right" class="btn btn-outline-red btn-right" type="submit" data-toggle="modal" data-target="#add_new_IPtransit">Tambah Data Baru</button>
                    </div>
                </div>
                <div class="row pr-10">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div id="datable_1_wrapper" class="dataTables_wrapper dt-bootstrap4 ">
                                            <table id="costIPtransit" class="table table-striped w-100 mb-50 dataTable dtr-inline " role="grid" aria-describedby="datable_1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="costIPtransit" aria-sort="ascending" aria-label="Name: activate to sort column descending" width="30%">Lokasi</th>
                                                        <th class="sorting" tabindex="0" aria-controls="costIPtransit" aria-label="Position: activate to sort column ascending" width="25%">Bandwidth</th>
                                                        <th class="sorting" tabindex="0" aria-controls="costIPtransit" aria-label="Office: activate to sort column ascending" width="25%">Harga</th>
                                                        <th width="20%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="coldata_lokasi" style="color:grey;">Lunar probe project</td>
                                                        <td class="coldata_bw_IPtransit" style="color:grey;">May 15, 2015</td>
                                                        <td class="coldata_harga_IPtransit" style="color:grey;">Apr 12, 2015</td>
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
    
    <!-- Modal add new data -->
        <div class="modal fade" id="add_new_IPtransit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content"style="border-radius: 5px">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                    </div>
                    <form id="form_add_IPtransit">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_daerah">Lokasi</label>
                                <select id="id_daerah" name="id_daerah" class="form-control custom-select" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <?php 
                                        foreach ($list_daerah as $key => $value){
                                            echo "<option value='". $key ."'>".$value."</option>";
                                        } 

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bw_IPtransit">Bandwidth</label>
                                <input type="number" id="bw_IPtransit" name="bw_IPtransit" placeholder="0" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="harga_IPtransit">Harga</label>
                                <input type="number" id="harga_IPtransit" name="harga_IPtransit" placeholder="0" class="form-control"/>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button id="btn_add" class="btn btn-primary" type="button">Tambah Data</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    <!-- Modal add new data -->

    <!-- Modal edit data -->
        <div class="modal fade" id="edit_IPtransit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content"style="border-radius: 5px">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Ubah Data</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form_update_IPtransit">
                            <div class="form-group">
                                <label for="edit_daerah">Lokasi</label>
                                <select id="edit_daerah" name="edit_daerah" class="form-control custom-select" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <?php 
                                        foreach ($list_daerah as $key => $value){
                                            echo "<option value='". $key ."'>".$value."</option>";
                                        } 

                                    ?>
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="edit_bw_IPtransit">Bandwidth</label>
                                <input type="number" id="edit_bw_IPtransit" name="edit_bw_IPtransit" placeholder="0" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="edit_harga_IPtransit">Harga</label>
                                <input type="number" id="edit_harga_IPtransit" name="edit_harga_IPtransit" placeholder="0" class="form-control"/>
                            </div>
                       </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button id="btn_update" type="button" class="btn btn-primary" onclick="update_IPtransit(this.value)">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal edit data -->

    <!-- Modal delete data -->
        <div class="modal fade mt-100" id="delete_IPtransit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content "style="border-radius: 5px">
                    <form id="form_delete_IPtransit">
                        <div class="modal-body">
                                <div class="form-group">
                                    <h6 class= "mt-15">Apakah anda yakin menghapus data ini?</h6>
                                </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button id="btn_delete" type="button" class="btn btn-sm btn-primary" onclick="func_delete_IPtransit(this.value)">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Modal delete data -->

    </div>

@endsection

@section('javascriptadmin')
    
    <script type="text/javascript">
        
        var table = $('#costIPtransit').DataTable();

        $(document).ready(function() {

        table.clear().draw();

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/get_costIPtransit_data',
            success: function(msg){
                var total_data = msg.length;
                // console.log(msg);
                for (var i = 0; i < total_data ; i++) {
                    var no = i+1;

                    var dRow = $('<tr>').append(
                        '<td class="coldata_lokasi" style="color:grey;">' +msg[i].nama_daerah+ '</td>',
                        '<td class="coldata_bw_IPtransit" style="color:grey;">' +msg[i].bw_IPtransit+ '</td>',
                        '<td class="coldata_harga_IPtransit" style="color:grey;">' +msg[i].harga_IPtransit+ '</td>',
                        '<td><span data-toggle="tooltip" class="mr-25"><a onclick=func_edit_IPtransit("'+msg[i].id_IPtransit+'") href="#edit_IPtransit" data-toggle="modal" data-original-title="Ubah"><i class="icon-pencil"></i></a></span><a onclick=func_edit_IPtransit("'+msg[i].id_IPtransit+'") href="#delete_IPtransit" data-toggle="modal" data-original-title="Hapus"><i class="icon-trash txt-danger"></i> </a> </td>'
                    );

                    table.row.add(dRow).draw();
                  
                }
            }
        });
        });

        
        $('#btn_add').click(function(e){

                e.preventDefault();

               
                var formData = new FormData($('#form_add_IPtransit')[0]);
               
                $.ajax({
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    url: '/add_costIPtransit_data',
                    success: function(data){   
                    
                    if(data[0] == true){

                        alert("Berhasil ditambah");
                        window.location.replace("/harga_IPtransit");
                      
                    }else if(data[0] == false){

                        alert("Gagal");
                        
                    }else{
                        
                        alert("Data sudah ada");
                    }

                }
                });

        });

        function func_edit_IPtransit(IPtransitID){

            $.ajax({
                url: "/get_IPtransit_detail/" + IPtransitID,
                context: document.body,
                async: false,
                success: function(msg){
                    console.log(msg);

                    $('#edit_daerah').val(msg[0].id_daerah).trigger('change');
                    $('#edit_bw_IPtransit').val(msg[0].bw_IPtransit);
                    $('#edit_harga_IPtransit').val(msg[0].harga_IPtransit);
                    $('#btn_update').val(IPtransitID);
                    $('#btn_delete').val(IPtransitID);

                }
            });
        }
        
        function update_IPtransit(IPtransitID){
         
            var edit_daerah        = $("#edit_daerah").val();
            var edit_bw_IPtransit    = $("#edit_bw_IPtransit").val();
            var edit_harga_IPtransit = $("#edit_harga_IPtransit").val();
           
            
            var formData = new FormData($('#form_update_IPtransit')[0]);
            formData.append('id_IPtransit', IPtransitID);
            formData.set('edit_bw_IPtransit', edit_bw_IPtransit);
            formData.set('edit_harga_IPtransit', edit_harga_IPtransit);
               
            $.ajax({
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                url: '/update_IPtransit',
                success: function(data){   
                    
                    if(data[0] == true){

                        alert("Berhasil diubah");
                        window.location.replace("/harga_IPtransit");
                      
                    }else if(data[0] == false){

                        alert("Gagal");
                        
                    }else if(data[0] == 'same'){
                        
                        alert("Data Sudah Ada");
                        
                    }else {
                        
                        alert("data tidak berubah");
                        $("#btn_close").click();
                    }
                }
            });
        }

        function func_delete_IPtransit(IPtransitID){

            $.ajax({
                type: 'GET',
                url: "/delete_IPtransit/" + IPtransitID,
                context: document.body,
                async: false,
                success: function(data){   
                        
                    if(data[0] == true){

                        alert("Berhasil dihapus");
                        window.location.replace("/harga_IPtransit");
                      
                    }else{

                        alert("Gagal");
                        
                    }
                }
            });
        }

    </script>
	
@endsection