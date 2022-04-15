<?php

// Conectando e selecionando banco de dados
$link = mysqli_connect('localhost', 'root', '');
mysqli_query($link,'USE imobiliaria');
mysqli_query($link,'SET NAMES utf8');
mysqli_select_db($link,'imobiliaria');
?>