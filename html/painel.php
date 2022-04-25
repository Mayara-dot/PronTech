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
          <li class="is-active">
            <a href="painel.php">Exames</a>
          </li>
          <li>
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

<section id=tabela class="section">
  <?php
    if(isset($_SESSION['sucesso_no_envio'])):
  ?>
  <div class="notification is-success">    
    <p>Documento salvo com sucesso.</p>
  </div>      
  <?php
  endif;
  unset($_SESSION['sucesso_no_envio']);
  ?> 

  <?php
    if(isset($_SESSION['sem_documentos'])):
  ?>
  <div class="notification is-danger">    
    <p>Não há documentos para serem visualizados</p>
  </div>      
  <?php
  endif;
  unset($_SESSION['sem_documentos']);
  ?> 
  
<table class="table is-striped is-hoverable is-fullwidth" id="tabela">
  <thead>
      <tr>
          <th>Laboratório</th>
          <th>PDF Nome</th>
      </tr>
  </thead>
  <tfoot>
    <tr>
    <th><a href="envia.php">Cadastre um novo documento-Clique aqui</a></th>
    </tr>
  </tfoot>
  <tbody>
  <?php require "../php/lista.php"?>
  </tbody>
  </table>
  </body>
</section>
</html>
