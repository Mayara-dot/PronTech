<?php
//session_start();
include('../php/verifica_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontech</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/envia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black has-text-centered">Envio de Documento</h3>
                    <h3 class="title has-text-white has-text-centered">Prontech</h3>
                    <?php
                    if(isset($_SESSION['falha_no_envio'])):
                    ?>
                    <div class="notification is-danger">    
                    <p>Não foi possivel salvar o documento</p>
                    </div>      
                    <?php
                    endif;
                    unset($_SESSION['falha_no_envio']);
                    ?>
                    <div class="box">
                        <form action="/php/enviar.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="field">
                                <label class="label is-medium">Nome do Documento</label>
                                <div class="control">
                                    <input name="pdf_nome" class="input is-large" type="text" placeholder="Exames de Sangue/jan/2022" autofocus="">
                                </div>
                            </div>

                            <div id="file" class="file is-info is-boxed is-fullwidth has-name">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="arquivo" accept=".pdf">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/>
                                    <span class="file-cta">
                                    <div class="file-icon"><i class="fa fa-upload"></i></div>
                                    <span class="file-label">
                                        Escolha um arquivo...
                                    </span>
                                    </span>
                                    <span class="file-name">
                                        Nenhum arquivo selecionado
                                    </span>
                                </label>
                                <script>
                                    const fileInput = document.querySelector('#file input[type=file]');
                                    fileInput.onchange = () => {
                                        if (fileInput.files.length > 0) {
                                        const fileName = document.querySelector('#file .file-name');
                                        fileName.textContent = fileInput.files[0].name;
                                        }
                                    }
                                </script>
                            </div>

                            <div class="field">
                                <label class="label is-medium">Laboratório</label>
                                <div class="control">
                                    <div class="select is-medium">
                                    <select name="laboratorio">
                                        <option>CDB-Centro de Diagnóstico</option>
                                        <option>Femme-Labratório da Mulher</option>
                                        <option>Lavosier</option>
                                        <option>Instituto do Coração</option>
                                        <option>SUS</option>
                                        <option>Dr. Consulta</option>
                                        <option>Outro</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        <input class="button is-link is-medium is-fullwidth" type="submit" name="submit" value="Enviar">
                        </form>
                        <div class="field">
                                <p><a href="painel.php">Visualize seus exames!</a></p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
</section>

</body>
</html>
