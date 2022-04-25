<?php 
include("../static/conexao.php");
session_start();

if(isset($_POST['submit']) && !empty($_FILES['arquivo']['name'])) {
    if ($_FILES['arquivo']['error'] != 0){
        echo "Algo deu erado";
    }else {
        $pdf_nome = htmlspecialchars($_POST['pdf_nome']);
        $lab = $_POST['laboratorio'];
        $pdf_documento = $_FILES['arquivo']['name'];
        $path = $_FILES['arquivo']['tmp_name'];
        $CPF = $_SESSION['CPF'];
        if ($pdf_blob = fopen($path, "rb")){
            try{
                $insert_sql = "INSERT INTO login.exames (pdf_nome, pdf_documento, laboratorio, CPF, DiaUpload) VALUES (:pdf_nome, :pdf_documento, :laboratorio, :CPF, NOW());";
                $stmt = $pdo->prepare($insert_sql);
                $stmt->bindParam(':pdf_nome', $pdf_nome);
                $stmt->bindParam(':pdf_documento', $pdf_blob, PDO::PARAM_LOB);
                $stmt->bindParam(':laboratorio', $lab);
                $stmt->bindParam(':CPF', $CPF);
                if ($stmt->execute() === FALSE) {
                    $_SESSION['falha_no_envio'] = True;
                    header("Location: /html/envia.php");
                    //echo "Não foi possivel salvar o documento";
                }else {
                    $_SESSION['sucesso_no_envio'] = True;
                    header("Location: /html/painel.php");
                    //echo "Documento salvo com sucesso";
                }
            } catch (PDOException $e){
                echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
                ': '. $e->getLine();
            }
        }else {
            $_SESSION['falha_no_envio'] = True;
            header("Location: /html/envia.php");
            //echo "Nao foi possivel salvar o documento selecionado";
        }
    }
}else {
    $_SESSION['falha_no_envio'] = True;
    //echo "Nao foi possivel salvar o documento selecionado";
    header("Location: /html/envia.php");
}
