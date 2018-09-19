<?php

class Controller_Admin extends Controller
{
	function action_set_timer(){
		require_once "./application/databases/user.php";

		if (!empty($_POST["timer_start"])&&!empty($_POST["timer_finish"])) {
			if (!empty($_COOKIE["signin"])){

				if ($_COOKIE["signin"]==$salt) {
					$line=6; // номер строки, которую нужно изменить
					$replace='$bla="YOY";'; // на что нужно изменить
					$filename = "./application/databases/lamps.php"; // имя файла 
			 
					$file = file($filename);
					$file[$line-1] = $replace.PHP_EOL;
					file_put_contents($filename, join('', $file));	
				}
			}
		}


	}

	function action_index()
	{	
		require_once "./application/databases/user.php";
		require_once "./application/databases/lamps.php";


$senddata["test"]="test";











	
		

//echo $_COOKIE["signin"];
		if (!empty($_COOKIE["signin"])){
			if ($_COOKIE["signin"]==$salt) {
				require_once "./application/databases/lamps.php";
				$senddata["timer_start"] = $timer_start;
				$senddata["timer_finish"] = $timer_finish;

				$this->view->generate('admin', $senddata);
			}else{
				$this->view->generate('sign_in', $senddata);
			}
		}else{
			$this->view->generate('sign_in', $senddata);
		}
		
	}
}