<?php
include("../static/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID'])) {
    $ID = htmlspecialchars($_GET['ID']);
    $query = "SELECT pdf_documento, pdf_nome
              FROM login.exames
              WHERE ID = :ID;";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':ID', $ID, PDO::PARAM_INT);
    $stmt->bindColumn('pdf_documento', $pdf_documento, PDO::PARAM_LOB);
    $stmt->bindColumn('pdf_nome', $pdf_nome);
    if ($stmt->execute() === FALSE) {
        echo 'Could not display pdf';
    } else {
        $stmt->fetch(PDO::FETCH_BOUND);
        header("Content-type: application/pdf");
        header('Content-disposition: inline; filename="'.$pdf_nome.'.pdf"'); 
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        ob_start();
        $output = ob_get_clean(); 
        echo $pdf_documento;
    }
} else {
    echo "não deu certo";
    header('Location: /html/painel.php');
} 