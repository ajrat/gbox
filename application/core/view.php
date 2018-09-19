<?php
	require_once 'raintpl.php';
	raintpl::configure("base_url", null );
	raintpl::configure("tpl_dir", "./application/template/" );
	raintpl::configure("cache_dir", "./cache/" );
	
class View
{
	function generate($template, $data = null)
	{		
		if(is_array($data)) {			
			// преобразуем элементы массива в переменные
			extract($data);
		}
		//$testvar="dsdsd";
		$tpl = new RainTPL;
		$tpl->assign( $data );
		$html = $tpl->draw( $template, $return_string = true );
		echo $html;
	}
}
