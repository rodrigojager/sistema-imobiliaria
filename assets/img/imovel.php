<?php
//
if(isset($_GET['codigo'])) {
	$codigo = htmlspecialchars($_GET["codigo"]);
	echo $codigo;
}
else {
	header('Location: /error.php');
} ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Raiane Schunk Imoveis - Imóvel</title>
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
<?php
// Conectando e selecionando banco de dados
include 'db.php';

// Preparando a SQL Query
$queryImovel = 'SELECT * FROM imovel WHERE idImovel = ' . $codigo;

$result = mysqli_query($link,$queryImovel) or die ("Erro na query: %s\n". mysqli_error($link));

if ((!$result) or (mysqli_num_rows($result) != 1)) {
	header('Location: /error.php');
	exit;
}

else {
	
// Insere os imóveis cadastrados na parte de vendas em destaque
while ($row = mysqli_fetch_row($result)) {
	$valorImovel = $row[2];
	$bairroImovel = $row[3];
	$cidadeImovel = $row[4];
	$estadoImovel = $row[5];
	$areaImovel = $row[6];
	$quartosImovel = $row[7];
	$banheirosImovel = $row[8];
	$vagasImovel = $row[9];
	$descricaoImovel = $row[10];
	$vendaImovel = $row[1];
}
}


// Fechando conexão
mysqli_close($link);
$stringBusca = 'assets/img/imovel-' . $codigo . '/*.jpg';
$imagecount = count(glob($stringBusca));

