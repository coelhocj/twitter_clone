<?php

	session_start();

	require_once('db.class.php');

	$usuario = $_POST['usuario'];

	$senha = md5($_POST['senha']);


	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha';";

	//echo $sql;

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado = mysqli_query($link, $sql);

	if($resultado){
		$dados_usuarios = mysqli_fetch_array($resultado);

		if(isset($dados_usuarios['usuario'])){

			$_SESSION['usuario'] = $dados_usuarios['usuario'];
			$_SESSION['email'] = $dados_usuarios['email'];
			$_SESSION['id_usuario'] = $dados_usuarios['id'];

			header('Location: home.php');
		}else{
			header('Location: index.php?erro=1');
		}

	}else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}

	


?>