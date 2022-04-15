<?php
ob_start();
   if (!isset( $_COOKIE[ 'logado' ] )) {
  header('Location:login.php');
  exit;
}
// delete all files and sub-folders from a folder
function deleteAll($dir) {
foreach(glob($dir . '/*') as $file) {
if(is_dir($file))
deleteAll($file);
else
unlink($file);
}
rmdir($dir);
}

  // Conectando e selecionando banco de dados
include 'db.php';
if(isset($_REQUEST['codigo'])) {
	$codigo = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST["codigo"]));
	$path = './assets/img/imovel-'.$codigo .'/';
	if(isset(($_REQUEST['apagar']))) {
	$SQLQueryDelete = 'DELETE FROM imovel WHERE idImovel = ' . $codigo;
	$resultado = mysqli_query($link, $SQLQueryDelete) or die('Query failed: ' . mysqli_error());
	if ($resultado==1) {
		echo 'Imóvel apagado com sucesso do banco de dados';
		deleteAll($path);
	}
	else {
		echo 'Não foi possível apagar o imóvel do banco de dados!';
}
	}
}
else {
	header('Location:editar-imoveis.php');
  exit;
}
ob_end_flush();
?>