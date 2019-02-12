<?php

class db{
	//host
	private $host = 'localhost';
	//usuario
	private $usuario = 'root';
	//senha
	private $senha = '';
	//banco de dados
	private $database = 'twitter_clone';

	public function conecta_mysql(){
		//criar a conexão
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
		//ajustar o charset de comunicação com o db
		mysqli_set_charset($con, 'utf8');

		//verificar se houve erro na conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar conectar com o BD Mysql: '.mysqli_connect_error();
		}

		return $con;
	}
}

?>