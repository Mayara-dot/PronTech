<?php
include("../static/conexao.php");

$CPF = $_SESSION['CPF'];

function formata_cpf($CPF){
    $CPF = preg_replace("/[^0-9]/", "", $CPF);
    if(strlen($CPF)==11){
        $tipo_dado = "cpf";
        $bloco_1 = substr($CPF,0,3);
        $bloco_2 = substr($CPF,3,3);
        $bloco_3 = substr($CPF,6,3);
        $dig_verificador = substr($CPF,-2);
        $CPF_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."-".$dig_verificador;
    }
    return $CPF_formatado;
}

## Como Usar.

echo " ".formata_CPF($CPF);

?>