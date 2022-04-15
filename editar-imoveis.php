<?php ob_start();?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Raiane Schunk Imoveis - Editar Imóvel</title>
      <meta name="description" content="O imóvel dos seus sonhos e que cabe no seu bolso está aqui. Compre com segurança, facilidade e comodidade.">
      <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/assets/img/favicon180.png?h=9f130c2b14d978053c6731b7ccf407c8">
      <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon16.png?h=a58c4bfcf9ecb97edb0371afd58bebd6">
      <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon32.png?h=3a40431360e2ee134a963d30be2ac8b3">
      <link rel="icon" type="image/png" sizes="180x180" href="/assets/img/favicon180.png?h=9f130c2b14d978053c6731b7ccf407c8">
      <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/favicon192.png?h=ae7f95b4e0aa574704d98afe2fcbff92">
      <link rel="icon" type="image/png" sizes="512x512" href="/assets/img/favicon512.png?h=6c326d01805922a11358413829ed82b0">
      <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=a58e0d4d1187fe68189dfd02f5384f56">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
      <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css?h=3166695f5111bb49984dab9ce0b4fc77">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
      <link rel="stylesheet" href="/assets/css/styles.min.css?h=7c2c8ad4cd1a77e990b38733b4fd9a81">
   </head>
   <body>
    <script src="jquery.js"></script>
<script src="/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({buttonList : ['fontSize','bold','italic','underline','left','right','center','justify','ol','ul','hr','removeformat','indent','outdent','forecolor','bgcolor','strikeThrough','subscript','superscript','html']}).panelInstance('descricao');
});
</script>
  </script>
  <?php

   if (!isset( $_COOKIE[ 'logado' ] ) or (!isset ($_COOKIE[ 'usuario' ]))) {
  header('Location:login.php');
  exit;
}
  // Conectando e selecionando banco de dados
include 'db.php';
if(isset($_REQUEST['codigo'])) {
	$codigo = mysqli_real_escape_string($link,htmlspecialchars($_REQUEST["codigo"]));
	if(isset(($_REQUEST['apagar']))) {
	$SQLQueryDelete = 'DELETE FROM imovel WHERE idImovel = ' . $codigo;
	}
}
else {
	header('Location: /editar-imovel.php');
	exit;
}
	

// Preparando as SQL Query
$valorImovel = 'SELECT valorImovel FROM imovel WHERE idImovel = ' . $codigo;
$bairroImovel = 'SELECT bairro FROM imovel WHERE idImovel = ' . $codigo;
$cidadeImovel = 'SELECT cidade FROM imovel WHERE idImovel = ' . $codigo;
$estadoImovel = 'SELECT estado FROM imovel WHERE idImovel = ' . $codigo;
$areaImovel = 'SELECT area FROM imovel WHERE idImovel = ' . $codigo;
$quartosImovel = 'SELECT quartos FROM imovel WHERE idImovel = ' . $codigo;
$banheirosImovel = 'SELECT banheiros FROM imovel WHERE idImovel = ' . $codigo;
$vagasImovel = 'SELECT vagas FROM imovel WHERE idImovel = ' . $codigo;
$descricaoImovel = 'SELECT descricao FROM imovel WHERE idImovel = ' . $codigo;
$vendaImovel = 'SELECT venda FROM imovel WHERE idImovel = ' . $codigo;

// Fazendo a query do valor do imovel
$valorImovel = mysqli_query($link,$valorImovel) or die('Query failed: ' . mysqli_error());

