<?php

namespace App\Controllers;

use FrameworkAULA\Http\Controller;
use App\Model\ContactModel;

class IndexController extends BaseController{

	public function index(){
		$model = new ContactModel();
		$dados["contacts"] = $model->read();

		$this->service->render('home/list.home.phtml', $dados);
		
	}


	public function cadCliente(){
		$this->service->render('home/cad.home.phtml');
		
	}


	public function cadClientePost(){
		

			$model = new ContactModel();

	if($model->checkVarsIsNotNull($_POST)){

			$dados = array('nome' => $_POST["nome"], "phone" => $_POST["phone"], "email" => $_POST["email"] );
			$result = $model->insert($dados);

			if($result){
				$this->response->redirect(base_url())->send();
			} else{
				$this->response->redirect(base_url()."/erroCadastro")->send();
			}

		}
	else{
			$this->response->redirect(base_url()."/cadastro")->send();
		}

		
	}


	public function editCliente(){

		$id = $this->request->id;
		$model = new ContactModel();
		
		$result = $model->read("*", "id_contact={$id}");
		if(count($result) > 0){
			$dados["contact"] = $result[0];
			$this->service->render('home/edit.home.phtml', $dados);
		}else{
			$this->response->redirect(base_url())->send();
		}
		}
		

		
		
	public function editClientePost(){

		$id = $this->request->id;
		$model = new ContactModel();

	if($model->checkVarsIsNotNull($_POST)){



			$dados = array('nome' => $_POST["nome"], "phone" => $_POST["phone"], "email" => $_POST["email"] );
			$result = $model->update($dados, "id_contact={$id}");

			if($result > 0){
				$this->response->redirect(base_url())->send();
			} else{
				$this->response->redirect(base_url()."/erroUpdate")->send();
			}

		}
	else{
			$this->response->redirect(base_url()."/editar")->send();
		}

	 }




	public function deleteCliente(){
		$id = $this->request->id;
		$model = new ContactModel();

		$result = $model->delete("id_contact={$id}");

		if($result > 0){
				$this->response->redirect(base_url())->send();
			} else{
				$this->response->redirect(base_url()."/erroDelete")->send();
			}

	}



	public function erroUpdate(){
		echo "Erro ao Atualizar";
	}

	public function erroCadastro(){
		echo "Erro ao Cadastrar";
	}

	public function erroDelete(){
		echo "Erro ao Deletar";
	}



	

}

?>