<?php

class Controller_Main extends Controller
{

	function action_index()
	{	
		$senddata["testvar"] = "hello, world!";
		$senddata["wow"] = "OW!";
		$senddata["lol"] = "LOL!";
		$senddata["kek"] = "KEK!";

		/*$senddata = ["wow"=>"WOW!"];
		$senddata = ["lol"=>"LOL!"];
		$senddata = ["kek"=>"KEK!"];*/
		$this->view->generate('main', $senddata);
	}
}