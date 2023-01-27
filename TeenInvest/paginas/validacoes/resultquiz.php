<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Conta</title>
    <script language="javascript" type="text/javascript">
        function f_mostraDeu() {
            alert("Calculos realizados com sucesso !");
        }

        function f_mostraNaoDeu() {
            alert("Não foi possivel realizar os calculos !");
        }
    </script>
</head>
<body>
    
</body>
</html>

<?php

/*1- definindo a conexao - local, usuario, senha e banco de dados*/
include ("../../bd/conexao.php");

/*pegando os dados vindos do formulario */
$ni=$_POST["nivelInvestimento"];
$tempo=$_POST["tempo"];
$nr=$_POST["nivelRisco"];

switch ($nr){
    case "100% de chance de ganhar 10%":
        $id = 1;
    break;

    case "Possibilidade de ganhar entre 5% - 20%":
        $id = 2;
    break;

    case "Possibilidade de ganhar entre 0% - 25%":
        $id = 3;
    break;

    case "Possibilidade de perder 10% ou ganhar até 40%":
        $id = 4;
    break;
}

switch ($tempo){
    case "1 Ano ou menos":
        $aleatTEMP = rand(0.1, 1);
        $tempoINVEST = $aleatTEMP;
    break;

    case "2-3 Anos":
        $aleatTEMP = rand(2, 3);
        $tempoINVEST = $aleatTEMP;
    break;

    case "4-5 Anos":
        $aleatTEMP = rand(4, 5);
        $tempoINVEST = $aleatTEMP;
    break;

    case "6 Anos":
        $tempoINVEST = "6";
    break;
}

if($tempoINVEST == "0"){
    $tempoINVEST = "1";
}

/*2-definindo o comando sql a ser usado */
$comandoSql1="insert into tb_perfilInvestimento(tempo, valor)values('$tempoINVEST','$id')";

/*5-comparando os dados*/
$nivel = "select * from tb_nivelInvestimento where descricao_nivel='".$ni."'";
$risco = "select * from tb_nivelRisco where descricao_risco='".$nr."'";

$resultado = mysqli_query($con, $nivel);
$resultado1 = mysqli_query($con, $risco);

if($tempoINVEST < $tempo){
    header("Location: ../simulador/perguntas.php");
    header("Refresh:1");
}

if ($dados=mysqli_fetch_assoc($resultado)){
    $nivelID = $dados["id_nivel"];
    $nivelMAX = $dados["valormax_nivel"];
    $nivelMIN = $dados["valormin_nivel"];
}

if ($dados1=mysqli_fetch_assoc($resultado1)){
    $riscoID = $dados1["id_risco"];
    $recomendacoes = "select tb_recomendacoes.descricao_recomendacoes from tb_recomendacoes where tb_recomendacoes.codDoInvestimento='".$nivelID."' and tb_recomendacoes.codDoRisco='".$riscoID."'";
    //$mostraRecomendacoes = $recomendacoes["descricao_recomendacoes"];
}

$resultado2 = mysqli_query($con, $recomendacoes);

if ($dados2=mysqli_fetch_assoc($resultado2)){
    $mostraRecomendacoes = $dados2["descricao_recomendacoes"];
}

session_start();

$_SESSION["nivelID"]=$nivelID;
$_SESSION["riscoID"]=$riscoID;
$_SESSION["nivelMIN"]=$nivelMIN;
$_SESSION["nivelMAX"]=$nivelMAX;
$_SESSION["tempoINVEST"]=$tempoINVEST;
$_SESSION["aleatTEMP"]=$aleatTEMP;
$_SESSION["mostraRecomendacoes"]=$mostraRecomendacoes;
$_SESSION["tempo"]=$tempo;

//if($id!="" || $nr!="" || $tempo!="" || $aleatTEMP!="" || $tempoINVEST!=""){
//    var_dump($tempo);
//    var_dump($aleatTEMP);
//    var_dump($tempoINVEST);
//    var_dump($ni);
//    var_dump($nr);
//    var_dump($id);
//    var_dump($comandoSql1);
//    var_dump($nivel);
//    var_dump($risco);
//    var_dump($resultado);
//    var_dump($resultado1);
//    var_dump($nivelID);
//    var_dump($riscoID);
//    var_dump($dados);
//    var_dump($dados1);
//    var_dump($recomendacoes);
//    var_dump($_SESSION);
//    //var_dump($mostraRecomendacoes);
//    echo $mostraRecomendacoes;
//    exit;
//}

/*3-executando o comando sql */ 
/*4-conferindo se o registro foi inserido*/  
if( mysqli_query($con, $comandoSql1) != true ){

    echo '<script>f_mostraNaoDeu();</script>';
    ?>
        <script>
	        window.location.href = "../menu.php";
	    </script>
	<?php
}

//include_once "../simulador/resultado.php";
header("Location: ../simulador/resultado.php");