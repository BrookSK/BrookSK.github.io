﻿<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Dados</title>
    <script language="javascript" type="text/javascript">
        function f_mostraDeu() {
            alert("Exclusão feita com sucesso !");
        }

        function f_mostraNaoDeu() {
            alert("Não foi possível realizar a exclusão da sua conta !");
        }
    </script>
</head>
<body>
    
</body>
</html>

<?php

session_start();

/*1-definindo a conexao -local, usuario, senha e banco de dados*/
include ("../../bd/conexao.php");

/*2-definindo o comando sql a ser usado */
$sql="delete from tb_usuario where id_usuario=" . $_SESSION['id'];

/*3-executando o comando sql */ 
$resultado=mysqli_query($con,$sql);
    
/*4-conferindo se o registro foi excluido*/  
if($resultado==true){

    session_start();
    //destruindo (limpando as variaves de sessao)
    session_destroy();

    echo '<script> f_mostraDeu(); </script>';
    header("Location: ../../index.html");
}else{

    var_dump($_SESSION);
    exit;

    echo '<script>f_mostraNaoDeu();</script>';

    ?>
        <!--<script>
            window.location.href = "../../index.html";
        </script>-->
    <?php
}