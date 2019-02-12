<?php

	require_once('db.class.php');


	$sql = "SELECT * FROM usuarios";

	//echo $sql;

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado = mysqli_query($link, $sql);

	if($resultado){
		$dados_usuarios = array();

		while($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			$dados_usuarios[] = $linha;
		}


		foreach ($dados_usuarios as $usuario) {
			var_dump($usuario);
			echo '<br>';
		}


	}else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}

	


?>