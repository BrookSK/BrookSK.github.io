<!DOCTYPE html>
<html lang="pt-br">

<?php

session_start();

/*
A fórmula para calcular o rendimento de um investimento em renda fixa com juros compostos é
M = C * (1 + i)^t, onde M corresponde ao valor final,
C é o valor aplicado inicialmente, i é a taxa de juros, ou seja, a rentabilidade,
e t é o tempo de aplicação.

EX:

Digamos que você coloque os mesmos R$ 1.000 em um investimento de 12 meses que rende 2% ao mês.
Ao aplicar a fórmula, temos: M = 1.000 * (1 + 0,02)¹², que nos leva ao resultado de R$ 1.268,24,
ou seja, um lucro de R$ 268,24 ao fim de um ano, logo, R$ 28,24 a mais do que nos juros simples.
*/
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

$mediaNivel = $_SESSION["nivelMAX"] + $_SESSION["nivelMIN"] /2;

switch ($_SESSION["riscoID"]){
    case 1:
        $rentabilidade = "0.1";
    break;

    case 2:
        $aleat = rand(0.05, 0.2);
        $rentabilidade = $aleat;
    break;

    case 3:
        $aleat = rand(0, 0.25);
        $rentabilidade = $aleat;
    break;

    case 4:
        $aleat = rand(0.1, 0.4);
        $rentabilidade = $aleat;
    break;
}

switch ($_SESSION["tempo"]){
    case "1 Ano ou menos":
        $conta = 1;
    break;

    case "2-3 Anos":
        $conta = 2;
    break;

    case "4-5 Anos":
        $conta = 4;
    break;

    case "6 Anos":
        $conta = 6;
    break;
}

$rendimentoINVEST = $mediaNivel * pow((1 + $rentabilidade), $conta);

$achou = false;

while($achou == false){
    if($_SESSION["riscoID"] == 1 || $_SESSION["riscoID"] == 2 || $_SESSION["riscoID"] == 3 && $conta == 2 || $conta == 4){
        $caracteristicas = "MODERADO";
        $descricao = "Esse investidor está entre os conservadores e os arrojados. 
        Ele gosta de segurança, mas já possui tolerância a riscos de longo prazo. 
        Assim, opta por investimentos mais arriscados dependendo da situação.";
        $achou = true;
    }if($_SESSION["riscoID"] == 1 && $conta == 4 || $conta == 6){
        $caracteristicas = "CONSERVADOR";
        $descricao = "Esse tipo de  investidor prioriza a segurança em suas aplicações. 
        Em sua diversificação de investimentos, 
        o conservador deve manter a maior parte da sua carteira de investimentos 
        em produtos de baixo risco.";
        $achou = true;
    }if($_SESSION["riscoID"] == 3 || $_SESSION["riscoID"] == 4 && $conta == 1){
        $caracteristicas = "AGRESSIVO";
        $descricao = "Esse investidor não sente muito frio na barriga. 
        Ele entende que as perdas a curto prazo são momentâneas e necessárias para aproveitar 
        lucros mais altos a longo prazo.
        Normalmente, o agressivo busca crescer o seu patrimônio para cumprir alguns objetivos da sua vida e, 
        claro, se aposentar mais cedo para viver da renda de seus investimentos.";
        $achou = true;
    }        
}
//var_dump($rendimentoINVEST);
//var_dump($caracteristicas);
//var_dump($descricao);
//var_dump($rentabilidade);
//var_dump($mediaNivel);
//var_dump($_SESSION);
//var_dump($conta);

$number = number_format($rendimentoINVEST,2,',','.');

?>

<title>Perfil de Investimento | Teen Invest</title>
<link rel="icon" href="../../Img/icones/favicon_io/favicon.ico">

<style type="text/css">
    #texte {
        width: 80%;
        margin-left: 10%;
        height: 100%;
        color:#1E90FF;
        font-size: 5.4rem;
    }

    .tex {
        text-align: center;
        font-weight: bold;
        right: 0;
    }

    .fundo {
        background-image: url("../../Img/simulador/fundoINVEST.jpg");
        background-size: 100% 410%;
        background-repeat: no-repeat;
    }
    b{
        color:#1E90FF;
    }

    .inv {
        position: absolute;
        right: 40%;
        top: 15%;
    }

    #teste {
        width: 80%;
        margin-left: 10%;
        height: 100%;
        margin-top: 5%;
        
    }
</style>

<!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/testeMenu.css" rel="stylesheet">
<link href="../../css/cursos.css" rel="stylesheet">

<body>
    <div>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand" href="../menu.php">
                <img src="../../Img/Logo/teste2.png" width="43px" height="23%" alt="Logo do Site">&nbsp &nbsp
                <strong>Teen Invest</strong>
            </a>
        </header>
      <div id="teste">

        <div id="texte">
            <b><h1 class="texte inv">Olá, Investidor!</h1></b>
        </div><br><br><br>
        <div>
            <h3>O seu patrimônio simulado será de <b><?php echo $number ?></b> em <b><?php echo $conta ?></b> ano<?php if($conta > 1){echo "s";} ?>.</h3>
        </div><br><br><br>
        <div>
            <h3>Seu perfil de investidor é <b><?php echo $caracteristicas ?>.</b></h3><br><br>
            <h4><?php echo $descricao ?></h4>
        </div><br><br><br><br><br>
        <div class="tex">
            <h3>Acões Recomendadas: <b><?php echo $_SESSION["mostraRecomendacoes"] ?>.</b></h3><br><br>
            <h4>Por que estamos indicando isto para você?</h4><br><br>
            <p>A carteira recomendada representa a combinação sugerida pelas nossas pesquisas
                 visando a busca por maiores retornos dado um determinado risco e 
                volatilidade.</p>
        </div>
      </div>
    </div>
    <?php include "../View/template.php"; ?>
</body>
</html>