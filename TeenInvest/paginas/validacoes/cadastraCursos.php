<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Conta</title>
    <script language="javascript" type="text/javascript">
        function f_mostraDeu() {
            alert("Curso inserido com sucesso !");
        }

        function f_mostraNaoDeu() {
            alert("Não foi possivel a inserção do curso !");
        }
    </script>
</head>
<body>
    
</body>
</html>

<?php

/*pegando os dados vindos do formulario */
$imagem=$_FILES["imagem"]["name"];
$nome=$_POST["nomeCurso"];
$descricao=$_POST["descricao"];
$preco=$_POST["preco"];
$link=$_POST["link"];

/*1- definindo a conexao - local, usuario, senha e banco de dados*/
include ("../../bd/conexao.php");

/*Salvando a img na pasta*/
$_UP['pasta']="../../Img/cursos/";
$_UP['tamanho']=1024*1024*100;//100mb
$_UP['extensoes']= array('png','jpg','jpeg','gif');
$_UP['renomeia']=false;

//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if($_FILES['imagem']['error'] != 0){
    die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imagem']['error']]);
    exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
if(array_search($extensao, $_UP['extensoes']) === false){		
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Teen_Invest1/paginas/Cursos.php'>
        <script type=\"text/javascript\">
            alert(\"A imagem não foi cadastrada extesão inválida.\");
        </script>
    ";
}//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else{
    //Primeiro verifica se deve trocar o nome do arquivo
    if($UP['renomeia'] == true){
        //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $nome_final = microtime() .'.jpg';
    }else{
        //mantem o nome original do arquivo
        $nome_final = $_FILES['imagem']['name'];
    }
    //Verificar se é possivel mover o arquivo para a pasta escolhida
    if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $nome_final)){
        //Upload efetuado com sucesso, exibe a mensagem
        /*2-definindo o comando sql a ser usado */
        $comandoSql1="insert into tb_cursos(nome_cursos, descricao_cursos, preco_cursos, link_cursos, img_cursos)values('$nome','$descricao','$preco','$link','$nome_final')";
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Teen_Invest1/paginas/menu.php'>
            <script type=\"text/javascript\">
                alert(\"Imagem cadastrada com Sucesso.\");
            </script>
        ";	
    }else{
        //Upload não efetuado com sucesso, exibe a mensagem
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Teen_Invest1/paginas/Cursos.php'>
            <script type=\"text/javascript\">
                alert(\"Imagem não foi cadastrada com Sucesso.\");
            </script>
        ";
    }
}

/*2-definindo o comando sql a ser usado */
//$comandoSql1="insert into tb_cursos(nome_cursos, descricao_cursos, preco_cursos, link_cursos, img_cursos)values('$nome','$descricao','$preco','$link','$nome_final')";

/*3-executando o comando sql */ 
/*4-conferindo se o registro foi inserido*/  
 if( mysqli_query($con, $comandoSql1) != true ){

    echo '<script>f_mostraNaoDeu();</script>';
    ?>
        <script>
	        window.location.href = "../Cursos.php";
	    </script>
	<?php
 }

header("Location: ../menu.php");