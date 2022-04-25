<?php 
session_start();
include('../static/conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    $_SESSION['nao_autenticado'] = true;
    header("Location: /index.php");
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao ,$_POST['senha']);

$query = "SELECT nome, CPF, email FROM usuario WHERE usuario = '{$usuario}' and senha = MD5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['nome'] = $usuario_bd['nome'];
    $_SESSION['CPF'] = $usuario_bd['CPF'];
    $_SESSION['email'] = $usuario_bd['email'];
    header("Location: /html/painel.php"); //redireciona para a pagina que voce quer
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header("Location: /index.php");
    exit();
}

