<?php 
session_start();
?>
 
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PronTech</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
            <h3 class="title has-text-white">PronTech</h3>
                <div class="column is-4 is-offset-4">
                    <h3 id="title" class="title has-text-white">Transformando a saúde com tecnologia</h3>
                    <h3 class="subtitle has-text-white">Sistema de Login</h3>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <form action="php/login.php" method="POST">
                            <div class="field">
                            <label class="label has-text-left">Usuário</label>
                                <div class="control has-icons-left">
                                    <input name="usuario" name="text" class="input is-large" placeholder="Seu usuário" autofocus="">
                                    <span class="icon is-small is-left has-text-info">
                                    <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
 
                            <div class="field">
                            <label class="label has-text-left">Senha</label>
                                <div class="control has-icons-left">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                                    <span class="icon is-small is-left has-text-info">
                                    <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field has-text-left">
                                <p><a href="html/cadastro.php">Cadastre-se</a></p>
                            </div>    
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
 
</html>