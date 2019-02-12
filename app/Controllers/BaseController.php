<?php

namespace App\Controllers;

use FrameworkAULA\Http\Controller;
use App\Model\UserModel;


class BaseController extends Controller{

	public function __loadVars($request, $response, $app){
		parent::__loadVars($request, $response, $app);

		$auth = new UserModel();
		if(!$auth->isAuth()){
			$this->response->redirect(base_url()."/login")->send();
		}


		$this->service->layout(VIEWS.'/layouts/default.phtml');
	}



	
}

?>