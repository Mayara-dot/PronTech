<?php
define('HOST', '127.0.0.1'); //conexao com o banco mysql
define('USUARIO', 'root');
define('SENHA', '140293');
define('DB', 'login');


$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ("Deu ruim aqui, não deu pra conectar!");

$pdo = new PDO("mysql:host" . HOST . "; dbname=" . DB, USUARIO, SENHA);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);