?>
   
   <body>
      <nav class="navbar navbar-light navbar-expand-lg clean-navbar" style="padding: 0px 0px;background: rgb(0,0,0);">
         <div class="container">
            <img src="/assets/img/Marca-dagua-fundo-escuro.png?h=255de20775f5dc4b9cde73909eb21073" style="width: 186px;padding-top: 17px;padding-bottom: 16px;"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="color: rgb(128,102,13);background: #845907;"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon" style="color: rgb(0,0,0);"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" href="/index.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">início</a></li>
                  <li class="nav-item"><a class="nav-link" href="/contato.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">CONTATO</a></li>
                  <?php
				  
				  if (isset( $_COOKIE[ 'logado' ] ) and isset ($_COOKIE[ 'usuario' ])) {
					  echo '<li class="nav-item"><a class="nav-link" href="/gerenciar.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">Gerenciar</a></li>';
					  echo '<li class="nav-item"><a class="nav-link" href="/logout.php" style="font-family: Roboto, sans-serif;color: rgba(255,255,255,255);">(<u>'.$_COOKIE[ 'usuario' ].'</u>)&ensp;<b>sair</b>';
				  }
				  else {
					  echo '<li class="nav-item"><a class="nav-link" href="/login.php" style="font-family: Roboto, sans-serif;color: rgba(255,255,255,255);">Login';
				  }
				  ?>
				  </a></li>
               </ul>
            </div>
         </div>
      </nav>
      <main class="page landing-page" style="background: #f4f0f0;">
         <!-- Start: Vendas em destaque -->
         <section class="projects-clean" style="padding: 58px;background: rgb(248,244,244);">
            <div class="row">
               <div class="col">
                  <h2 class="text-center" style="font-family: Ubuntu, sans-serif;padding-top: 0px;color: #a26c1e;"><br><strong><?php echo 'IMÓVEL '; if ($vendaImovel == 1) {echo ' À VENDA';} else { echo ' PARA ALUGAR';} echo ' EM ' . strtoupper($bairroImovel) . '</strong><br></h2>
			   </div>
            </div>
			<div class="row">
               <div class="col">
				  <h3 class="text-center" style="font-size: 25px;font-family: Ubuntu, sans-serif;color: #000000;"><strong>'.$cidadeImovel. '-'. $estadoImovel . '</strong></h3>
			   </div>
            </div>
            <div class="container">
               <!-- Start: Imóveis -->
               <div class="row projects" style="margin: 0px;margin-top: 23px;">
                  <!-- Start: Imóvel -->
                  <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 item" style="background: rgba(0,0,0,0.05);padding-top: 40px;">
                     <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                        <div class="carousel-inner">
                           <div class="carousel-item active"><img class="w-100 d-block" src="/assets/img/imovel-' . $codigo . '/1.jpg" alt="Slide Image"></div>';
						   for ($i=2;$i<=$imagecount;$i++) {
							   echo '<div class="carousel-item"><img class="w-100 d-block" src="/assets/img/imovel-' . $codigo . '/' . $i . '.jpg" alt="Slide Image"></div>';
						   }
						   echo '
                        </div>
                        <div>
                           <!-- Start: Previous --><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><!-- End: Previous --><!-- Start: Next --><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a><!-- End: Next -->
                        </div>
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>';
						   for ($i=1;$i<=$imagecount-1;$i++) {
							   echo '<li data-bs-target="#carousel-1" data-bs-slide-to="'. $i . '"></li>';
						   }
						   echo '
                        </ol>
                     </div>
                  </div>
                  <!-- End: Imóvel 1 -->
                  <div class="col-lg-4">
                     <h2 class="text-center d-xxl-flex justify-content-xxl-center" style="font-family: Ubuntu, sans-serif;padding-top: 0px;color: #000000;margin-top: 0px;background: rgba(0,0,0,0.12);">'.'R$'.str_replace(',','.',number_format($valorImovel)).',00</h2>
                     <p class="text-center" style="font-family: Roboto !important, sans-serif;color: rgb(0,0,0);">'; echo htmlspecialchars_decode($descricaoImovel); echo '</p>
                     <div class="row">
                        <div class="col-1"><i class="fas fa-phone-alt" style="font-size: 20px;margin-left: 17px;"></i></div>
                        <div class="col">
                           <p style="font-family: Roboto, sans-serif;color: rgb(0,0,0);padding-left: 12px;">(27)99837-9762</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-1"><i class="material-icons" style="font-size: 24px;margin-left: 17px;">email</i></div>
                        <div class="col">
                           <p style="font-family: Roboto, sans-serif;color: rgb(0,0,0);padding-left: 12px;">raianeschunkcorretora@hotmail.com</p>
                        </div>
                     </div>
                     <a class="btn btn-primary text-uppercase shadow-none" role="button" style="background: rgb(0,0,0);font-family: Ubuntu, sans-serif;font-weight: bold;width: 100%;margin-top: 9px;margin-bottom: 30px;border-style: none;" href="https://wa.me/5527998379762?text=Eu%20tenho%20interesse%20no%20seu%20imovel%20%C3%A0%20venda%20com%20código%20de%20cadastro%20=%20%20'.$codigo.'"><i class="icon ion-social-whatsapp" style="padding-top: 0px;"></i>&nbsp;ENTRAR EM CONTATO&nbsp;</a>
                  </div>
               </div>
               <!-- End: Imóveis -->
            </div>
         </section>
         <!-- End: Vendas em destaque --><!-- Start: Vantagens -->
         <section class="clean-block features">
            <div class="container">
               <div class="block-heading">
                  <h2 class="text-uppercase" style="font-family: Ubuntu, sans-serif;color: #a26c1e;font-weight: bold;">VANTAGENS</h2>
                  <p style="font-family: Roboto, sans-serif;color: rgb(0,0,0);opacity: 1;">Confiança, facilidade e agilidade na busca e aquisição do imóvel dos seus sonhos.</p>
               </div>
               <div class="row justify-content-center">
                  <div class="col-md-5 feature-box">
                     <img style="width: 50px;height: 50px;margin: -65px;margin-right: 0;margin-top: 0px;margin-bottom: 0px;" src="/assets/img/seguranca.png?h=0b9dfb78b7f8da43fcb9a69363b58cad">
                     <h4 class="text-uppercase" style="font-family: Ubuntu, sans-serif;margin-top: -50px;color: rgb(162,108,30);">Segurança</h4>
                     <p class="text-start" style="font-family: Roboto, sans-serif;opacity: 1;border-color: rgb(0,0,0);color: rgb(0,0,0);">Sua negociação é feita com uma corretora certificada, que atende a boas práticas de mercado para te dar toda a segurança e suporte necessário para a sua aquisição.</p>
                  </div>
                  <div class="col-md-5 feature-box">
                     <img style="width: 50px;height: 50px;margin: -65px;margin-right: 0;margin-top: 0px;margin-bottom: 0px;transform: rotateY(180deg);" src="/assets/img/facilidade.png?h=401b12f1c509f43c6e3a3b2c2e1adea9">
                     <h4 class="text-uppercase" style="font-family: Ubuntu, sans-serif;margin-top: -50px;color: rgb(162,108,30);">FACILIDADE</h4>
                     <p style="font-family: Roboto, sans-serif;opacity: 1;color: rgb(0,0,0);">Toda a burocracia e complicação é por minha conta. Você pode sentar e relaxar pensando no seu novo imóvel e eu resolvo todo o resto.</p>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-md-5 feature-box">
                     <img style="width: 50px;height: 50px;margin: -65px;margin-right: 0;margin-top: 0px;margin-bottom: 0px;" src="/assets/img/exclusivo.png?h=ebcb81502b9cdf3d93b0120d3746c369">
                     <h4 class="text-uppercase" style="font-family: Ubuntu, sans-serif;margin-top: -50px;color: rgb(162,108,30);">EXCLUSIVIDADE</h4>
                     <p class="text-start" style="font-family: Roboto, sans-serif;opacity: 1;border-color: rgb(0,0,0);color: rgb(0,0,0);">Trabalho com imóveis exclusivos, que voce não vai encontrar em nenhuma imobiliária ou com outros corretores. Vale a pena consultar os imóveis disponíveis regularmente.</p>
                  </div>
                  <div class="col-md-5 feature-box">
                     <img style="width: 50px;height: 50px;margin: -65px;margin-right: 0;margin-top: 0px;margin-bottom: 0px;transform: rotateY(180deg);" src="/assets/img/suporte1.png?h=221c79894d4adc22e8090f8c825a3a98">
                     <h4 class="text-uppercase" style="font-family: Ubuntu, sans-serif;margin-top: -50px;color: rgb(162,108,30);">Suporte</h4>
                     <p style="font-family: Roboto, sans-serif;opacity: 1;color: rgb(0,0,0);">Te acompanho e oriento durante todo o processo. Da escolha do imóvel até a venda.</p>
                  </div>
               </div>
            </div>
         </section>
         <!-- End: Vantagens -->
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
</html>';?>