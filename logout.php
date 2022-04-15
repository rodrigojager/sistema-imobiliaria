<?php
ob_start();
   setcookie("logado", "", time() - 3600);
   setcookie("usuario", "", time() - 3600);
   echo 'You have cleaned session';
   header('Refresh: 2; URL = login.php');
ob_end_flush();
?>