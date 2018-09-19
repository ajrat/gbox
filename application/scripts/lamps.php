<?php
require_once "../databases/user.php";

if (!empty($_POST["timer_start"])&&!empty($_POST["timer_finish"])) {
	if (!empty($_COOKIE["signin"])){

		if ($_COOKIE["signin"]==$salt) {
			$line=4; // номер строки, где указан время включения
			$replace='$timer_start = "'.$_POST["timer_start"].'";'; 
			$filename = "../databases/lamps.php";	 
			$file = file($filename);
			$file[$line-1] = $replace.PHP_EOL;
			file_put_contents($filename, join('', $file));	

			$line=5; // номер строки, где указан время выключения
			$replace='$timer_finish = "'.$_POST["timer_finish"].'";'; 
			$filename = "../databases/lamps.php";	 
			$file = file($filename);
			$file[$line-1] = $replace.PHP_EOL;
			file_put_contents($filename, join('', $file));	
		}
	}
}
?>