<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{

	public function __construct(Request $request){

		$this->middleware('checksession');

		
	}

	public function astinet_page(){

		$get_data_daerah = DB::select("SELECT * FROM daerah");
		$get_data_daerah = json_encode($get_data_daerah);
		$get_data_daerah = json_decode($get_data_daerah);

		foreach ($get_data_daerah as $key => $value) {

			$id_daerah 	 = $value->id_daerah;
			$nama_daerah = $value->nama_daerah;

			$list_daerah[$id_daerah] = $nama_daerah;

		}

		return view('astinet')->with([
			'list_daerah' => $list_daerah
		]);
	}

	public function astinetbb_page(){

		$get_data_daerah = DB::select("SELECT * FROM daerah");
		$get_data_daerah = json_encode($get_data_daerah);
		$get_data_daerah = json_decode($get_data_daerah);

		foreach ($get_data_daerah as $key => $value) {

			$id_daerah 	 = $value->id_daerah;
			$nama_daerah = $value->nama_daerah;

			$list_daerah[$id_daerah] = $nama_daerah;

		}

		return view('astinetbb')->with([
			'list_daerah' => $list_daerah
		]);
	}

	public function astinetlite_page(){

		return view('astinetlite');
		
	}

	public function home_page(){

		return view('home');
		
	}
	public function home2_page(){

		return view('home2');
		
	}
	public function home3_page(){

		return view('home3');
		
	}

	public function TestDatabaseConnection(){
	    try {
	        $database_host 		= "127.0.0.1";
	        $database_name	 	= "u6534915_kalkulator";
	        $database_user 		= "root";
	        $database_password 	= "";

	        $connection = mysqli_connect($database_host,$database_user,$database_password,$database_name);

	        if (mysqli_connect_errno()){
	                return "false";
	            } else {
	                return "true";
	            }

	    } catch (Exception $e) {

	        return "false";

	    }
	}

	public function getdata(){

		$data_daerah = DB::select("SELECT * FROM daerah");

		return $data_daerah;

	}
	// Baru Dimulai
	public function IPtransit_page(){

		$get_data_daerah = DB::select("SELECT * FROM daerah");
		$get_data_daerah = json_encode($get_data_daerah);
		$get_data_daerah = json_decode($get_data_daerah);

		foreach ($get_data_daerah as $key => $value) {

			$id_daerah 	 = $value->id_daerah;
			$nama_daerah = $value->nama_daerah;

			$list_daerah[$id_daerah] = $nama_daerah;

		}

		return view('IPtransit')->with([
			'list_daerah' => $list_daerah
		]);
	}

	public function IPtransitbb_page(){

		$get_data_daerah = DB::select("SELECT * FROM daerah");
		$get_data_daerah = json_encode($get_data_daerah);
		$get_data_daerah = json_decode($get_data_daerah);

		foreach ($get_data_daerah as $key => $value) {

			$id_daerah 	 = $value->id_daerah;
			$nama_daerah = $value->nama_daerah;

			$list_daerah[$id_daerah] = $nama_daerah;

		}

		return view('IPtransitbb')->with([
			'list_daerah' => $list_daerah
		]);
	}

	public function IPtransitlite_page(){

		return view('IPtransitlite');
		
	}
	// Baru Selesai

	public function calculate_astinet(Request $request)
	{

		$input_daerah 	= $request->input('input_daerah');
		$input_bw 		= $request->input('input_bw');
		$input_lastmile = $request->input('radio_lastmile');

		if ($input_lastmile == "yes") {
			$harga_lastmile = 750000;
		}else{
			$harga_lastmile = 0;
		}

		if($input_daerah == 5 && $input_bw > 10){

			$result['harga_astinet'] 	= "N/A";
			$result['total_astinet'] 	= "N/A";	
			$result['harga_lastmile'] 	= " ".number_format($harga_lastmile, 2, ",", ".");

			return response($result);
		}
		else if($input_bw <= 10 || $input_bw == 20 || $input_bw == 50 || $input_bw == 100 || $input_bw == 200
		|| $input_bw == 500 || $input_bw == 1000){

			$query_get_harga = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '$input_bw'");
			
			$harga_astinet = $query_get_harga[0]->harga_astinet;

		}
		else if( $input_bw > 10 && $input_bw < 20){

			$query_get_harga_bw10 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '10'");
			$harga_astinet_bw10 = $query_get_harga_bw10[0]->harga_astinet;

			$query_get_harga_bw20 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '20'");
			$harga_astinet_bw20 = $query_get_harga_bw20[0]->harga_astinet;

			$harga_astinet = $harga_astinet_bw10 + ((($input_bw-10)/(20-10))*($harga_astinet_bw20-$harga_astinet_bw10));


		}
		else if( $input_bw > 20 && $input_bw < 50){

			$query_get_harga_bw20 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '20'");
			$harga_astinet_bw20 = $query_get_harga_bw20[0]->harga_astinet;

			$query_get_harga_bw50 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '50'");
			$harga_astinet_bw50 = $query_get_harga_bw50[0]->harga_astinet;

			$harga_astinet = $harga_astinet_bw20 + ((($input_bw-20)/(50-20))*($harga_astinet_bw50-$harga_astinet_bw20));


		}
		else if( $input_bw > 50 && $input_bw < 100){

			$query_get_harga_bw50 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '50'");
			$harga_astinet_bw50 = $query_get_harga_bw50[0]->harga_astinet;

			$query_get_harga_bw100 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '100'");
			$harga_astinet_bw100 = $query_get_harga_bw100[0]->harga_astinet;

			$harga_astinet = $harga_astinet_bw50 + ((($input_bw-50)/(100-50))*($harga_astinet_bw100-$harga_astinet_bw50));


		}
		else if( $input_bw > 100 && $input_bw < 200){

			$query_get_harga_bw100 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '100'");
			$harga_astinet_bw100 = $query_get_harga_bw100[0]->harga_astinet;

			$query_get_harga_bw200 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '200'");
			$harga_astinet_bw200 = $query_get_harga_bw200[0]->harga_astinet;

			$harga_astinet = $harga_astinet_bw100 + ((($input_bw-100)/(200-100))*($harga_astinet_bw200-$harga_astinet_bw100));


		}
		else if( $input_bw > 200 && $input_bw < 500){

			$query_get_harga_bw200 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '200'");
			$harga_astinet_bw200 = $query_get_harga_bw200[0]->harga_astinet;

			$query_get_harga_bw500 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '500'");
			$harga_astinet_bw500 = $query_get_harga_bw500[0]->harga_astinet;

			$harga_astinet = $harga_astinet_bw200 + ((($input_bw-200)/(500-200))*($harga_astinet_bw500-$harga_astinet_bw200));


		}
		else if( $input_bw > 500 && $input_bw < 1000){

			$query_get_harga_bw500 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '500'");
			$harga_astinet_bw500 = $query_get_harga_bw500[0]->harga_astinet;

			$query_get_harga_bw1000 = DB::select("SELECT harga_astinet FROM astinet 
				WHERE id_daerah = '$input_daerah' AND bw_astinet = '1000'");
			$harga_astinet_bw1000 = $query_get_harga_bw1000[0]->harga_astinet;

			$harga_astinet = $harga_astinet_bw500 + ((($input_bw-500)/(1000-500))*($harga_astinet_bw1000-$harga_astinet_bw500));


		}

        $username = $request->session()->get('username');
        $datetime = date("Y-m-d H:i:s");
        
        $query_audittrail = DB::statement("INSERT INTO audit_trail VALUES (NULL, NOW(), '$username', 'astinet')");
        
		$harga_astinet = ceil($harga_astinet/1000);
		$harga_astinet = $harga_astinet*1000;
		
		$total_astinet = $harga_astinet+$harga_lastmile;

		$result['harga_astinet'] 	= " ".number_format($harga_astinet, 0, ",", ".");
		$result['total_astinet'] 	= " ".number_format($total_astinet, 0, ",", ".");	
		$result['harga_lastmile'] 	= " ".number_format($harga_lastmile, 0, ",", ".");

		return response($result);
	}

	public function calculate_astinet_bb(Request $request)
	{

		$input_daerah 		= $request->input('input_daerah');
		$input_bw_global 	= $request->input('input_bw_global');
		$input_bw_domestik 	= $request->input('input_bw_domestik');
		$input_lastmile 	= $request->input('radio_lastmile');

		if ($input_lastmile == "yes") {
			$harga_lastmile = 750000;
		}else{
			$harga_lastmile = 0;
		}

		
		if($input_daerah == 5 && $input_bw_global > 10){

			$result['harga_global'] 			= "N/A";
			$result['total_astinet_bb'] 		= "N/A";	

			return response($result);
		}
		else if($input_bw_global <= 10 || $input_bw_global == 20 || $input_bw_global == 50 || $input_bw_global == 100 || $input_bw_global == 200
		|| $input_bw_global == 500 || $input_bw_global == 1000){

			$query_get_harga_global = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '$input_bw_global'");
			
			$harga_global = $query_get_harga_global[0]->harga_global;

		}
		else if( $input_bw_global > 10 && $input_bw_global < 20){

			$query_get_harga_global_bw10 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '10'");
			$harga_global_bw10 = $query_get_harga_global_bw10[0]->harga_global;

			$query_get_harga_global_bw20 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '20'");
			$harga_global_bw20 = $query_get_harga_global_bw20[0]->harga_global;

			$harga_global = $harga_global_bw10 + ((($input_bw_global-10)/(20-10))*($harga_global_bw20-$harga_global_bw10));


		}
		else if( $input_bw_global > 20 && $input_bw_global < 50){

			$query_get_harga_global_bw20 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '20'");
			$harga_global_bw20 = $query_get_harga_global_bw20[0]->harga_global;

			$query_get_harga_global_bw50 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '50'");
			$harga_global_bw50 = $query_get_harga_global_bw50[0]->harga_global;

			$harga_global = $harga_global_bw20 + ((($input_bw_global-20)/(50-20))*($harga_global_bw50-$harga_global_bw20));


		}
		else if( $input_bw_global > 50 && $input_bw_global < 100){

			$query_get_harga_global_bw50 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '50'");
			$harga_global_bw50 = $query_get_harga_global_bw50[0]->harga_global;

			$query_get_harga_global_bw100 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '100'");
			$harga_global_bw100 = $query_get_harga_global_bw100[0]->harga_global;

			$harga_global = $harga_global_bw50 + ((($input_bw_global-50)/(100-50))*($harga_global_bw100-$harga_global_bw50));


		}
		else if( $input_bw_global > 100 && $input_bw_global < 200){

			$query_get_harga_global_bw100 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '100'");
			$harga_global_bw100 = $query_get_harga_global_bw100[0]->harga_global;

			$query_get_harga_global_bw200 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '200'");
			$harga_global_bw200 = $query_get_harga_global_bw200[0]->harga_global;

			$harga_global = $harga_global_bw100 + ((($input_bw_global-100)/(200-100))*($harga_global_bw200-$harga_global_bw100));


		}
		else if( $input_bw_global > 200 && $input_bw_global < 500){

			$query_get_harga_global_bw200 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '200'");
			$harga_global_bw200 = $query_get_harga_global_bw200[0]->harga_global;

			$query_get_harga_global_bw500 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '500'");
			$harga_global_bw500 = $query_get_harga_global_bw500[0]->harga_global;

			$harga_global = $harga_global_bw200 + ((($input_bw_global-200)/(500-200))*($harga_global_bw500-$harga_global_bw200));


		}
			else if( $input_bw_global > 500 && $input_bw_global < 1000){

			$query_get_harga_global_bw500 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '500'");
			$harga_global_bw500 = $query_get_harga_global_bw500[0]->harga_global;

			$query_get_harga_global_bw1000 = DB::select("SELECT harga_global FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '1000'");
			$harga_global_bw1000 = $query_get_harga_global_bw1000[0]->harga_global;

			$harga_global = $harga_global_bw500 + ((($input_bw_global-500)/(1000-500))*($harga_global_bw1000-$harga_global_bw500));


		}


		if($input_daerah == 5 && $input_bw_domestik > 10){

			$result['harga_domestik'] 		= "N/A";
			$result['total_astinet_bb'] 	= "N/A";	

			return response($result);
		}
		else if($input_bw_domestik <= 10 || $input_bw_domestik == 20 || $input_bw_domestik == 50 || $input_bw_domestik == 100 || $input_bw_domestik == 200
		|| $input_bw_domestik == 500 || $input_bw_domestik == 1000){

			$query_get_harga_domestik = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '$input_bw_domestik'");
			
			$harga_domestik = $query_get_harga_domestik[0]->harga_domestik;

		}
		else if( $input_bw_domestik > 10 && $input_bw_domestik < 20){

			$query_get_harga_domestik_bw10 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '10'");
			$harga_domestik_bw10 = $query_get_harga_domestik_bw10[0]->harga_domestik;

			$query_get_harga_domestik_bw20 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '20'");
			$harga_domestik_bw20 = $query_get_harga_domestik_bw20[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw10 + ((($input_bw_domestik-10)/(20-10))*($harga_domestik_bw20-$harga_domestik_bw10));

		}
		else if( $input_bw_domestik > 20 && $input_bw_domestik < 50){

			$query_get_harga_domestik_bw20 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '20'");
			$harga_domestik_bw20 = $query_get_harga_domestik_bw20[0]->harga_domestik;

			$query_get_harga_domestik_bw50 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '50'");
			$harga_domestik_bw50 = $query_get_harga_domestik_bw50[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw20 + ((($input_bw_domestik-20)/(50-20))*($harga_domestik_bw50-$harga_domestik_bw20));

		}
		else if( $input_bw_domestik > 50 && $input_bw_domestik < 100){

			$query_get_harga_domestik_bw50 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '50'");
			$harga_domestik_bw50 = $query_get_harga_domestik_bw50[0]->harga_domestik;

			$query_get_harga_domestik_bw100 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '100'");
			$harga_domestik_bw100 = $query_get_harga_domestik_bw100[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw50 + ((($input_bw_domestik-50)/(100-50))*($harga_domestik_bw100-$harga_domestik_bw50));

		}
		else if( $input_bw_domestik > 100 && $input_bw_domestik < 200){

			$query_get_harga_domestik_bw100 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '100'");
			$harga_domestik_bw100 = $query_get_harga_domestik_bw100[0]->harga_domestik;

			$query_get_harga_domestik_bw200 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb= '200'");
			$harga_domestik_bw200 = $query_get_harga_domestik_bw200[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw100 + ((($input_bw_domestik-100)/(200-100))*($harga_domestik_bw200-$harga_domestik_bw100));

		}
		else if( $input_bw_domestik > 200 && $input_bw_domestik < 500){

			$query_get_harga_domestik_bw200 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '200'");
			$harga_domestik_bw200 = $query_get_harga_domestik_bw200[0]->harga_domestik;

			$query_get_harga_domestik_bw500 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '500'");
			$harga_domestik_bw500 = $query_get_harga_domestik_bw500[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw200 + ((($input_bw_domestik-200)/(500-200))*($harga_domestik_bw500-$harga_domestik_bw200));

		}
		else if( $input_bw_domestik > 500 && $input_bw_domestik < 1000){

			$query_get_harga_domestik_bw500 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '500'");
			$harga_domestik_bw500 = $query_get_harga_domestik_bw500[0]->harga_domestik;

			$query_get_harga_domestik_bw1000 = DB::select("SELECT harga_domestik FROM astinetbb 
				WHERE id_daerah = '$input_daerah' AND bw_astinetbb = '1000'");
			$harga_domestik_bw1000 = $query_get_harga_domestik_bw1000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw500 + ((($input_bw_domestik-500)/(1000-500))*($harga_domestik_bw1000-$harga_domestik_bw500));

		}
		
		$username = $request->session()->get('username');
        $datetime = date("Y-m-d H:i:s");
        
        $query_audittrail = DB::statement("INSERT INTO audit_trail VALUES (NULL, NOW(), '$username', 'astinet bb')");

		$harga_global = ceil($harga_global/1000);
		$harga_global = $harga_global*1000;
		$harga_domestik = ceil($harga_domestik/1000);
		$harga_domestik = $harga_domestik*1000;
		
		$total_astinet_bb = $harga_global+$harga_domestik+$harga_lastmile;

		$result['harga_global'] 	= " ".number_format($harga_global, 0, ",", ".");
		$result['harga_domestik'] 	= " ".number_format($harga_domestik, 0, ",", ".");
		$result['total_astinet_bb'] = " ".number_format($total_astinet_bb, 0, ",", ".");	
		$result['harga_lastmile'] 	= " ".number_format($harga_lastmile, 0, ",", ".");

		return response($result);
	}

	public function calculate_astinet_lite(Request $request)
	{

		$input_daerah 	= $request->input('input_daerah');
		$input_bw_lite 		= $request->input('input_bw_lite');
	

		if($input_bw_lite <= 3 || $input_bw_lite == 5 || $input_bw_lite == 10 || $input_bw_lite == 20 || $input_bw_lite == 30
		|| $input_bw_lite == 40 || $input_bw_lite == 50){

			$query_get_harga_lite = DB::select("SELECT harga_astinetLite FROM astinetlite 
				WHERE id_daerah = '$input_daerah' AND bw_astinetLite = '$input_bw_lite'");
			
			$harga_astinetLite = $query_get_harga_lite[0]->harga_astinetLite;

		}

        $username = $request->session()->get('username');
        $datetime = date("Y-m-d H:i:s");
        
        $query_audittrail = DB::statement("INSERT INTO audit_trail VALUES (NULL, NOW(), '$username', 'astinet lite')");
        
		$harga_astinetLite = ceil($harga_astinetLite/1000);
		$harga_astinetLite = $harga_astinetLite*1000;
		
		$total_astinetLite = $harga_astinetLite;

		$result['harga_astinetLite'] 	= " ".number_format($harga_astinetLite, 0, ",", ".");
		$result['total_astinetLite'] 	= " ".number_format($total_astinetLite, 0, ",", ".");	
	
		return response($result);
	}

	// Calculate Baru
public function calculate_IPtransit(Request $request)
	{

		$input_daerah 	= $request->input('input_daerah');
		$input_bw 		= $request->input('input_bw');
		$input_lastmile = $request->input('radio_lastmile');

		if ($input_lastmile == "yes") {
			$harga_lastmile = 750000;
		}else{
			$harga_lastmile = 0;
		}

		if($input_daerah == 5 && $input_bw > 10){

			$result['harga_IPtransit'] 	= "N/A";
			$result['total_IPtransit'] 	= "N/A";	
			$result['harga_lastmile'] 	= " ".number_format($harga_lastmile, 2, ",", ".");

			return response($result);
		}
		else if($input_bw <= 10 || $input_bw == 20 || $input_bw == 50 || $input_bw == 100 || $input_bw == 200
		|| $input_bw == 500 || $input_bw == 600|| $input_bw == 700|| $input_bw == 800|| $input_bw == 900|| $input_bw == 1000|| $input_bw == 2000|| $input_bw == 3000|| $input_bw == 4000 || $input_bw == 5000|| $input_bw == 6000|| $input_bw == 7000|| $input_bw == 8000|| $input_bw == 9000|| $input_bw == 10000 ){

			$query_get_harga = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '$input_bw'");
			
			$harga_IPtransit = $query_get_harga[0]->harga_IPtransit;

		}
		else if( $input_bw > 10 && $input_bw < 20){

			$query_get_harga_bw10 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '10'");
			$harga_IPtransit_bw10 = $query_get_harga_bw10[0]->harga_IPtransit;

			$query_get_harga_bw20 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '20'");
			$harga_IPtransit_bw20 = $query_get_harga_bw20[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw10 + ((($input_bw-10)/(20-10))*($harga_IPtransit_bw20-$harga_IPtransit_bw10));


		}
		else if( $input_bw > 20 && $input_bw < 50){

			$query_get_harga_bw20 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '20'");
			$harga_IPtransit_bw20 = $query_get_harga_bw20[0]->harga_IPtransit;

			$query_get_harga_bw50 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '50'");
			$harga_IPtransit_bw50 = $query_get_harga_bw50[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw20 + ((($input_bw-20)/(50-20))*($harga_IPtransit_bw50-$harga_IPtransit_bw20));


		}
		else if( $input_bw > 50 && $input_bw < 100){

			$query_get_harga_bw50 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '50'");
			$harga_IPtransit_bw50 = $query_get_harga_bw50[0]->harga_IPtransit;

			$query_get_harga_bw100 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '100'");
			$harga_IPtransit_bw100 = $query_get_harga_bw100[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw50 + ((($input_bw-50)/(100-50))*($harga_IPtransit_bw100-$harga_IPtransit_bw50));


		}
		else if( $input_bw > 100 && $input_bw < 200){

			$query_get_harga_bw100 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '100'");
			$harga_IPtransit_bw100 = $query_get_harga_bw100[0]->harga_IPtransit;

			$query_get_harga_bw200 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '200'");
			$harga_IPtransit_bw200 = $query_get_harga_bw200[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw100 + ((($input_bw-100)/(200-100))*($harga_IPtransit_bw200-$harga_IPtransit_bw100));


		}
		else if( $input_bw > 200 && $input_bw < 500){

			$query_get_harga_bw200 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '200'");
			$harga_IPtransit_bw200 = $query_get_harga_bw200[0]->harga_IPtransit;

			$query_get_harga_bw500 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '500'");
			$harga_IPtransit_bw500 = $query_get_harga_bw500[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw200 + ((($input_bw-200)/(500-200))*($harga_IPtransit_bw500-$harga_IPtransit_bw200));


		}
		else if( $input_bw > 500 && $input_bw < 600){

			$query_get_harga_bw500 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '500'");
			$harga_IPtransit_bw500 = $query_get_harga_bw500[0]->harga_IPtransit;

			$query_get_harga_bw600 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '600'");
			$harga_IPtransit_bw600 = $query_get_harga_bw600[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw500 + ((($input_bw-500)/(600-500))*($harga_IPtransit_bw600-$harga_IPtransit_bw500));


		}
				else if( $input_bw > 600 && $input_bw < 700){

			$query_get_harga_bw600 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '600'");
			$harga_IPtransit_bw600 = $query_get_harga_bw600[0]->harga_IPtransit;

			$query_get_harga_bw700 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '700'");
			$harga_IPtransit_bw700 = $query_get_harga_bw700[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw600 + ((($input_bw-600)/(700-600))*($harga_IPtransit_bw700-$harga_IPtransit_bw600));


		}
		else if( $input_bw > 700 && $input_bw < 800){

			$query_get_harga_bw700 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '700'");
			$harga_IPtransit_bw700 = $query_get_harga_bw700[0]->harga_IPtransit;

			$query_get_harga_bw800 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '800'");
			$harga_IPtransit_bw800 = $query_get_harga_bw800[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw700 + ((($input_bw-700)/(800-700))*($harga_IPtransit_bw800-$harga_IPtransit_bw700));


		}
		else if( $input_bw > 800 && $input_bw < 900){

			$query_get_harga_bw800 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '800'");
			$harga_IPtransit_bw800 = $query_get_harga_bw800[0]->harga_IPtransit;

			$query_get_harga_bw900 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '900'");
			$harga_IPtransit_bw900 = $query_get_harga_bw900[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw800 + ((($input_bw-800)/(900-800))*($harga_IPtransit_bw900-$harga_IPtransit_bw800));


		}
		else if( $input_bw > 900 && $input_bw < 1000){

			$query_get_harga_bw900 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '900'");
			$harga_IPtransit_bw900 = $query_get_harga_bw900[0]->harga_IPtransit;

			$query_get_harga_bw1000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '1000'");
			$harga_IPtransit_bw1000 = $query_get_harga_bw1000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw900 + ((($input_bw-900)/(1000-900))*($harga_IPtransit_bw1000-$harga_IPtransit_bw900));


		}
		else if( $input_bw > 1000 && $input_bw < 2000){

			$query_get_harga_bw1000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '1000'");
			$harga_IPtransit_bw1000 = $query_get_harga_bw1000[0]->harga_IPtransit;

			$query_get_harga_bw2000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '2000'");
			$harga_IPtransit_bw2000 = $query_get_harga_bw2000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw1000 + ((($input_bw-1000)/(2000-1000))*($harga_IPtransit_bw2000-$harga_IPtransit_bw1000));


		}
		else if( $input_bw > 2000 && $input_bw < 3000){

			$query_get_harga_bw2000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '2000'");
			$harga_IPtransit_bw2000 = $query_get_harga_bw2000[0]->harga_IPtransit;

			$query_get_harga_bw3000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '3000'");
			$harga_IPtransit_bw3000 = $query_get_harga_bw3000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw2000 + ((($input_bw-2000)/(3000-2000))*($harga_IPtransit_bw3000-$harga_IPtransit_bw2000));


		}
		else if( $input_bw > 3000 && $input_bw <4000){

			$query_get_harga_bw3000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '3000'");
			$harga_IPtransit_bw3000 = $query_get_harga_bw3000[0]->harga_IPtransit;

			$query_get_harga_bw4000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '4000'");
			$harga_IPtransit_bw4000 = $query_get_harga_bw4000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw3000 + ((($input_bw-3000)/(4000-3000))*($harga_IPtransit_bw4000-$harga_IPtransit_bw3000));


		}
		else if( $input_bw > 4000 && $input_bw < 5000){

			$query_get_harga_bw4000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '4000'");
			$harga_IPtransit_bw4000 = $query_get_harga_bw4000[0]->harga_IPtransit;

			$query_get_harga_bw5000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '5000'");
			$harga_IPtransit_bw5000 = $query_get_harga_bw5000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw4000 + ((($input_bw-4000)/(5000-4000))*($harga_IPtransit_bw5000-$harga_IPtransit_bw400));


		}
		else if( $input_bw > 5000 && $input_bw < 6000){

			$query_get_harga_bw5000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '5000'");
			$harga_IPtransit_bw5000 = $query_get_harga_bw5000[0]->harga_IPtransit;

			$query_get_harga_bw6000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '6000'");
			$harga_IPtransit_bw6000 = $query_get_harga_bw1000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw5000 + ((($input_bw-5000)/(6000-5000))*($harga_IPtransit_bw6000-$harga_IPtransit_bw5000));


		}
		else if( $input_bw > 6000 && $input_bw < 7000){

			$query_get_harga_bw6000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = 6000'");
			$harga_IPtransit_bw6000 = $query_get_harga_bw6000[0]->harga_IPtransit;

			$query_get_harga_bw7000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '7000'");
			$harga_IPtransit_bw7000 = $query_get_harga_bw7000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw6000 + ((($input_bw-6000)/(7000-6000))*($harga_IPtransit_bw7000-$harga_IPtransit_bw6000));


		}
		else if( $input_bw > 7000 && $input_bw < 8000){

			$query_get_harga_bw7000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '7000'");
			$harga_IPtransit_bw7000 = $query_get_harga_bw7000[0]->harga_IPtransit;

			$query_get_harga_bw8000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '8000'");
			$harga_IPtransit_bw8000 = $query_get_harga_bw8000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw7000 + ((($input_bw-7000)/(8000-8000))*($harga_IPtransit_bw8000-$harga_IPtransit_bw7000));


		}
		else if( $input_bw > 8000 && $input_bw < 9000){

			$query_get_harga_bw800 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '8000'");
			$harga_IPtransit_bw8000 = $query_get_harga_bw8000[0]->harga_IPtransit;

			$query_get_harga_bw9000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '9000'");
			$harga_IPtransit_bw9000 = $query_get_harga_bw9000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw8000 + ((($input_bw-8000)/(9000-8000))*($harga_IPtransit_bw9000-$harga_IPtransit_bw8000));


		}
		else if( $input_bw > 9000 && $input_bw < 10000){

			$query_get_harga_bw9000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '9000'");
			$harga_IPtransit_bw9000 = $query_get_harga_bw9000[0]->harga_IPtransit;

			$query_get_harga_bw10000 = DB::select("SELECT harga_IPtransit FROM IPtransit 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransit = '10000'");
			$harga_IPtransit_bw10000 = $query_get_harga_bw10000[0]->harga_IPtransit;

			$harga_IPtransit = $harga_IPtransit_bw9000 + ((($input_bw-9000)/(10000-9000))*($harga_IPtransit_bw10000-$harga_IPtransit_bw9000));


		}


        $username = $request->session()->get('username');
        $datetime = date("Y-m-d H:i:s");
        
        $query_audittrail = DB::statement("INSERT INTO audit_trail VALUES (NULL, NOW(), '$username', 'IPtransit')");
        
		$harga_IPtransit = ($harga_IPtransit/1000);
		$harga_IPtransit = $harga_IPtransit*1000;
		
		$total_IPtransit = $harga_IPtransit+$harga_lastmile;

		$result['harga_IPtransit'] 	= " ".number_format($harga_IPtransit, 0, ",", ".");
		$result['total_IPtransit'] 	= " ".number_format($total_IPtransit, 0, ",", ".");	
		$result['harga_lastmile'] 	= " ".number_format($harga_lastmile, 0, ",", ".");

		return response($result);
	}

	public function calculate_IPtransit_bb(Request $request)
	{

		$input_daerah 		= $request->input('input_daerah');
		$input_bw_global 	= $request->input('input_bw_global');
		$input_bw_domestik 	= $request->input('input_bw_domestik');
		$input_lastmile 	= $request->input('radio_lastmile');

		if ($input_lastmile == "yes") {
			$harga_lastmile = 750000;
		}else{
			$harga_lastmile = 0;
		}

		
		if($input_daerah == 5 && $input_bw_global > 10){

			$result['harga_global'] 			= "N/A";
			$result['total_IPtransit_bb'] 		= "N/A";	

			return response($result);
		}
		else if($input_bw_global <= 10 || $input_bw_global == 20 || $input_bw_global == 50 || $input_bw_global == 100 || $input_bw_global == 200
		|| $input_bw_global == 500 || $input_bw_global == 600|| $input_bw_global == 700|| $input_bw_global == 800|| $input_bw_global == 900|| $input_bw_global == 1000|| $input_bw_global == 2000|| $input_bw_global == 3000|| $input_bw_global == 4000 || $input_bw_global == 5000|| $input_bw_global == 6000|| $input_bw_global == 7000|| $input_bw_global == 8000|| $input_bw_global == 9000|| $input_bw_global == 10000 ){

			$query_get_harga_global = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '$input_bw_global'");
			
			$harga_global = $query_get_harga_global[0]->harga_global;

		}
		else if( $input_bw_global > 10 && $input_bw_global < 20){

			$query_get_harga_global_bw10 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '10'");
			$harga_global_bw10 = $query_get_harga_global_bw10[0]->harga_global;

			$query_get_harga_global_bw20 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '20'");
			$harga_global_bw20 = $query_get_harga_global_bw20[0]->harga_global;

			$harga_global = $harga_global_bw10 + ((($input_bw_global-10)/(20-10))*($harga_global_bw20-$harga_global_bw10));


		}
		else if( $input_bw_global > 20 && $input_bw_global < 50){

			$query_get_harga_global_bw20 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '20'");
			$harga_global_bw20 = $query_get_harga_global_bw20[0]->harga_global;

			$query_get_harga_global_bw50 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '50'");
			$harga_global_bw50 = $query_get_harga_global_bw50[0]->harga_global;

			$harga_global = $harga_global_bw20 + ((($input_bw_global-20)/(50-20))*($harga_global_bw50-$harga_global_bw20));


		}
		else if( $input_bw_global > 50 && $input_bw_global < 100){

			$query_get_harga_global_bw50 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '50'");
			$harga_global_bw50 = $query_get_harga_global_bw50[0]->harga_global;

			$query_get_harga_global_bw100 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '100'");
			$harga_global_bw100 = $query_get_harga_global_bw100[0]->harga_global;

			$harga_global = $harga_global_bw50 + ((($input_bw_global-50)/(100-50))*($harga_global_bw100-$harga_global_bw50));


		}
		else if( $input_bw_global > 100 && $input_bw_global < 200){

			$query_get_harga_global_bw100 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '100'");
			$harga_global_bw100 = $query_get_harga_global_bw100[0]->harga_global;

			$query_get_harga_global_bw200 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '200'");
			$harga_global_bw200 = $query_get_harga_global_bw200[0]->harga_global;

			$harga_global = $harga_global_bw100 + ((($input_bw_global-100)/(200-100))*($harga_global_bw200-$harga_global_bw100));


		}
		else if( $input_bw_global > 200 && $input_bw_global < 500){

			$query_get_harga_global_bw200 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '200'");
			$harga_global_bw200 = $query_get_harga_global_bw200[0]->harga_global;

			$query_get_harga_global_bw500 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '500'");
			$harga_global_bw500 = $query_get_harga_global_bw500[0]->harga_global;

			$harga_global = $harga_global_bw200 + ((($input_bw_global-200)/(500-200))*($harga_global_bw500-$harga_global_bw200));


		}
		else if( $input_bw_global > 500 && $input_bw_global < 600){

			$query_get_harga_global_bw500 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '500'");
			$harga_global_bw500 = $query_get_harga_global_bw500[0]->harga_global;

			$query_get_harga_global_bw600 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '600'");
			$harga_global_bw600 = $query_get_harga_global_bw600[0]->harga_global;

			$harga_global = $harga_global_bw500 + ((($input_bw_global-500)/(600-500))*($harga_global_bw600-$harga_global_bw500));


		}
		else if( $input_bw_global > 600 && $input_bw_global < 700){

			$query_get_harga_global_bw600 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '600'");
			$harga_global_bw600 = $query_get_harga_global_bw600[0]->harga_global;

			$query_get_harga_global_bw700 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '700'");
			$harga_global_bw700 = $query_get_harga_global_bw700[0]->harga_global;

			$harga_global = $harga_global_bw600 + ((($input_bw_global-600)/(700-600))*($harga_global_bw700-$harga_global_bw600));


		}
		else if( $input_bw_global > 700 && $input_bw_global < 800){

			$query_get_harga_global_bw700 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '700'");
			$harga_global_bw700 = $query_get_harga_global_bw700[0]->harga_global;

			$query_get_harga_global_bw800 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '800'");
			$harga_global_bw800 = $query_get_harga_global_bw800[0]->harga_global;

			$harga_global = $harga_global_bw700 + ((($input_bw_global-700)/(800-700))*($harga_global_bw800-$harga_global_bw700));


		}
		else if( $input_bw_global > 800 && $input_bw_global < 900){

			$query_get_harga_global_bw800 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '800'");
			$harga_global_bw800 = $query_get_harga_global_bw800[0]->harga_global;

			$query_get_harga_global_bw900 = DB::select("SELECT hargabb_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbbbb = '900'");
			$harga_global_bw900 = $query_get_harga_global_bw500[0]->harga_global;

			$harga_global = $harga_global_bw800 + ((($input_bw_global-800)/(900-800))*($harga_global_bw900-$harga_global_bw800));


		}
		else if( $input_bw_global > 900 && $input_bw_global < 1000){

			$query_get_harga_global_bw900 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '900'");
			$harga_global_bw900 = $query_get_harga_global_bw900[0]->harga_global;

			$query_get_harga_global_bw1000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '1000'");
			$harga_global_bw1000 = $query_get_harga_global_bw1000[0]->harga_global;

			$harga_global = $harga_global_bw900 + ((($input_bw_global-900)/(1000-900))*($harga_global_bw1000-$harga_global_bw900));


		}
		else if( $input_bw_global > 1000 && $input_bw_global < 2000){

			$query_get_harga_global_bw1000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '1000'");
			$harga_global_bw1000 = $query_get_harga_global_bw1000[0]->harga_global;

			$query_get_harga_global_bw2000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '2000'");
			$harga_global_bw2000 = $query_get_harga_global_bw2000[0]->harga_global;

			$harga_global = $harga_global_bw1000 + ((($input_bw_global-1000)/(2000-1000))*($harga_global_bw2000-$harga_global_bw1000));


		}
		else if( $input_bw_global > 2000 && $input_bw_global < 3000){

			$query_get_harga_global_bw2000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '2000'");
			$harga_global_bw2000 = $query_get_harga_global_bw2000[0]->harga_global;

			$query_get_harga_global_bw3000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '3000'");
			$harga_global_bw3000 = $query_get_harga_global_bw3000[0]->harga_global;

			$harga_global = $harga_global_bw2000 + ((($input_bw_global-2000)/(3000-2000))*($harga_global_bw3000-$harga_global_bw2000));


		}
		else if( $input_bw_global > 3000 && $input_bw_global < 4000){

			$query_get_harga_global_bw3000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '3000'");
			$harga_global_bw3000 = $query_get_harga_global_bw3000[0]->harga_global;

			$query_get_harga_global_bw4000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '4000'");
			$harga_global_bw4000 = $query_get_harga_global_bw4000[0]->harga_global;

			$harga_global = $harga_global_bw3000 + ((($input_bw_global-3000)/(4000-3000))*($harga_global_bw4000-$harga_global_bw3000));


		}
		else if( $input_bw_global > 4000 && $input_bw_global < 5000){

			$query_get_harga_global_bw4000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '4000'");
			$harga_global_bw4000 = $query_get_harga_global_bw4000[0]->harga_global;

			$query_get_harga_global_bw5000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '5000'");
			$harga_global_bw5000 = $query_get_harga_global_bw5000[0]->harga_global;

			$harga_global = $harga_global_bw4000 + ((($input_bw_global-4000)/(5000-4000))*($harga_global_bw5000-$harga_global_bw4000));

		}
		else if( $input_bw_global > 5000 && $input_bw_global < 6000){

			$query_get_harga_global_bw5000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '5000'");
			$harga_global_bw5000 = $query_get_harga_global_bw5000[0]->harga_global;

			$query_get_harga_global_bw6000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '6000'");
			$harga_global_bw6000 = $query_get_harga_global_bw6000[0]->harga_global;

			$harga_global = $harga_global_bw5000 + ((($input_bw_global-5000)/(6000-5000))*($harga_global_bw6000-$harga_global_bw5000));


		}
		else if( $input_bw_global > 6000 && $input_bw_global < 7000){

			$query_get_harga_global_bw6000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '6000'");
			$harga_global_bw6000 = $query_get_harga_global_bw6000[0]->harga_global;

			$query_get_harga_global_bw7000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '7000'");
			$harga_global_bw7000 = $query_get_harga_global_bw7000[0]->harga_global;

			$harga_global = $harga_global_bw6000 + ((($input_bw_global-6000)/(7000-6000))*($harga_global_bw7000-$harga_global_bw6000));


		}
		else if( $input_bw_global > 7000 && $input_bw_global < 8000){

			$query_get_harga_global_bw7000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '7000'");
			$harga_global_bw7000 = $query_get_harga_global_bw7000[0]->harga_global;

			$query_get_harga_global_bw8000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '8000'");
			$harga_global_bw8000 = $query_get_harga_global_bw8000[0]->harga_global;

			$harga_global = $harga_global_bw7000 + ((($input_bw_global-7000)/(8000-7000))*($harga_global_bw8000-$harga_global_bw7000));


		}
		else if( $input_bw_global > 8000 && $input_bw_global < 9000){

			$query_get_harga_global_bw8000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '8000'");
			$harga_global_bw8000 = $query_get_harga_global_bw8000[0]->harga_global;

			$query_get_harga_global_bw9000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '9000'");
			$harga_global_bw9000 = $query_get_harga_global_bw9000[0]->harga_global;

			$harga_global = $harga_global_bw8000 + ((($input_bw_global-8000)/(9000-8000))*($harga_global_bw9000-$harga_global_bw8000));


		}
		else if( $input_bw_global > 9000 && $input_bw_global < 10000){

			$query_get_harga_global_bw9000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '9000'");
			$harga_global_bw9000 = $query_get_harga_global_bw9000[0]->harga_global;

			$query_get_harga_global_bw10000 = DB::select("SELECT harga_global FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '10000'");
			$harga_global_bw10000 = $query_get_harga_global_bw10000[0]->harga_global;

			$harga_global = $harga_global_bw9000 + ((($input_bw_global-9000)/(10000-9000))*($harga_global_bw10000-$harga_global_bw9000));
		}

		if($input_daerah == 5 && $input_bw_domestik > 10){

			$result['harga_domestik'] 		= "N/A"; 
			$result['total_IPtransit_bb'] 	= "N/A";	

			return response($result);
		}
		else if($input_bw_domestik <= 10 || $input_bw_domestik == 20 || $input_bw_domestik == 50 || $input_bw_domestik == 100 || $input_bw_domestik == 200
		|| $input_bw_domestik == 500 || $input_bw_domestik == 600|| $input_bw_domestik == 700|| $input_bw_domestik == 800|| $input_bw_domestik == 900|| $input_bw_domestik == 1000|| $input_bw_domestik == 2000|| $input_bw_domestik == 3000|| $input_bw_domestik == 4000 || $input_bw_domestik == 5000|| $input_bw_domestik == 6000|| $input_bw_domestik == 7000|| $input_bw_domestik == 8000|| $input_bw_domestik == 9000|| $input_bw_domestik == 10000){

			$query_get_harga_domestik = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '$input_bw_domestik'");
			
			$harga_domestik = $query_get_harga_domestik[0]->harga_domestik;

		}
		else if( $input_bw_domestik > 10 && $input_bw_domestik < 20){

			$query_get_harga_domestik_bw10 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '10");
			$harga_domestik_bw10 = $query_get_harga_domestik_bw10[0]->harga_domestik;

			$query_get_harga_domestik_bw20 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '20'");
			$harga_domestik_bw20 = $query_get_harga_domestik_bw20[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw10 + ((($input_bw_domestik-10)/(20-10))*($harga_domestik_bw20-$harga_domestik_bw10));

		}
		else if( $input_bw_domestik > 20 && $input_bw_domestik < 50){

			$query_get_harga_domestik_bw20 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '20'");
			$harga_domestik_bw20 = $query_get_harga_domestik_bw20[0]->harga_domestik;

			$query_get_harga_domestik_bw50 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '50'");
			$harga_domestik_bw50 = $query_get_harga_domestik_bw50[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw20 + ((($input_bw_domestik-20)/(50-20))*($harga_domestik_bw50-$harga_domestik_bw20));

		}
		else if( $input_bw_domestik > 50 && $input_bw_domestik < 100){

			$query_get_harga_domestik_bw50 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '50'");
			$harga_domestik_bw50 = $query_get_harga_domestik_bw50[0]->harga_domestik;

			$query_get_harga_domestik_bw100 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '100'");
			$harga_domestik_bw100 = $query_get_harga_domestik_bw100[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw50 + ((($input_bw_domestik-50)/(100-50))*($harga_domestik_bw100-$harga_domestik_bw50));

		}
		else if( $input_bw_domestik > 100 && $input_bw_domestik < 200){

			$query_get_harga_domestik_bw100 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '100'");
			$harga_domestik_bw100 = $query_get_harga_domestik_bw100[0]->harga_domestik;

			$query_get_harga_domestik_bw200 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '200'");
			$harga_domestik_bw200 = $query_get_harga_domestik_bw200[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw100 + ((($input_bw_domestik-100)/(200-100))*($harga_domestik_bw200-$harga_domestik_bw100));

		}
		else if( $input_bw_domestik > 200 && $input_bw_domestik < 500){

			$query_get_harga_domestik_bw200 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '200'");
			$harga_domestik_bw200 = $query_get_harga_domestik_bw200[0]->harga_domestik;

			$query_get_harga_domestik_bw500 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '500'");
			$harga_domestik_bw500 = $query_get_harga_domestik_bw500[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw200 + ((($input_bw_domestik-200)/(500-200))*($harga_domestik_bw500-$harga_domestik_bw200));

		}
		else if( $input_bw_domestik > 200 && $input_bw_domestik < 500){

			$query_get_harga_domestik_bw200 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '200'");
			$harga_domestik_bw200 = $query_get_harga_domestik_bw200[0]->harga_domestik;

			$query_get_harga_domestik_bw500 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '500'");
			$harga_domestik_bw500 = $query_get_harga_domestik_bw500[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw200 + ((($input_bw_domestik-200)/(500-200))*($harga_domestik_bw500-$harga_domestik_bw200));

		}
		else if( $input_bw_domestik > 500 && $input_bw_domestik < 600){

			$query_get_harga_domestik_bw500 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '500'");
			$harga_domestik_bw500 = $query_get_harga_domestik_bw500[0]->harga_domestik;

			$query_get_harga_domestik_bw600 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '600'");
			$harga_domestik_bw600 = $query_get_harga_domestik_bw600[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw500 + ((($input_bw_domestik-500)/(600-500))*($harga_domestik_bw600-$harga_domestik_bw500));

		}
		else if( $input_bw_domestik > 600 && $input_bw_domestik < 700){

			$query_get_harga_domestik_bw600 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '600'");
			$harga_domestik_bw600 = $query_get_harga_domestik_bw600[0]->harga_domestik;

			$query_get_harga_domestik_bw700 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '700'");
			$harga_domestik_bw700 = $query_get_harga_domestik_bw700[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw600 + ((($input_bw_domestik-600)/(700-600))*($harga_domestik_bw700-$harga_domestik_bw600));

		}
		else if( $input_bw_domestik > 700 && $input_bw_domestik < 800){

			$query_get_harga_domestik_bw700 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '700'");
			$harga_domestik_bw700 = $query_get_harga_domestik_bw700[0]->harga_domestik;

			$query_get_harga_domestik_bw800 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '800'");
			$harga_domestik_bw800 = $query_get_harga_domestik_bw800[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw700 + ((($input_bw_domestik-700)/(800-700))*($harga_domestik_bw800-$harga_domestik_bw700));

		}
		else if( $input_bw_domestik > 800 && $input_bw_domestik < 900){

			$query_get_harga_domestik_bw800 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '800'");
			$harga_domestik_bw800 = $query_get_harga_domestik_bw800[0]->harga_domestik;

			$query_get_harga_domestik_bw900 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '900'");
			$harga_domestik_bw900 = $query_get_harga_domestik_bw900[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw800 + ((($input_bw_domestik-800)/(900-800))*($harga_domestik_bw900-$harga_domestik_bw800));

		}
		else if( $input_bw_domestik > 900 && $input_bw_domestik < 1000){

			$query_get_harga_domestik_bw900 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '900'");
			$harga_domestik_bw900 = $query_get_harga_domestik_bw900[0]->harga_domestik;

			$query_get_harga_domestik_bw1000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '1000'");
			$harga_domestik_bw1000 = $query_get_harga_domestik_bw1000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw900 + ((($input_bw_domestik-900)/(1000-900))*($harga_domestik_bw1000-$harga_domestik_bw900));

		}
		else if( $input_bw_domestik > 1000 && $input_bw_domestik < 2000){

			$query_get_harga_domestik_bw1000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '1000'");
			$harga_domestik_bw1000 = $query_get_harga_domestik_bw1000[0]->harga_domestik;

			$query_get_harga_domestik_bw2000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '2000'");
			$harga_domestik_bw2000 = $query_get_harga_domestik_bw2000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw1000 + ((($input_bw_domestik-1000)/(2000-1000))*($harga_domestik_bw2000-$harga_domestik_bw1000));

		}
		else if( $input_bw_domestik > 2000 && $input_bw_domestik < 3000){

			$query_get_harga_domestik_bw2000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '2000'");
			$harga_domestik_bw2000 = $query_get_harga_domestik_bw2000[0]->harga_domestik;

			$query_get_harga_domestik_bw3000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '3000'");
			$harga_domestik_bw3000 = $query_get_harga_domestik_bw3000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw2000 + ((($input_bw_domestik-2000)/(3000-2000))*($harga_domestik_bw3000-$harga_domestik_bw2000));

		}
		else if( $input_bw_domestik > 3000 && $input_bw_domestik < 4000){

			$query_get_harga_domestik_bw3000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '3000'");
			$harga_domestik_bw3000 = $query_get_harga_domestik_bw3000[0]->harga_domestik;

			$query_get_harga_domestik_bw4000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '4000'");
			$harga_domestik_bw4000 = $query_get_harga_domestik_bw4000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw3000 + ((($input_bw_domestik-3000)/(4000-3000))*($harga_domestik_bw4000-$harga_domestik_bw3000));

		}
		else if( $input_bw_domestik > 4000 && $input_bw_domestik < 5000){

			$query_get_harga_domestik_bw4000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '4000'");
			$harga_domestik_bw4000 = $query_get_harga_domestik_bw4000[0]->harga_domestik;

			$query_get_harga_domestik_bw5000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '5000'");
			$harga_domestik_bw5000 = $query_get_harga_domestik_bw5000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw4000 + ((($input_bw_domestik-4000)/(5000-4000))*($harga_domestik_bw5000-$harga_domestik_bw4000));

		}
		else if( $input_bw_domestik > 5000 && $input_bw_domestik < 6000){

			$query_get_harga_domestik_bw5000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '5000'");
			$harga_domestik_bw5000 = $query_get_harga_domestik_bw5000[0]->harga_domestik;

			$query_get_harga_domestik_bw6000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '6000'");
			$harga_domestik_bw6000 = $query_get_harga_domestik_bw6000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw5000 + ((($input_bw_domestik-5000)/(6000-5000))*($harga_domestik_bw6000-$harga_domestik_bw5000));

		}
		else if( $input_bw_domestik > 6000 && $input_bw_domestik < 7000){

			$query_get_harga_domestik_bw6000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '6000'");
			$harga_domestik_bw6000 = $query_get_harga_domestik_bw6000[0]->harga_domestik;

			$query_get_harga_domestik_bw7000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '7000'");
			$harga_domestik_bw7000 = $query_get_harga_domestik_bw7000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw6000 + ((($input_bw_domestik-6000)/(7000-6000))*($harga_domestik_bw7000-$harga_domestik_bw6000));

		}
		else if( $input_bw_domestik > 7000 && $input_bw_domestik < 8000){

			$query_get_harga_domestik_bw7000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '7000'");
			$harga_domestik_bw7000 = $query_get_harga_domestik_bw7000[0]->harga_domestik;

			$query_get_harga_domestik_bw8000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '8000'");
			$harga_domestik_bw8000 = $query_get_harga_domestik_bw8000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw7000 + ((($input_bw_domestik-7000)/(8000-7000))*($harga_domestik_bw8000-$harga_domestik_bw7000));

		}
		else if( $input_bw_domestik > 8000 && $input_bw_domestik < 9000){

			$query_get_harga_domestik_bw8000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '8000'");
			$harga_domestik_bw8000 = $query_get_harga_domestik_bw8000[0]->harga_domestik;

			$query_get_harga_domestik_bw9000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '9000'");
			$harga_domestik_bw9000 = $query_get_harga_domestik_bw9000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw8000 + ((($input_bw_domestik-8000)/(9000-8000))*($harga_domestik_bw9000-$harga_domestik_bw8000));

		}
		else if( $input_bw_domestik > 9000 && $input_bw_domestik < 10000){

			$query_get_harga_domestik_bw9000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '9000'");
			$harga_domestik_bw9000 = $query_get_harga_domestik_bw9000[0]->harga_domestik;

			$query_get_harga_domestik_bw10000 = DB::select("SELECT harga_domestik FROM IPtransitbb 
				WHERE id_daerah = '$input_daerah' AND bw_IPtransitbb = '10000'");
			$harga_domestik_bw10000 = $query_get_harga_domestik_bw10000[0]->harga_domestik;

			$harga_domestik = $harga_domestik_bw9000 + ((($input_bw_domestik-9000)/(10000-9000))*($harga_domestik_bw10000-$harga_domestik_bw9000));

		}
		
		$username = $request->session()->get('username');
        $datetime = date("Y-m-d H:i:s");
        
        $query_audittrail = DB::statement("INSERT INTO audit_trail VALUES (NULL, NOW(), '$username', 'IPtransitbb')");

		$harga_global = ($harga_global/1000);
		$harga_global = $harga_global*1000;
		$harga_domestik = ($harga_domestik/1000);
		$harga_domestik = $harga_domestik*1000;
		
		$total_IPtransit_bb = $harga_global+$harga_domestik+$harga_lastmile;

		$result['harga_global'] 	= " ".number_format($harga_global, 0, ",", ".");
		$result['harga_domestik'] 	= " ".number_format($harga_domestik, 0, ",", ".");
		$result['total_IPtransit_bb'] = " ".number_format($total_IPtransit_bb, 0, ",", ".");	
		$result['harga_lastmile'] 	= " ".number_format($harga_lastmile, 0, ",", ".");

		return response($result);
	}
	// Baru Selesai

}