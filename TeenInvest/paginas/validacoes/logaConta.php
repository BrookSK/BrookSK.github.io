<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loga Usuario</title>
    <script language="javascript" type="text/javascript">
        function f_mostraDeu() {
            alert("Conta criada com sucesso !");
        }

        function f_mostraNaoDeu() {
            alert("Não foi possivel encontar o usuario !");
        }
    </script>
</head>
<body>
    
</body>
</html>

<?php

/*pegando os dados vindos do formulario */
$email=$_POST["email"];
$senha=$_POST["senha"];

/*1- definindo a conexao - local, usuario, senha e banco de dados*/
include ("../../bd/conexao.php");

/*2- verificando se a conexao foi estabelecida */
if($con==true){

    /*3-definindo o comando sql a ser usado */
    $comandoSql="select * from tb_usuario where email_usuario='$email' and senha_usuario='$senha'";

    /*4-executando o comando sql */	
    $resultado=mysqli_query($con,$comandoSql);

    /*5- verificando se encontrou registro */
    if(mysqli_num_rows($resultado)<=0) {

        //header ("location: ../Login.php");//nao encontrou o usuario
        echo '<script>f_mostraNaoDeu();</script>';
        ?>
            <script>
                window.location.href = "../Login.php";
            </script>
        <?php

    }else{
        //achou o usuario
        if ($dados=mysqli_fetch_assoc($resultado)){

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
            
            header("Location: ../menu.php");

            /*?>
                <script>
                    window.location.href = "../menu.php";
                </script>
            <?php
            */
        }
    }
}
?>