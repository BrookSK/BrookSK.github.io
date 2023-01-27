<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <link href="../css/formatacaoPerfil.css" rel="stylesheet">
  <link href="../css/" rel="stylesheet">
  <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <title>Perfil</title>

</head>


<body>
  <?php
  require_once "../menu.php";
  session_start();
  ?>
  <br>

  <div class="container">


    <main>

      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../img/teste.png" alt="" width="64" height="64">
        <h2>Perfil Usuário</h2>

      </div>


      <center>
        <form action="../altera_usuario.php" method="post">
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Dados</h4>



            <div class="row g-3">
              <div class="col-sm-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $_SESSION['n'] ?>" required>

              </div>

              <div class="col-sm-6">
                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="" value="<?php echo $_SESSION['sobre'] ?>" required>

              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['e'] ?>" required>

                </div>
              </div>

              <div class="col-12">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" value="<?php echo $_SESSION['s'] ?>" required>

              </div>

              <div class="col-12">
                <label for="confSenha" class="form-label">Corfirme a senha</label>
                <input type="password" class="form-control" id="confSenha" name="confSenha" placeholder="Confirme a senha" required>

              </div>

              <div>
                <input class="btn-outline-success hover-4" type="submit" value="Alterar">


                <button type="button" class="btn-outline-danger hover-3" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                 Excluir conta
                </button>
        <!--<a href="../exclui.php"><input class="btn btn-outline-warning" value="Excluir conta"></a>-->
              </div>
            </div> 



          </div>
        </form>
        <center>


  </div>
  <br><br>
  </main>
  </div>


<!-- Modal excluir-->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseja excluir a conta?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
         <a href="../exclui.php"><button type="button" class="btn btn-primary">Excluir</button></a>
        </div>
      </div>
    </div>
  </div>


  
</body>


</html>