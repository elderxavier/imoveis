<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ImoveisModel;
use App\User;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ImoveisController extends Controller
{
	public function __construct()
	{
		//$this->middleware('auth');		
	}

	private function isChecked(){		
		//$client = new \GuzzleHttp\Client();
		$isChecked = false;

		if(\Auth::check()){
			$isChecked = true;			
		}

		if( isset($_REQUEST['token']) ){
			$user = User::where("remember_token", $_REQUEST['token'])->count();
			if($user){
				$isChecked = true;
			}

		}

		if(!$isChecked){
			header('Location: /');
			die();
		}
		
	}

	public function index()
	{	
		$this->isChecked();
		$imoveis = ImoveisModel::orderBy('created_at', 'desc')->get();
		$imobiliarias = ImoveisModel::select('imobiliaria')->groupBy('imobiliaria')->get();	
		return view('home',['imoveis' => $imoveis, 'imobiliarias'=>$imobiliarias]);

	}

	public function edit(Request $request, $id)
	{    	
		$this->isChecked();
		$imovel = ImoveisModel::findOrFail($id);
		
		if(count($imovel) > 0){
			return view('imoveis.edit', ['imovel'=>$imovel]);
		}else{
			
		}

	}

	public function add()
	{   
		$this->isChecked(); 	
		return view('imoveis.add');

	}

	public function insert(Request $request)
	{ 	$this->isChecked();	
		$imovel = new ImoveisModel();
		try{
			$imovel->imobiliaria =  $request->imobiliaria;
			$imovel->type = $request->type;
			$imovel->description = $request->description;
			$imovel->adress = $request->adress;
			$imovel->save();
			$res = array(
				'status' => 1,
				'data' => $imovel,
				'message' => "Registro adicionado com sucesso !",
				'log' => "Sucess: - Registro alterado com sucesso !"
			);
		}catch(Exception $e){
			$res = array(
				'status' => 0,
				'data' => $imovel,
				'message' => "Erro ao adicionado registro !",
				'log' => "Error: - " . $e->getMessage()
			);
		}		
		echo json_encode($res);        
	}

	public function update(Request $request)
	{
		$this->isChecked();
		$imovel = ImoveisModel::findOrFail($request->id);
		try{
			$imovel->imobiliaria =  $request->imobiliaria;
			$imovel->type = $request->type;
			$imovel->description = $request->description;
			$imovel->adress = $request->adress;
			$imovel->save();
			$res = array(
				'status' => 1,
				'data' => $imovel,
				'message' => "Registro alterado com sucesso !",
				'log' => "Sucess: - Registro alterado com sucesso !"
			);
		}catch(Exception $e){
			$res = array(
				'status' => 0,
				'data' => $imovel,
				'message' => "Erro ao alterar registro !",
				'log' => "Error: - " . $e->getMessage()
			);
		}		
		echo json_encode($res);        
	}

	

	public function delete(Request $request)
	{
		$this->isChecked();		
		$imovel = ImoveisModel::findOrFail($request->id);		
		try{			
			$imovel->delete();			
			$res = array(
				'status' => 1,
				'data' => $imovel,
				'message' => "Registro alterado com sucesso !",
				'log' => "Sucess: - Registro alterado com sucesso !"
			);
		}catch(Exception $e){
			$res = array(
				'status' => 0,
				'data' => $imovel,
				'message' => "Erro ao alterar registro !",
				'log' => "Error: - " . $e->getMessage()
			);
		}		
		echo json_encode($res);        
		
	}	

	public function search($q=null, $v =null)
	{
		$this->isChecked();
		$imovel = "[]";
		if( !is_null($q) ){
			$imovel = ImoveisModel::where("$q", 'LIKE', "%$v%")->orderBy('created_at', 'desc')->get();		
		}else{
			$imovel = ImoveisModel::orderBy('created_at', 'desc')->get();
		}
		try{			
			$res = array(
				'status' => 1,
				'data' => $imovel,
				'message' => "Registro listado com sucesso !",
				'log' => "Sucess: - Registro listado com sucesso !"
			);
		}catch(Exception $e){
			$res = array(
				'status' => 0,
				'data' => $imovel,
				'message' => "Erro ao listar registro !",
				'log' => "Error: - " . $e->getMessage()
			);
		}		
		echo json_encode($res);		
	}	

	


}
