<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

	public function login_process(Request $request){

		$username 	= $request->input('username');
		$password 	= $request->input('password');

		$query_check_user = DB::select("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		
		if(count($query_check_user) == 1){
		    
		    $flag_admin = $query_check_user[0]->flag_admin;

			$request->session()->put('username', $username);
			$request->session()->put('password', $password);
			$request->session()->put('flag_admin', $flag_admin);
			$result['login'] = true;				

		}else{

			$result['login'] = false;
		}

		return $result;
		
	}
	
		public function ubah_password_page(){

		return view('ubah_password');
		
	}

	public function logout_process(Request $request){

		$request->session()->flush();

		return redirect('/');
	}


	public function ubah_password(Request $request){

		$password 				= $request->input('password');
		$password_baru 			= $request->input('password_baru');
		$password_verifikasi 	= $request->input('password_verifikasi');


		$username 				= $request->session()->get('username');

		$query_check_user = DB::select("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		

		if(count($query_check_user) == 1){

			$query_ubah_password = DB::statement("UPDATE user SET password = '$password_baru' WHERE username = '$username'");
			$result['result'] = true;

		}else{

			$result['result'] = false;
		}

		return $result;
		
	}

	
}
?>