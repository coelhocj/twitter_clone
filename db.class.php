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

	public function conecta_postgres(){
		$con = pg_connect("host=ec2-174-129-224-157.compute-1.amazonaws.com port=5432 dbname=d88k920nsk3bh5 user=bxpunpsirwsfaj password=9ef4e3f8a0595cb35e7361b120acbe5e0d2c1e32b92f08e3f973e1c1e73bbad2");

		if(pg_connection_status($con) == 0){
			return $con;
		}else{
			echo "Erro ao conectar ao banco de dados postgres";
		}

		
	}

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