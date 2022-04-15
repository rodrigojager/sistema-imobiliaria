<?php
ob_start();
   if (!isset( $_COOKIE[ 'logado' ] )) {
  header('Location:login.php');
  exit;
}
if (!isset( $_REQUEST[ 'codigo' ] )) {
  header('Location:inserir-imagem.php');
  exit;
}
// Conectando e selecionando banco de dados
include 'db.php';

$codigo = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['codigo']));

// Preparando a SQL Query
$queryImovel = 'SELECT idImovel FROM imovel WHERE idImovel = ' . $codigo;

$result = mysqli_query($link,$queryImovel) or die ("Erro na query: %s\n". mysqli_error($link));

if ((!$result) or (mysqli_num_rows($result) != 1)) {
	header('Location: /error.php');
	exit;
}

$path = './assets/img/imovel-'.$codigo .'/';

$target_dir = $path;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "O arquivo é uma imagem - " . $check["mime"] . ".<br>";
    $uploadOk = 1;
  } else {
    echo "O arquivo não é uma imagem.<br>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Desculpe, a imagem já existe.<br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Desculpe, seu arquivo ocupa muito espaço em disco.<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if(($imageFileType != "jpg") and ($imageFileType != "jpeg")) {
  echo "Desculpe, somente JPG ou JPEG são permitidos.<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Desculpe, sua imagem não foi enviada.<br>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	chmod($target_file, 0755);
    echo "A imagem ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi enviada.<br>";
	for($i=1;$i<=99;$i++) {
		if(!file_exists($path . $i . '.jpg')) {
			rename($target_file, $path . $i . '.jpg');
			break;
		}
	}
  } else {
    echo "Desculpe, ocorreu um erro ao enviar sua foto.<br>";
  }
}
ob_end_flush();
?>