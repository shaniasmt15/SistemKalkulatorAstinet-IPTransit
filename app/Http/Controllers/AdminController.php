<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

	public function __construct(Request $request){

		$this->middleware('checksession');

		
	}

	public function admin_page(Request $request){

		return view('admin');
		
	}
	
	public function audittrail_page(Request $request){

		return view('audit_trail');
		
	}

	public function user_page(Request $request){

		return view('daftar_pengguna');
		
	}

	public function location_page(Request $request){

		return view('daftar_lokasi');
		
	}

	public function costastinet_page(Request $request){

		return view('harga_astinet');
		
	}

	public function costastinetlite_page(Request $request){

		return view('harga_astinetlite');
		
	}

	public function costastinetbb_page(Request $request){

		return view('harga_astinetbb');
		
	}

	public function get_audittrail_data(Request $request){
    
    $q_get_audittrail_data = DB::select("SELECT * FROM audit_trail");
	$audittrail_data = json_encode($q_get_audittrail_data);
	$audittrail_data = json_decode($audittrail_data, true);

	$result = $audittrail_data;
	return response($result);

	}

	public function get_user_data(Request $request){
    
    $q_get_user_data = DB::select("SELECT * FROM user");
	$user_data = json_encode($q_get_user_data);
	$user_data = json_decode($user_data, true);

	$result = $user_data;
	return response($result);

	}

	public function get_costastinet_data(Request $request){
    
    $q_get_costastinet_data = DB::select("SELECT * FROM astinet  INNER JOIN daerah ON astinet.id_daerah = daerah.id_daerah");
	$costastinet_data = json_encode($q_get_costastinet_data);
	$costastinet_data = json_decode($costastinet_data, true);

	$result = $costastinet_data;
	return response($result);

	}

	// baru

	public function add_user_data(Request $request){

		$username 	= $request->input('username');
		$flag_admin = $request->input('flag_admin');
		$password 	= $request->input('password');
		
		
		$query_check_same_data = DB::select("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		
		if(count($query_check_same_data) == 0){
		    
		    $query_insertuser = DB::statement("INSERT INTO user (username, password, flag_admin) VALUES ('$username', '$password', '$flag_admin')");    
		    
		    if($query_insertuser){

			    $result[] = true;
		    }
		    else{

			    $result[] = false;
		    }

		    return response($result);
		
		}else{
		    
		    $result[] = 'same';
		    
		    return response($result);
		}
		
	}

	public function get_user_detail(Request $request, $userID){
    
	    $q_get_user_detail = DB::select("SELECT * FROM user WHERE id_user = '$userID'");
		$user_detail = json_encode($q_get_user_detail);
		$user_detail = json_decode($user_detail, true);

		$result = $user_detail;
		return response($result);

	}

	public function update_user(Request $request){
        
        $userID = $request->input('id_user');
        $username = $request->input('edit_username');
        $flag_admin = $request->input('edit_flag_admin');
        $password_baru = $request->input('password_baru');
        $password_verifikasi = $request->input('password_verifikasi');
        
        if( $password_baru == null || $password_verifikasi == null ){
            
            $q_update_user = DB::statement("UPDATE user SET flag_admin = '$flag_admin' WHERE id_user = '$userID'");    
            
        }else{
            
            $q_update_user = DB::statement("UPDATE user SET flag_admin = '$flag_admin', password = '$password_verifikasi'  WHERE id_user = '$userID'");
        }
    
	    
		if($q_update_user){
		    
		    $result[] = true;
		    
		}else{
		    
		    $result[] = false;
		}

		return response($result);

	}

	public function delete_user(Request $request, $userID){

		
	    $q_delete_user = DB::statement("DELETE FROM user WHERE id_user = '$userID'");
		
		if($q_delete_user){
		    
		    $result[] = true;
		    
		}else{
		    
		    $result[] = false;
		}

		return response($result);

	}

	public function get_location_data(Request $request){
    
	    $q_get_location_data = DB::select("SELECT * FROM daerah");
		$location_data = json_encode($q_get_location_data);
		$location_data = json_decode($location_data, true);

		$result = $location_data;
		return response($result);

	}

	public function add_location_data(Request $request){

		$id_daerah 				= $request->input('id_daerah');
		$nama_daerah 			= $request->input('nama_daerah');

		$query_insertlocation = DB::statement("INSERT INTO daerah VALUES ('$id_daerah', '$nama_daerah')");
		

		if($query_insertlocation){

			$result[] = true;
		}
		Else{

			$result[] = false;
		}

		return response($result);

	}

	public function costIPtransit_page(Request $request){

		$get_data_daerah = DB::select("SELECT * FROM daerah");
		$get_data_daerah = json_encode($get_data_daerah);
		$get_data_daerah = json_decode($get_data_daerah);

		foreach ($get_data_daerah as $key => $value) {

			$id_daerah 	 = $value->id_daerah;
			$nama_daerah = $value->nama_daerah;

			$list_daerah[$id_daerah] = $nama_daerah;

		}

		return view('harga_IPtransit')->with([
			'list_daerah' => $list_daerah
		]);

		
	}

	public function get_costIPtransit_data(Request $request){
    
	    $q_get_costIPtransit_data = DB::select("SELECT * FROM IPtransit  INNER JOIN daerah ON IPtransit.id_daerah = daerah.id_daerah");
		$costIPtransit_data = json_encode($q_get_costIPtransit_data);
		$costIPtransit_data = json_decode($costIPtransit_data, true);

		$result = $costIPtransit_data;
		return response($result);

	}

	public function add_costIPtransit_data(Request $request){

		$id_daerah 				= $request->input('id_daerah');
		$bw_IPtransit 			= $request->input('bw_IPtransit');
		$harga_IPtransit 			= $request->input('harga_IPtransit');
		
		$query_check_same_data = DB::select("SELECT * FROM IPtransit WHERE id_daerah = '$id_daerah' AND bw_IPtransit = '$bw_IPtransit' AND harga_IPtransit = '$harga_IPtransit'");
		
		if(count($query_check_same_data) == 0){
		    
		    $query_insertcostIPtransit = DB::statement("INSERT INTO IPtransit (id_daerah,bw_IPtransit, harga_IPtransit) VALUES ('$id_daerah', '$bw_IPtransit', '$harga_IPtransit')");    
		    
		    if($query_insertcostIPtransit){

			    $result[] = true;
		    }
		    else{

			    $result[] = false;
		    }

		    return response($result);
		
		}else{
		    
		    $result[] = 'same';
		    
		    return response($result);
		}
		
	}

	public function get_IPtransit_detail(Request $request, $IPtransitID){
    
	    $q_get_IPtransit_detail = DB::select("SELECT * FROM IPtransit WHERE id_IPtransit = '$IPtransitID'");
		$IPtransit_detail = json_encode($q_get_IPtransit_detail);
		$IPtransit_detail = json_decode($IPtransit_detail, true);

		$result = $IPtransit_detail;
		return response($result);

	}

	public function update_IPtransit(Request $request){
        
        $IPtransitID = $request->input('id_IPtransit');
        $id_daerah = $request->input('edit_daerah');
        $harga_IPtransit = $request->input('edit_harga_IPtransit');
        $bw_IPtransit = $request->input('edit_bw_IPtransit');

        $q_get_data_IPtransit = DB::select("SELECT * FROM IPtransit WHERE id_IPtransit = '$IPtransitID'");
        $db_id_daerah = $q_get_data_IPtransit[0]->id_daerah;
        $db_bw_IPtransit = $q_get_data_IPtransit[0]->bw_IPtransit;
        $db_harga_IPtransit = $q_get_data_IPtransit[0]->harga_IPtransit;
        
        if($id_daerah == $db_id_daerah && $bw_IPtransit == $db_bw_IPtransit && $harga_IPtransit == $db_harga_IPtransit){
            
            $result[] = 'notchange';
            
            return response($result);
            
        }else{
            
            $q_get_data_IPtransit = DB::select("SELECT * FROM IPtransit WHERE id_daerah = '$id_daerah' AND bw_IPtransit = '$bw_IPtransit' AND harga_IPtransit = '$harga_IPtransit'");
            
            if(count($q_get_data_IPtransit) == 0){
            
                $q_update_IPtransit = DB::statement("UPDATE IPtransit SET id_daerah = '$id_daerah', bw_IPtransit = '$bw_IPtransit', harga_IPtransit = '$harga_IPtransit' WHERE id_IPtransit = '$IPtransitID'");
                
            }else{
                
                $result[] = 'same';
            
                return response($result);
            
            }
        }
        
		if($q_update_IPtransit){
		    
		    $result[] = true;
		    
		}else{
		    
		    $result[] = false;
		}

		return response($result);

	}

	public function delete_IPtransit(Request $request, $IPtransitID){

		
	    $q_delete_IPtransit = DB::statement("DELETE FROM IPtransit WHERE id_IPtransit = '$IPtransitID'");
		
		if($q_delete_IPtransit){
		    
		    $result[] = true;
		    
		}else{
		    
		    $result[] = false;
		}

		return response($result);

	}


	public function costIPtransitbb_page(Request $request){

		$get_data_daerah = DB::select("SELECT * FROM daerah");
		$get_data_daerah = json_encode($get_data_daerah);
		$get_data_daerah = json_decode($get_data_daerah);

		foreach ($get_data_daerah as $key => $value) {

			$id_daerah 	 = $value->id_daerah;
			$nama_daerah = $value->nama_daerah;

			$list_daerah[$id_daerah] = $nama_daerah;

		}

		return view('harga_IPtransitbb')->with([
			'list_daerah' => $list_daerah
		]);
		
	}

	public function get_costIPtransitbb_data(Request $request){
    
	    $q_get_costIPtransitbb_data = DB::select("SELECT * FROM IPtransitbb INNER JOIN daerah ON IPtransitbb.id_daerah = daerah.id_daerah");
		$costIPtransitbb_data = json_encode($q_get_costIPtransitbb_data);
		$costIPtransitbb_data = json_decode($costIPtransitbb_data, true);

		$result = $costIPtransitbb_data;
		return response($result);

	}

	public function add_costIPtransitbb_data(Request $request){

		$id_daerah 					= $request->input('id_daerah');
		$bw_IPtransitbb	 			= $request->input('bw_IPtransitbb');
		$harga_global	 			= $request->input('harga_global');
		$harga_domestik	 			= $request->input('harga_domestik');

		$query_insertcostIPtransitbb = DB::statement("INSERT INTO IPtransitbb (id_daerah, bw_IPtransitbb, harga_global, harga_domestik) VALUES ('$id_daerah', '$bw_IPtransitbb', '$harga_global', '$harga_domestik')");
		

		if($query_insertcostIPtransitbb){

			$result[] = true;
		}
		Else{

			$result[] = false;
		}

		return response($result);

	}

	public function get_IPtransitbb_detail(Request $request, $IPtransitbbID){
    
	    $q_get_IPtransitbb_detail = DB::select("SELECT * FROM IPtransitbb WHERE id_IPtransitbb = '$IPtransitbbID'");
		$IPtransitbb_detail = json_encode($q_get_IPtransitbb_detail);
		$IPtransitbb_detail = json_decode($IPtransitbb_detail, true);

		$result = $IPtransitbb_detail;
		return response($result);

	}

	public function update_IPtransitbb(Request $request){
        
        $IPtransitbbID    = $request->input('id_IPtransitbb');
        $id_daerah 	  	= $request->input('edit_daerah');
        $bw_IPtransitbb 	= $request->input('edit_bw_IPtransitbb');
        $harga_global 	= $request->input('edit_harga_global');
        $harga_domestik = $request->input('edit_harga_domestik');

        $q_get_data_IPtransitbb = DB::select("SELECT * FROM IPtransitbb WHERE id_IPtransitbb = '$IPtransitbbID'");
        $db_id_daerah 	   = $q_get_data_IPtransitbb[0]->id_daerah;
        $db_bw_IPtransitbb   = $q_get_data_IPtransitbb[0]->bw_IPtransitbb;
        $db_harga_global   = $q_get_data_IPtransitbb[0]->harga_global;
        $db_harga_domestik = $q_get_data_IPtransitbb[0]->harga_domestik;
        
        if($id_daerah == $db_id_daerah && $bw_IPtransitbb == $db_bw_IPtransitbb && $harga_global == $db_harga_global && $harga_domestik == $db_harga_domestik){
            
            $result[] = 'notchange';
            
            return response($result);
            
        }else{
            
            $q_get_data_IPtransitbb = DB::select("SELECT * FROM IPtransitbb WHERE id_daerah = '$id_daerah' AND bw_IPtransitbb = '$bw_IPtransitbb' AND harga_global = '$harga_global' AND harga_domestik = '$harga_domestik'");
            
            if(count($q_get_data_IPtransitbb) == 0){
            
                $q_update_IPtransitbb = DB::statement("UPDATE IPtransitbb SET id_daerah = '$id_daerah', bw_IPtransitbb = '$bw_IPtransitbb', harga_global = '$harga_global', harga_domestik = '$harga_domestik' WHERE id_IPtransitbb = '$IPtransitbbID'");
                
            }else{
                
                $result[] = 'same';
            
                return response($result);
            
            }
        }
        
		if($q_update_IPtransitbb){
		    
		    $result[] = true;
		    
		}else{
		    
		    $result[] = false;
		}

		return response($result);

	}
	public function delete_IPtransitbb(Request $request, $IPtransitbbID){

		
	    $q_delete_IPtransitbb = DB::statement("DELETE FROM IPtransitbb WHERE id_IPtransitbb = '$IPtransitbbID'");
		
		if($q_delete_IPtransitbb){
		    
		    $result[] = true;
		    
		}else{
		    
		    $result[] = false;
		}

		return response($result);

	}

	// end baru

}

?>