<!DOCTYPE html>
<html lang="pt-br">

<?php
    session_start();
?>

<script language="javascript" type="text/javascript">
    function validaExcluir() {
      resp = window.confirm("Deseja realmente excluir a notícia ?");

      if(resp==true){
        window.location.href = "validacoes/excluiNoticias.php?id={<?php $_SESSION["id_noticias"] ?>}";
      }
    }
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <link rel="icon" href="../Img/icones/favicon_io/favicon.ico">
    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/testeMenu.css" rel="stylesheet">
    
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <script src="../js/bootstrap.js"></script>
    <link href="../css/noticias.css" rel="stylesheet" />
    
    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

    <!-- https://newsapi.org/s/google-news-api -->

    <?php
    //$url = 'https://newsapi.org/v2/top-headlines?sources=google-news-br&apiKey=718ce93b25e0449a9d8abb0fd93d2e77';
    $urlBTC = 'https://newsapi.org/v2/everything?q=bitcoin&from=2022-05-12&sortBy=publishedAt&apiKey=718ce93b25e0449a9d8abb0fd93d2e77';
    //$response = file_get_contents($url);
    $responseBTC = file_get_contents($urlBTC);
    //$NewsData = json_decode($response);
    $NewsDataBTC = json_decode($responseBTC);

    ?>
    <div class="jumbotron">
        <h1>Principais Notícias do dia a dia</h1>
    </div>

    <!-- 
    <div class="container-fluid">
        <?php
        //foreach ($NewsData->articles as $News) {
        ?>
           <div class="row NewsGrid">
                <div class="col-md-3">
                    <img src="<?php //echo $News->urlToImage 
                                ?>" alt="News Thumbnail" class="rounded">
                </div>
                <div class="col-md-9">
                    <h2><?php //echo $News->title 
                        ?></h2>
                    <h5><?php //echo $News->description 
                        ?></h5>
                    <p><?php //echo $News->content 
                        ?></p>
                    <h6><?php //echo $News->author 
                        ?></h6>
                    <h6><?php //echo $News->publishedAt 
                        ?></h6>
                    <?php
                    //echo "<a href=$News->url> Ler Mais... </a>";
                    ?>
                </div>
            </div>
        <?php
        //}
        ?>
    </div>
-->

    <?php

    if ($_SESSION["tipo"] == "admin") {
    ?>
        <div>
            <div class="text-center">
                <h3>Cadastrar Notícia</h3>
            </div>

            <form class="container-fluid" name="cadastraNoticia" action="validacoes/cadastraNoticia.php" method="POST" enctype="multipart/form-data">

                <div class="form mt-3">
                    <div>
                        <input type="text" placeholder="Título da Notícia" class="form-control" name="titulo" required="required"><br>
                        <textarea type="text" placeholder="Descrição da Notícia" class="form-control" name="descricao" required="required" rows="5"></textarea>
                    </div><br>
                    <div>
                        <input type="text" class="form-control" placeholder="Autor da Notícia" name="autor" required="required">
                    </div><br>
                    <div>
                        <input type="text" class="form-control" placeholder="Link da Publicação" name="link" required="required">
                    </div><br>
                    <div>
                        <label for="imagem">Imagem:</label>
                        <input type="file" name="imagem" />
                    </div>
                    <div class="mt-4 proceed">
                        <button class="btn btn-outline-primary btnGraf" name="cadastrar" value="cadastrar">
                            <div class="text-right">
                                <span>
                                    Cadastrar Notícia
                                </span>
                            </div>
                        </button>
                    </div>
            </form>
        </div>
    <?php
    }
    ?>

    <div class="container-fluid">
        <?php

        /*1- definindo a conexao - local, usuario, senha e banco de dados*/
        include("../bd/conexao.php");

        /*2-selecionando e pegando os dados que foram inseridos*/
        $comandoSql2 = "select * from tb_noticias order by id_noticias desc";

        /*3-conferendo tudo que foi inserido e colocando em uma variavel*/
        $resultado = mysqli_query($con, $comandoSql2);

        while ($dados = mysqli_fetch_assoc($resultado)) {
            $id = $dados["id_noticias"];
            $_SESSION["id_noticias"] = $dados["id_noticias"];
            $titulo = $dados["titulo_noticias"];
            $descricao = $dados["descricao_noticias"];
            $autor = $dados["autor_noticias"];
            $link = $dados["link_noticias"];
            $img = $dados["img_noticias"];

        ?>

            <div class="row NewsGrid">
                <div class="col-md-3">
                <?php echo '<img src="../Img/noticias/'. $dados['img_noticias'] . '" alt="News Thumbnail" class="rounded">'; ?>
                </div>
                <div class="col-md-9">
                    <h2><?php echo $titulo ?></h2>
                    <h5><?php echo $descricao ?></h5>
                    <p><?php echo $descricao ?></p>
                    <h6><?php echo $autor ?></h6>
                    <?php
                    echo "<a href=$link> Ler Mais... </a>";
                    ?>
                    &nbsp;
                    <?php
                    if ($_SESSION["tipo"] == "admin") {
                        echo "<a type='button' name='excluir' class='btn btn-outline-danger' onclick=validaExcluir()>Excluir notícia</a>";
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="container-fluid">
        <?php
        foreach ($NewsDataBTC->articles as $News) {
        ?>
            <div class="row NewsGrid">
                <div class="col-md-3">
                    <img src="<?php echo $News->urlToImage ?>" alt="News Thumbnail" class="rounded">
                </div>
                <div class="col-md-9">
                    <h2><?php echo $News->title ?></h2>
                    <h5><?php echo $News->description ?></h5>
                    <p><?php echo $News->content ?></p>
                    <h6><?php echo $News->author ?></h6>
                    <h6><?php echo $News->publishedAt ?></h6>
                    <?php
                    echo "<a href=$News->url> Ler Mais... </a>";
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php include "./View/template.php"; ?>
</body>

</html>