<?php
ob_start();
   if (!isset( $_COOKIE[ 'logado' ] )) {
  header('Location:login.php');
  exit;
}

if (!isset( $_REQUEST[ 'imagecount' ] ) or (!isset( $_REQUEST['codigo']))) {
  header('Location:editar-imagens.php');
  exit;
}

$imagecount = $_REQUEST['imagecount'];
$codigo = $_REQUEST['codigo'];

$array = array();
for ($i=1;$i<=($imagecount);$i++) {
	if(isset($_REQUEST['checkbox'.$i])) {
		$array[] = $i;
	}	
}
if(count($array) == 0) {
	header('Location:editar-imagens.php');
	exit;
}
else {
	rsort($array); //organiza em ordem decrescente (maior primeiro)
	for ($i=0;$i<=(count($array)-1);$i++) {
		$path = './assets/img/imovel-'.$codigo .'/'.$array[$i].'.jpg';	
		unlink($path);
		for ($j=$array[$i];$j<$imagecount-$i;$j++) {	
			rename('./assets/img/imovel-' . $codigo . '/' . ($j+1) . '.jpg' , './assets/img/imovel-' . $codigo . '/' . $j . '.jpg');
		}		
}
	
}

ob_end_flush();
?>