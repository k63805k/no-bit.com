<?php
        session_start();
        require 'config/config.php';
        global $config;
	spl_autoload_register(function($class_name){
		$name = lcfirst($class_name);
		$cl_name = str_replace('_','/',$name);
		include $cl_name.'.php';
	});

	$url ="$_SERVER[REQUEST_URI]";
	$url = substr($url, 1);
	$url = explode('/', $url);
	new System_routes($url);
	

?>