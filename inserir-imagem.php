<?php ob_start();?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Raiane Schunk Imoveis - Adicionar Imagem</title>
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
   <?php

   if (!isset( $_COOKIE[ 'logado' ] ) or (!isset ($_COOKIE[ 'usuario' ]))) {
  header('Location:login.php');
  exit;
}?>
    <script src="jquery.js"></script>
</script>
  </script>
      <nav class="navbar navbar-light navbar-expand-lg clean-navbar" style="padding: 0px 0px;background: rgb(0,0,0);">
         <div class="container">
            <img src="/assets/img/Marca-dagua-fundo-escuro.png?h=255de20775f5dc4b9cde73909eb21073" style="width: 186px;padding-top: 17px;padding-bottom: 16px;"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="color: rgb(128,102,13);background: #845907;"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon" style="color: rgb(0,0,0);"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" href="/index.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">início</a></li>
                  <li class="nav-item"><a class="nav-link" href="/contato.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgba(255,255,255,255);">CONTATO</a></li>
                  <?php
					  echo '<li class="nav-item"><a class="nav-link" href="/gerenciar.php" style="font-family: Roboto, sans-serif;font-weight: bold;color: rgb(255,255,255);">Gerenciar</a></li>';
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
                  <h2 style="font-family: Ubuntu, sans-serif;color: #a26c1e;font-weight: bold;">Adicione uma imagem a um imóvel</h2>
                  <p style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Nessa janela voce vai adicionar uma foto a um imóvel já cadastrado previamente. Para adicionar mais imagens, volte aqui e envie de novo.</p>
               </div>
               <form style="filter: hue-rotate(167deg);" action="inseririmagem.php" method="POST" enctype="multipart/form-data">
				  <div class="mb-3"><label class="form-label" for="dica" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Escolha a imagem a ser enviada</label>
				  <div class="mb-3"><label class="form-label" for="upload" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;"><input class="form-control" type="file" onchange="loadFile(event)" value="0" name="fileToUpload" id="fileToUpload"><label class="form-check-label"></label></div>
				  <div class="mb-3"><img style="filter: hue-rotate(-167deg);" id="output" class="img-fluid"/></div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
                  <div class="mb-3"><label class="form-label" for="codigo" style="color: rgb(0,0,0);font-family: Roboto, sans-serif;">Informe o código do imóvel</label><input class="form-control" value="5" type="text" id="codigo" name="codigo"></div>
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