<?php

namespace App\Model;

use FrameworkAULA\Data\Model;
use FrameworkAULA\Data\Session;

class UserModel extends Model{
	protected $table = "user";

	/**
	*@return bool
	*/
	public function isAuth(){
		$data = Session::getInstance();
		if($data->authenticado = true){
			return true;
		return false;
		}
		
	}

	/**
	*@return bool
	*/
	public function autentication($login, $password){

		$dataUser=$this->read("*", "login='{$login}' and password=md5('{$password}')");
		
		if(count($dataUser) > 0){
			$login = $dataUser[0];
			$data = Session::getInstance();
			$data->authenticado = true;
			$data->login->$login["login"];
			return true;
		}

		
	}


	public function logout(){
		$data = Session::getInstance();
		$data->destroy();
	}


	public function checkVarsIsNotNull(array $array){
		if(!IsNullOrEmpty($_POST["login"]) && !IsNullOrEmpty($_POST["password"]))
			return true;
		return false;
	
	}
	
	
}