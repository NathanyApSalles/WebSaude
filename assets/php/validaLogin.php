<?php
require_once './classes/classLogin.php';

$user = new Login();

$email = $_POST['email'];
$senha = $_POST['senha'];

$login = $user->setEmail($email);
$login = $user->locate();

if(is_null($login) || empty($login)){
	echo "Email inválido";
	exit();
}

if(sha1($senha) == $login->senha){
	if(!isset($_SESSION)){
		session_start();
	}

	$_SESSION['email'] = $login->email;
	$_SESSION['tipo'] = $login->tipo;

	echo "Bem vindo!<br>";

	if (!isset($_SESSION['tipo'])) {
		session_destroy();
		header("Location: ../../index.php");
		exit;
	} else {
		switch ($_SESSION['tipo']) {
			case 1:
		    header("Location: ../../SistemaES/index.php");
			break;
			case 2:
		    header("Location: ../../SistemaES/index.php");
			break;
		}
	}
	exit();
}else{
	echo "Senha inválida";
	exit();
}

?>