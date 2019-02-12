<?php

namespace App\Model;

use FrameworkAULA\Data\Model;

class ContactModel extends Model{
	protected $table = "contact";


	public function checkVarsIsNotNull(array $array){
		if(!IsNullOrEmpty($_POST["nome"]) && !IsNullOrEmpty($_POST["email"]) && !IsNullOrEmpty($_POST["phone"]))
			return true;
		return false;
	
	}
}