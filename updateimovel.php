<?php
ob_start();
   if (!isset( $_COOKIE[ 'logado' ] )) {
  header('Location:login.php');
  exit;
}

if ((!isset( $_REQUEST[ 'codigo' ] )) or (!isset( $_REQUEST[ 'valor-imovel' ] )) or (!isset( $_REQUEST[ 'radio' ] )) or (!isset( $_REQUEST[ 'bairro' ] )) or (!isset( $_REQUEST[ 'cidade' ] )) or (!isset( $_REQUEST[ 'estado' ] )) or (!isset( $_REQUEST[ 'numero-quartos' ] )) or (!isset( $_REQUEST[ 'numero-banheiros' ] )) or (!isset( $_REQUEST[ 'vagas-garagem' ] )) or (!isset( $_REQUEST[ 'area-imovel' ] )) or (!isset( $_REQUEST[ 'descricao' ] ))){
  header('Location:editar-imoveis.php');
  exit;
}

// Conectando e selecionando banco de dados
include 'db.php';

$venda=1;
$valorimovel = htmlspecialchars($_REQUEST['valor-imovel']);
if (htmlspecialchars($_REQUEST['radio'])==1) {
	$venda=1;
	}
else {
	$venda=0;
	}
$codigo = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['codigo']));
$bairro = mysqli_real_escape_string($link,strtoupper(htmlspecialchars($_REQUEST['bairro'])));
$cidade = strtoupper(mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['cidade'])));
$estado = strtoupper(mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['estado'])));
$numeroquartos = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['numero-quartos']));
$numerobanheiros = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['numero-banheiros']));
$vagasgaragem = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['vagas-garagem']));
$areaimovel = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['area-imovel']));
$descricao = '&lt;font face=&quot;Roboto&quot;&gt;' . mysqli_real_escape_string($link,htmlspecialchars($_REQUEST['descricao'])). '&lt;/font&gt;';

$queryPreparada = "UPDATE imovel set venda='$venda', valorImovel='$valorimovel', bairro='$bairro', cidade='$cidade', estado='$estado', area='$areaimovel', quartos='$numeroquartos', banheiros='$numerobanheiros', vagas='$vagasgaragem', descricao='$descricao' WHERE idImovel='$codigo'";
$resultado = mysqli_query($link, $queryPreparada) or die('Query failed: ' . mysqli_error());
if ($resultado==1) {
	echo 'Imóvel atualizado com sucesso no banco de dados';
}
else {
	echo 'Não foi possível atualizar o imóvel no banco de dados!';
}


ob_end_flush();
?>