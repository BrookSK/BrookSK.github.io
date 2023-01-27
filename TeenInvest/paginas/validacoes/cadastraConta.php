<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Conta</title>
    <script language="javascript" type="text/javascript">
        function f_mostraDeu() {
            alert("Conta criada com sucesso !");
        }

        function f_mostraNaoDeu() {
            alert("Não foi possivel a criação da conta !");
        }
    </script>
</head>
<body>
    
</body>
</html>

<?php

/*pegando os dados vindos do formulario */
$pn=$_POST["PrimeiroNome"];
$un=$_POST["UltimoNome"];
$e=$_POST["email"];
$s=$_POST["senha"];
$sc=$_POST["senhac"];

if($s==$sc){

/*1- definindo a conexao - local, usuario, senha e banco de dados*/
include ("../../bd/conexao.php");

/*2-definindo o comando sql a ser usado */
$comandoSql1="insert into tb_usuario(primeironome_usuario, ultimonome_usuario, email_usuario,senha_usuario)values('$pn','$un','$e','$s')";

/*3-executando o comando sql */ 
/*4-conferindo se o registro foi inserido*/  
 if( mysqli_query($con, $comandoSql1) != true ){

    echo '<script>f_mostraNaoDeu();</script>';
    ?>
        <script>
	        window.location.href = "../CriarConta.php";
	    </script>
	<?php
 }

/*5-selecionando e pegando os dados que foram inseridos*/
$comandoSql2="select * from tb_usuario where email_usuario='$e' and senha_usuario='$s'";

/*6-conferendo tudo que foi inserido e colocando em uma variavel*/
$resultado = mysqli_query($con, $comandoSql2);

/*7-passando os dados inseridos para a secao*/
if($dados=mysqli_fetch_assoc($resultado)){

    session_start();

    $_SESSION["id"]=$dados["id_usuario"];
    $_SESSION["pn"]=$dados["primeironome_usuario"];
    $_SESSION["un"]=$dados["ultimonome_usuario"];
    $_SESSION["e"]=$dados["email_usuario"];
    $_SESSION["cpf"]=$dados["cpf_usuario"];
    $_SESSION["n"]=$dados["nascimento_usuario"];
    $_SESSION["t"]=$dados["telefone_usuario"];
    $_SESSION["s"]=$dados["senha_usuario"];
    $_SESSION["tipo"]=$dados["tipo"];

    //include "teste.php";
    //var_dump($_SESSION);
    //var_dump($bd);
    //var_dump($pn, $un, $e, $cpf, $n, $t, $s);
    //var_dump($resultado);
    //exit;
    
    //echo '<script>f_mostraDeu();</script>';

    header("Location: ../menu.php");
}
}else { echo "As senhas não são iguais"; }