try {
    $valorImovel = implode('',mysqli_fetch_array($valorImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}


// Fazendo a query do bairro do imovel
$bairroImovel = mysqli_query($link,$bairroImovel) or die('Query failed: ' . mysqli_error());

try {
    $bairroImovel = implode('',mysqli_fetch_array($bairroImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query da cidade do imovel
$cidadeImovel = mysqli_query($link,$cidadeImovel) or die('Query failed: ' . mysqli_error());

try {
    $cidadeImovel = implode('',mysqli_fetch_array($cidadeImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query do estado dos imoveis
$estadoImovel = mysqli_query($link,$estadoImovel) or die('Query failed: ' . mysqli_error());

try {
    $estadoImovel = implode('',mysqli_fetch_array($estadoImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query da area dos imoveis
$areaImovel = mysqli_query($link,$areaImovel) or die('Query failed: ' . mysqli_error());

try {
    $areaImovel = implode('',mysqli_fetch_array($areaImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query dos quartos dos imoveis
$quartosImovel = mysqli_query($link,$quartosImovel) or die('Query failed: ' . mysqli_error());

try {
    $quartosImovel = implode('',mysqli_fetch_array($quartosImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query dos banheiros dos imoveis
$banheirosImovel = mysqli_query($link,$banheirosImovel) or die('Query failed: ' . mysqli_error());

try {
    $banheirosImovel = implode('',mysqli_fetch_array($banheirosImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query das vagas dos imoveis
$vagasImovel = mysqli_query($link,$vagasImovel) or die('Query failed: ' . mysqli_error());

try {
    $vagasImovel = implode('',mysqli_fetch_array($vagasImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query da descrição dos imoveis
$descricaoImovel = mysqli_query($link,$descricaoImovel) or die('Query failed: ' . mysqli_error());

try {
    $descricaoImovel = implode(' ',mysqli_fetch_array($descricaoImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fazendo a query da venda dos imoveis
$vendaImovel = mysqli_query($link,$vendaImovel) or die('Query failed: ' . mysqli_error());

try {
    $vendaImovel = implode('',mysqli_fetch_array($vendaImovel, MYSQLI_ASSOC));
} catch (Error $e) {
    header('Location: /error.php');
}

// Fechando conexão
//mysqli_close($link);
  ?>
      <nav class="navbar navbar-light navbar-expand-lg clean-navbar" style="padding: 0px 0px;background: rgb(0,0,0);">
         <div class="container">
            <img src="/assets/img/Marca-dagua-fundo-escuro.png?h=255de20775f5dc4b9cde73909eb21073" style="width: 186px;padding-top: 17px;padding-bottom: 16px;"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="color: rgb(128,102,13);background: #845907;"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon" style="color: rgb(0,0,0);"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" href="/index.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">início</a></li>
                  <li class="nav-item"><a class="nav-link" href="/contato.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">CONTATO</a></li>
                  <?php
					  echo '<li class="nav-item"><a class="nav-link" href="/gerenciar.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">Gerenciar</a></li>';
					  echo '<li class="nav-item"><a class="nav-link" href="/logout.php" style="font-family: Roboto, sans-serif;color: rgba(255,255,255,255);">(<u>'.$_COOKIE[ 'usuario' ].'</u>)&ensp;<b>sair</b>';
				  ?>
				  </a></li>
               </ul>
            </div>
         </div>
      </nav>
      <main class="page contact-us-page">
         <section class="clean-block clean-form dark">
            <div class="container">
               <div class="block-heading">
                  <h2 style="font-family: Ubuntu, sans-serif;color: #a26c1e;font-weight: bold;">Editando o imóvel</h2>
				  <h4 style="font-family: Ubuntu, sans-serif;color: #000000;font-weight: bold;">Código: <?php echo $codigo; ?> </h4>
                  <p style="color: rgb(0,0,0);font-family: Roboto, sans-serif;"><br>Nessa janela voce vai editar as informações do imóvel.</p>
				  <h5 style="font-family: Ubuntu, sans-serif;color: #000000;font-weight: bold;"><br><br>Você quer apagar o imóvel?</h5>
				  <p style="color: rgb(0,0,0);font-family: Roboto, sans-serif;"><br>Se voce escolher apagar o imóvel ao invés de editar, as imagens dele também serão apagadas e não poderão mais ser recuperadas. <br></p>
				  <form action="deleteimovel.php" style="background-color: transparent;border-style: none;box-shadow: none;" method="post">
				    <input type="hidden" id="apagar" name="apagar" value="1">
					<input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo;?>">
					<div class="mb-3"><button class="btn btn-primary text-uppercase shadow-none" type="submit" style="font-weight: bold;margin-top: 20px;font-family: Ubuntu, sans-serif;background: rgb(0,0,0);border-style: none;">Apagar</button></div>
				  </form>
               
			   </div>
               <form style="filter: hue-rotate(167deg);" action="updateimovel.php" method="POST">
				  <input class="form-control" value="<?php echo $codigo?>" type="hidden" id="codigo" name="codigo">
                  <div class="mb-3"><label class="form-label" for="valor-imovel" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Valor do imóvel</label><input class="form-control" value="<?php echo $valorImovel?>" type="text" id="valor-imovel" name="valor-imovel"></div>
				  <div style="color: rgb(0,0,0);font-family: Roboto, sans-serif;margin-bottom: 10px;"><input class="form-check-input" type="radio" value="1" name="radio" id="valor1" <?php if ($vendaImovel==1){echo 'checked';}?>><label class="form-check-label" for="valor1">&nbspVenda&nbsp&nbsp</label>
				  <input class="form-check-input" type="radio" value="0" name="radio" id="valor2" <?php if ($vendaImovel==0){echo 'checked';}?>><label class="form-check-label" for="valor2">&nbspAluguel&nbsp</label></div>
                  <div class="mb-3"><label class="form-label" for="bairro" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Bairro</label><input class="form-control" value="<?php echo $bairroImovel;?>" type="text" id="bairro" name="bairro"></div>
                  <div class="mb-3"><label class="form-label" for="cidade" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Cidade</label><input class="form-control" value="<?php echo $cidadeImovel;?>" type="text" id="cidade" name="cidade"></div>
                  <div class="mb-3"><label class="form-label" for="estado" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Estado</label><input class="form-control" value="<?php echo $estadoImovel;?>" type="text" id="estado" name="estado"></div>
				  <div class="mb-3"><label class="form-label" for="area-imovel" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Área do imóvel</label><input class="form-control" value="<?php echo $areaImovel;?>" type="text" id="area-imovel" name="area-imovel"></div>
				  <div class="mb-3"><label class="form-label" for="numero-quartos" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Número de quartos</label><input class="form-control" value="<?php echo $quartosImovel;?>" type="text" id="numero-quartos" name="numero-quartos"></div>
				  <div class="mb-3"><label class="form-label" for="numero-banheiros" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Número de banheiros</label><input class="form-control" value="<?php echo $banheirosImovel;?>" type="text" id="numero-banheiros" name="numero-banheiros"></div>
                  <div class="mb-3"><label class="form-label" for="vagas-garagem" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Número de vagas na garagem</label><input class="form-control" value="<?php echo $vagasImovel;?>" type="text" id="vagas-garagem" name="vagas-garagem"></div>
				  <div class="mb-3"><label class="form-label" for="descricao" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Descrição</label><textarea class="form-control" id="descricao" name="descricao"><?php echo $descricaoImovel;?></textarea></div>
				  <div class="mb-3"><button class="btn btn-primary text-uppercase shadow-none" type="submit" style="font-weight: bold;font-family: Ubuntu, sans-serif;background: rgb(0,0,0);border-style: none;">Enviar</button></div>
               </form>
            </div>
         </section>
      </main>
      <!-- Start: Footer Dark -->
      <footer class="page-footer dark">
         <div class="container">
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="text-uppercase" style="font-family: Ubuntu, sans-serif;">INÍCIO</h5>
                  <ul style="filter: hue-rotate(177deg);">
                     <li style="font-family: Roboto, sans-serif;"><a href="/index.php">Imóveis</a></li>
                     <li><a href="/contato.php" style="font-family: Roboto, sans-serif;">Contato</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="footer-copyright">
            <p style="font-family: Roboto, sans-serif;">© 2022</p>
         </div>
      </footer>
      <!-- End: Footer Dark --><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script><script src="/assets/js/script.min.js?h=1665ca77920bb6c16d0d2edee4a77966"></script>
   </body>
</html>
<?php ob_end_flush();?>