<?php

class Controller_Main extends Controller
{

	function action_index()
	{	
		require_once "./application/configs/general.php";
		$senddata["testvar"] = "hello, world!";
		$senddata["app_ver"] = $app_ver;
		$senddata["lol"] = "LOL!";
		$senddata["kek"] = "KEK!";

		/*$senddata = ["wow"=>"WOW!"];
		$senddata = ["lol"=>"LOL!"];
		$senddata = ["kek"=>"KEK!"];*/
		$this->view->generate('main', $senddata);
	}
}