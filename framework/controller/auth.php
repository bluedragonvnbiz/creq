<?php
class BJ_auth_Controller extends Pv_Class{
	function __construct(){
		$action = !empty($_GET['action']) ? $_GET['action'] : "";
		if($action == "register"){
			$this->register(); 
		}else{
			$this->login(); 
		}	    
	}

	private function login(){
		$this->CSS("auth");
		$this->View("auth/login");
	}

	private function register(){
		$this->CSS("auth");
		$this->JS("register");
		get_template_part("template/header","back");
		$this->View("auth/register");
		get_template_part("template/svg","code");
	}
} //end class