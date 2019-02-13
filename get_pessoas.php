<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}
	
	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];
	$nome_pessoa = $_POST['nome_pessoa'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "SELECT * FROM usuarios WHERE usuario like '%$nome_pessoa%' AND id <> $id_usuario;";

	$resultado = mysqli_query($link, $sql);

	if($resultado){
		while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			
			echo "<a href='#' class='list-group-item'>";
				echo "<strong>".$registro['usuario']."</strong> <small> - ".$registro['email']." </small>";

				echo "<p class='list-group-item-text pull-right'>";
					echo "<button type='button' class='btn btn-default btn_seguir' data-id_usuario='".$registro['id']."'>Seguir</button><br>";
					echo "<div class='clearfix'></div>";
				echo "</p>";

			echo "</a>";
		}
	}else{
		echo 'Erro na consulta de tweets no banco de dados';
	}

?>