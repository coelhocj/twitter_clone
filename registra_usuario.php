<?php

require_once('db.class.php');

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = false;

$email_existe = false;

//Verificar se o usuário já existe

$sql = "select * from usuarios where usuario = '$usuario'";

if($resultado = mysqli_query($link, $sql)){
	$dados_usuario = mysqli_fetch_array($resultado);
	
	if(isset($dados_usuario['usuario'])){
		$usuario_existe = true;
	}

}else{
	echo "Erro ao tentar localizar registro de usuário";
}

//Verificar se o email já existe

$sql = "select * from usuarios where email = '$email'";

if($resultado = mysqli_query($link, $sql)){
	$dados_usuario = mysqli_fetch_array($resultado);
	
	if(isset($dados_usuario['email'])){
		$email_existe = true;
	}

}else{
	echo "Erro ao tentar localizar registro de email";
}

if($usuario_existe || $email_existe){

	$retorno_get = '';

	$retorno_get = ($usuario_existe ? 'erro_usuario=1&' : '');

	$retorno_get = ($email_existe ? $retorno_get.'erro_email=1' : $retorno_get);

	header('Location: inscrevase.php?'.$retorno_get);
	die();
}



$sql = "insert into usuarios(usuario, email, senha) values ('$usuario','$email','$senha')";

if(mysqli_query($link, $sql)){
	echo 'Usuário registrado com sucesso';
}else{
	echo 'Erro ao registrar o usuário';
}

?>