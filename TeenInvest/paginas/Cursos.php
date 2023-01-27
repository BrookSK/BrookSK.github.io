<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Cursos</title>
  <link rel="icon" href="../Img/icones/favicon_io/favicon.ico">

  <?php
    session_start();
  ?>

  <script language="javascript" type="text/javascript">
    function f_mostraDeu() {
      alert("Curso inserido com sucesso !");
    }

    function f_mostraNaoDeu() {
      alert("Não foi possivel a inserção do curso !");
    }

    function validaExcluir() {
      resp = window.confirm("Deseja realmente excluir o curso ?");

      if(resp==true){
        window.location.href = "validacoes/excluiCursos.php?id={<?php $_SESSION["id_curso"] ?>}";
      }
    }
  </script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    strong {
      font-family: "Poppins", sans-serif;
      font-size: 23px;
    }

    .fundoE {
      background: #ffffff;
    }

    .fundoT {
      background: #f8f9fa;
    }
  </style>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/testeMenu.css" rel="stylesheet">
  <link href="../css/cursos.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../vendor/aos/aos.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand" href="menu.php">
      <img src="../Img/Logo/teste2.png" width="43px" height="23%" alt="Logo do Site">&nbsp &nbsp
      <strong>Teen Invest</strong>
    </a>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--<form class="" method="POST" action="validacoes/pesquisarCursos.php">
      <input class="form-control form-control-dark w-100" type="text" name="pesquisar" placeholder="Pesquisar">
      <input type="submit" value="Buscar">
    </form> -->

    <form class="search-box" method="POST" action="Cursos.php">
      <div class="search-box">
        <input type="text" class="search-text" name="pesquisar" placeholder="Pesquisar...">
        <a class="search-btn" type="submit" value="Buscar">
          <img class="loupe-blue" src="../Img/cursos/loupe-blue.svg" alt="" width="25px" height="25px">
          <img class="loupe-white" src="../Img/cursos/loupe-white.svg" alt="" width="25px" height="25px">
        </a>
      </div>
    </form>

    <ul class="navbar-nav px-5">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>

        </a>
      </li>
    </ul>
  </header>

  <main class="fundoT">
    <section class="py-5 text-center container" style="width: 100%;">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="txtCurso">Cursos</h1>
          <p class="lead text-muted">Alguns cursos para você que quer aprender mais sobre educação financeira!</p>
        </div>
      </div>
    </section>

    <div class="fundoE album py-5">
      <?php
      
      if ($_SESSION["tipo"] == "admin") {
      ?>
        <div class="container">
          <div class="text-center">
            <h3>Cadastrar Curso</h3>
          </div>
          <form name="CadastraCurso" action="validacoes/cadastraCursos.php" method="POST" enctype="multipart/form-data">
            <div class="form mt-3">
              <div>
                <input type="text" placeholder="Nome do curso" class="form-control" name="nomeCurso" required="required"><br>
                <textarea type="text" placeholder="Descrição" class="form-control" name="descricao" required="required" rows="5">
                  Público-alvo: Iniciantes/Iniciados/Jovens e Adultos<br>
                  Carga horária: Total em horas<br>
                  Formato: Online ou não<br>
                  Oferece certificado? Sim/Não
                </textarea>
              </div><br>
              <div>
                <input type="text" class="form-control" placeholder="Preço" name="preco" required="required">
              </div><br>
              <div>
                <input type="text" class="form-control" placeholder="Link da Publicação" name="link" required="required">
              </div><br>
              <div>
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem" />
              </div>
              <div class="mt-4 proceed">
              <button class="btn btn-cor text-center btn-outline-secondary btnGraf" name="cadastrar" value="cadastrar">
                  <div class="text-right">
                    <span>
                      Cadastrar Curso
                    </span>
                  </div>
                </button>
              </div><br>
          </form>
        </div>
      <?php
      }
      ?>
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <?php
          /*1- definindo a conexao - local, usuario, senha e banco de dados*/
          include("../bd/conexao.php");

          /*2-selecionando e pegando os dados que foram inseridos*/
          $comandoSql2 = "select * from tb_cursos order by id_curos desc";
          
          if(isset($_POST) && isset($_POST['pesquisar'])){
            $comandoSql2 = "select * from tb_cursos where nome_cursos like '%{$_POST['pesquisar']}%' limit 5";
          }

          $comandoSql3 = "select max(id_curos) from tb_cursos";

          /*3-conferendo tudo que foi inserido e colocando em uma variavel*/
          $resultado = mysqli_query($con, $comandoSql2);

          $resultado1 = mysqli_query($con, $comandoSql3);

          if($dados1 = mysqli_fetch_assoc($resultado1)){
            $_SESSION["id_curso"] = $dados1["max(id_curos)"];
          }

          while ($dados = mysqli_fetch_assoc($resultado)) {
            $nome = $dados["nome_cursos"];
            $descricao = $dados["descricao_cursos"];
            $preco = $dados["preco_cursos"];
            $link = $dados["link_cursos"];
            $img = $dados["img_cursos"];
            
          ?>
            <div class="col">
              <div class="card shadow-sm">
                <center><?php echo '<img src="../Img/cursos/' . $dados['img_cursos'] . '" width="270px" height="270px" alt="">'; ?>
                  <div class="card-body">
                    <p class="card-text txtValor"> <?php echo $nome ?></p>
                    <p><?php echo $descricao ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="<?php echo $link ?>">
                          <button type="button" class="btn btn-outline-secondary btnGraf">Começar</button>
                          <?php
                          if ($_SESSION["tipo"] == "admin") {
                            echo "<a type='button' name='excluir' class='btn btn-danger' onclick=validaExcluir()>Excluir curso</a>";
                          }
                          ?>
                        </a>
                      </div>
                      <small class="<?php if (is_numeric($preco) == true) { ?> text txtValor<?php } else { ?> text txtGratis<?php } ?>"><?php if (is_numeric($preco) == true) {echo 'R$ ' . $preco;} else {echo $preco;} ?></small>
                    </div>
                  </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </main>
  <?php include "./View/template.php"; ?>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>