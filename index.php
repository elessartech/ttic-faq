<?php
    
	session_start();
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
	ini_set('display_errors', 1);
	require_once 'vendor/autoload.php';
	require_once 'config/database.php';

	
    
    $config = include 'config/dbdata.php';
    $loader = new Twig_Loader_Filesystem('views');
	$twig = new Twig_Environment($loader, array('cache' => false,));
    
    $db = Database::connect(
	$config['mysql']['host'],
	$config['mysql']['dbname'],
	$config['mysql']['username'],
	$config['mysql']['pass']
    );
    
	include_once 'app/Router.php';
	Router::run($db, $twig);	
?>


