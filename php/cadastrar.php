<?php
session_start();
include("../static/conexao.php");

if(empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']) || empty($_POST['CPF']) || empty($_POST['nome'])) {
    $_SESSION['invalido'] = true;
    header("Location: /html/cadastro.php");
    exit();
}

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome'])); //trim para retirar espaço que vem do inicio e do fim da string
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$CPF = mysqli_real_escape_string($conexao, trim($_POST['CPF']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(MD5($_POST['senha'])));


$sql = "SELECT COUNT(*) AS total FROM usuario WHERE usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: /html/cadastro.php');
    exit;
}

$sql = "INSERT INTO usuario (nome, usuario, CPF, email, senha, data_cadastro) VALUES ('$nome', '$usuario', '$CPF', '$email', '$senha', NOW())";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: /html/cadastro.php');
exit;
?>