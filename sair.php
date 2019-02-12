<?php

	session_start();

	unset($_SESSION['usuario']);
	unset($_SESSION['email']);

	echo 'Você foi deslogado';

?>