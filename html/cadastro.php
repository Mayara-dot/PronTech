<?php
session_start();
?>

<!DOCTYPE html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prontech</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h3 class="title has-text-white">Prontech</h3>
                <div class="column is-4 is-offset-4">
                    <h3 id="h3" class="subtitle has-text-white">Sistema de Cadastro</h3>
                    <?php
                    if(isset($_SESSION['status_cadastro'])):
                    ?>    
                    <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu usuário e senha <a href="/index.php">aqui</a></p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>
                    <?php
                    if(isset($_SESSION['usuario_existe'])):
                    ?>    
                    <div class="notification is-info">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['usuario_existe']);
                    ?>
                     <?php
                    if(isset($_SESSION['invalido'])):
                    ?>    
                    <div class="notification is-warning">
                        <p>Cadastro inválido</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['invalido']);
                    ?>
                    <div class="box">
                        <form action="/php/cadastrar.php" method="POST">
                            <div class="field">
                            <label class="label has-text-left">Nome Completo</label>
                                <div class="control has-icons-left">
                                    <input name="nome" type="text" class="input is-large" placeholder="Seu Nome Completo" autofocus="">
                                    <p class="help ">ex. Maria da Silva Sauro</p>
                                    <span class="icon is-small is-left has-text-info">
                                    <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                            <label class="label has-text-left">Usuário</label>
                                <div class="control has-icons-left">
                                    <input name="usuario" type="text" class="input is-large" placeholder="Seu Usuário">
                                    <p class="help ">ex. maria</p>
                                    <span class="icon is-small is-left has-text-info">
                                    <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                            <label class="label has-text-left">CPF</label>
                                <div class="control has-icons-left">
                                    <input name="CPF" type="text" class="input is-large" placeholder="Seu CPF(12345678910)" maxlength="11">
                                    <p class="help ">obs. Apenas números</p>
                                    <span class="icon is-small is-left has-text-info">
                                    <i class="fa fa-id-card"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                            <label class="label has-text-left">E-mail</label>
                                <div class="control has-icons-left">
                                    <input name="email" type="email" class="input is-large" placeholder="Seu E-mail">
                                    <p class="help ">ex. maria123@email.com</p>
                                    <span class="icon is-small is-left has-text-info">
                                    <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                            <label class="label has-text-left">Senha</label>
                                <div class="control has-icons-left">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua Senha" minlength="8" maxlength="32">
                                    <p class="help ">obs. mínimo 8 caracteres</p> <span class="icon is-small is-left has-text-info">
                                    <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                        </form>
                        <div class="field">
                                <p><a href="/index.php">Login</a></p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
 
</html>