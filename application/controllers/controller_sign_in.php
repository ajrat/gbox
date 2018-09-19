<?php

class Controller_Sign_in extends Controller
{

	function action_index()
	{	

		if (!empty($_COOKIE["signin"])){
			require_once "./application/databases/user.php";
			if ($_COOKIE["signin"]==$salt) {
				header("Location: admin");
			}
		}
		$senddata["testvar"] = "hello, world!";
		$senddata["wow"] = "OW!";
		$senddata["lol"] = "LOL!";
		$senddata["kek"] = "KEK!";

		/*$senddata = ["wow"=>"WOW!"];
		$senddata = ["lol"=>"LOL!"];
		$senddata = ["kek"=>"KEK!"];*/
		$this->view->generate('sign_in', $senddata);
	}
}