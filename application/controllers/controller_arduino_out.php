<?php

class Controller_Arduino_out extends Controller
{

	function action_index()
	{	
		require_once "./application/configs/general.php";
		require_once "./application/databases/lamps.php";
		require_once "./application/databases/user.php";


			if ($timer_trigger==true) {
				$timenow = date('H:i');
				$timer_start = date("H:i",strtotime($timer_start));
				$timer_finish = date("H:i",strtotime($timer_finish));
				if ($timer_start>$timer_finish){
					if (($timenow>$timer_finish)&&($timenow<$timer_start)) {
						echo "off";
					}else{
						echo "on";
					}
				}else{
					if (($timenow>$timer_start)&&($timenow<$timer_finish)) {
						echo "on";
					}else{
						echo "off";
					}

				}
			}else{
				if ($lamps_state==true) {
					echo "on";
				}else{
					echo "off";
				}
			}
		
		//echo date("H:i");;
	}
}