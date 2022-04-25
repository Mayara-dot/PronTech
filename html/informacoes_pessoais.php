<?php
//session_start();
include('../php/verifica_login.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prontech</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/painel.css">
</head>
<body>
<section class="hero is-info is-small">
  <div class="hero-body">
    <div class="container has-text-centered">
      <p class="title">
        Olá, <?php echo $_SESSION['nome'];?>
      </p>
      <p class="subtitle">
        Visuzalize seus exames!
      </p>
    </div>
  </div>

  <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <li>
            <a href="painel.php">Exames</a>
          </li>
          <li class="is-active">
            <a href="informacoes_pessoais.php">Informações Pessoais</a>
          </li>
          <li>
            <a href="/php/logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</section>

<section class="section">
    <div class="card">
        <div class="card-content">
            <div class="content">
                <div namespace="nome"><p>Nome: <?php echo $_SESSION['nome'];?></p></div>
                <div namespace="CPF" id="CPF"><strong>CPF:</strong> <?php require "../php/formataCPF.php";?> </div>
                <div namespace="Email"><strong>Email:</strong>  <?php echo $_SESSION['email'];?></div>
            </div>
        </div>
    </div>
    
</section>

</body>
