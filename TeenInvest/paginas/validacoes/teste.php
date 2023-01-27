<?php

/*1- definindo a conexao - local, usuario, senha e banco de dados*/
include ("../../bd/conexao.php");

session_start();

$id="select max(id_usuario) from tb_usuario";

/*2-definindo o comando sql a ser usado */
$comandoSql="select * from tb_usuario where id_usuario=$id";

/*3-executando o comando sql */ 
$resultado = mysqli_query($con, $comandoSql);

$_SESSION["id"]=$comandoSql["id_usuario"];
$_SESSION["pn"]=$comandoSql["primeironome_usuario"];
$_SESSION["un"]=$comandoSql["ultimonome_usuario"];
$_SESSION["e"]=$comandoSql["email_usuario"];
$_SESSION["cpf"]=$comandoSql["cpf_usuario"];
$_SESSION["n"]=$comandoSql["nascimento_usuario"];
$_SESSION["t"]=$comandoSql["telefone_usuario"];
$_SESSION["s"]=$comandoSql["senha_usuario"];