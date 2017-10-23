<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function oauth(Request $request)
	{	

		if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
            $user = User::select('name','last_name','remember_token')
			->where('email','=',$request->email)		
			->get();
			$msg = "Token obtido com sucesso";
        }else{
            $user = '[]';
            $msg = "Usuário e senha invalidos";

        }		
		try{
			
			$res = array(
				'status' => 1,
				'data' => $user,
				'message' => $msg,
				'log' => $msg
			);
		}catch(Exception $e){
			$res = array(
				'status' => 0,
				'data' => $user,
				'message' => "Erro ao obeter token !",
				'log' => "Error: - " . $e->getMessage()
			);
		}		
		echo json_encode($res);		
	}
}
