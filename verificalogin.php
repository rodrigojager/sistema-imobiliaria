<?php
ob_start();

if(isset($_REQUEST['usuario']) and isset($_REQUEST['senha'])) {

	
	// Conectando e selecionando banco de dados

include 'db.php';
$usuario = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['usuario']));
$senha = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['senha']));

	// Preparando a SQL Query
	$queryLogin = "SELECT senha FROM usuarios WHERE usuario = '" . $usuario . "'";
	$result = mysqli_query($link,$queryLogin) or die ("Erro na query: %s\n". mysqli_error($link));

	while ($row = mysqli_fetch_row($result)) {
		$senha_db = $row[0];
	}
	if (password_verify($senha, $senha_db)) {
		//echo "Password matches.";
		setcookie("logado", TRUE);
		setcookie("usuario", $usuario);
		header('Location: /gerenciar.php');
		exit();
	}
	else {
		echo "Password incorrect.";
		header('Location: /error.php');
		exit();
	}
}
else {
	header('Location: /error.php');
	exit;
}

ob_end_flush();
?>