<?php
include("../static/conexao.php");
//session_start();

$CPF = $_SESSION['CPF']; 

try {
        $sql = "SELECT ID, pdf_nome, laboratorio
                FROM login.exames
                WHERE CPF = '$CPF'
                ORDER BY pdf_nome ASC;";
        
        $result = $pdo->query($sql);

        foreach ($result as $row) {
                $records[] = [
                'ID' => $row['ID'],
                'pdf_nome' => $row['pdf_nome'],
                'laboratorio' => $row['laboratorio']
                ];
                
        if(empty($records)){
                $_SESSION['sem_documentos'] = True;
        }  
        echo "<tr>";
        //echo "<td>". $row['ID'] ."</td>";
        echo "<td>". $row['laboratorio'] ."</td>";
        echo "<td>". "<a href='". "../php/listar.php?ID=" . $row['ID'] . "' target='_blank'>". $row['pdf_nome'] . "</a>" . "</td>";
        echo "</tr>";         
        }
 
}catch (PDOException $e) {
        echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
            ': '. $e->getLine();   
}
