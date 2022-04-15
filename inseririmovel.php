<?php
ob_start();
   if (!isset( $_COOKIE[ 'logado' ] )) {
  header('Location:login.php');
  exit;
}

if ((!isset( $_REQUEST[ 'valor-imovel' ] )) or (!isset( $_REQUEST[ 'radio' ] )) or (!isset( $_REQUEST[ 'bairro' ] )) or (!isset( $_REQUEST[ 'cidade' ] )) or (!isset( $_REQUEST[ 'estado' ] )) or (!isset( $_REQUEST[ 'numero-quartos' ] )) or (!isset( $_REQUEST[ 'numero-banheiros' ] )) or (!isset( $_REQUEST[ 'vagas-garagem' ] )) or (!isset( $_REQUEST[ 'area-imovel' ] )) or (!isset( $_REQUEST[ 'descricao' ] ))){
  header('Location:inserir-imovel.php');
  exit;
}

// Conectando e selecionando banco de dados
include 'db.php';

// Verificando a ultima ID do banco de dados.

$ultimoID = mysqli_query($link, "SELECT MAX(idImovel) FROM imovel") or die('Query failed: ' . mysqli_error());

try {
    $ultimoID = implode('',mysqli_fetch_array($ultimoID, MYSQLI_ASSOC));
} catch (Error $e) {
    echo "Não foi possível converter para string/numero<br>";
}
$idatual = $ultimoID+1;

$venda=1;
$valorimovel = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['valor-imovel']));
if (htmlspecialchars($_REQUEST['radio'])==1) {
	$venda=1;
	}
else {
	$venda=0;
	}
$bairro = strtoupper(mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['bairro']))));
$cidade = strtoupper(mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['cidade']))));
$estado = strtoupper(mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['estado']))));
$numeroquartos = mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['numero-quartos'])));
$numerobanheiros = mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['numero-banheiros'])));
$vagasgaragem = mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['vagas-garagem'])));
$areaimovel = mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['area-imovel'])));
$descricao =  '&lt;font face=&quot;Roboto&quot;&gt;' . mysqli_real_escape_string($link,(htmlspecialchars($_REQUEST['descricao']))) . '&lt;/font&gt;';

$queryPreparada = "INSERT INTO imovel (idImovel, venda, valorImovel, bairro, cidade, estado, area, quartos, banheiros, vagas, descricao) VALUES ('$idatual','$venda','$valorimovel','$bairro','$cidade','$estado','$areaimovel','$numeroquartos','$numerobanheiros','$vagasgaragem','$descricao')";
$resultado = mysqli_query($link, $queryPreparada) or die('Query failed: ' . mysqli_error());
if ($resultado==1) {
	$path = './assets/img/imovel-'.$idatual .'/';
	if (!file_exists($path)) {
	mkdir($path, 0777, true);
	}
	echo 'Imóvel adicionado com sucesso no banco de dados';
}
else {
	echo 'Não foi possível adicionar o imóvel no banco de dados!';
}

ob_end_flush();
?>