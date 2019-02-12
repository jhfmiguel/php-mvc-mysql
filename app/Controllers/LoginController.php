<?php

namespace App\Controllers;

use FrameworkAULA\Http\Controller;
use App\Model\UserModel;

class LoginController extends Controller{

	public function insert($d){
		
	}

	public function update($d, $where){
		
	}

	public function delete($d){
		
	}


	public function index(){
		$this->service->render('login/index.phtml');
	}





	public function loginPost(){

		$model = new UserModel();
		if($model->checkVarsIsNotNull($_POST)){
			$result = $model->autentication($_POST["login"], $_POST["password"]);
			if($result){
				$this->response->redirect(base_url()."/")->send();
			}else{
				$this->response->redirect(base_url()."/login")->send();
			}
		}else{
			$this->response->redirect(base_url()."/login")->send();
		}
	}



	public function logout(){
		$model = new UserModel();
		$model->logout();
		$this->response->redirect(base_url()."/login")->send();
	}


	
}

?>