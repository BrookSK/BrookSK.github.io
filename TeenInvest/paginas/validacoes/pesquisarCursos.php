<?php

/*1- definindo a conexao - local, usuario, senha e banco de dados*/
include ("../../bd/conexao.php");

$pesquisar = $_POST['pesquisar'];
$result_cursos = "select * from tb_cursos where nome_cursos like '%$pesquisar%' limit 5";

$resultado_cursos = mysqli_query($con, $result_cursos);

while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
    echo "Nome do curso: ".$rows_cursos['nome_cursos']."<br>";
    //include "../Cursos.php";
}

//var_dump($result_cursos);
//var_dump($resultado_cursos);
//var_dump($con);
//var_dump($pesquisar);
//var_dump($rows_cursos);