<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}
	
	require_once('db.class.php');

	$texto_tweet = $_POST['texto_tweet'];
	$id_usuario = $_SESSION['id_usuario'];

	if($id_usuario == '' || $texto_tweet ==''){
		die();
	}

	$objDb = new db();
	$link = $objDb->conecta_postgres();

	$sql = "INSERT INTO tweet(id_usuario, tweet) VALUES ($id_usuario, '$texto_tweet');";

	pg_query($link, $sql);

?>