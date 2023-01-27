<?php
session_start();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="javascript" type="text/javascript">
    function validaExcluir() {
      resp = window.confirm("Deseja realmente excluir o seu perfil ? Todos os seus dados serão perdidos!");

      if(resp==true){
        window.location.href = "validacoes/excluiConta.php?id={<?php $_SESSION["id"] ?>}";
      }
    }
</script>

<head>
    <title>Perfil</title>

    <link rel="icon" href="../Img/icones/favicon_io/favicon.ico">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        .icone {
            margin-top: 40px;
        }

        strong {
            font-family: "Poppins", sans-serif;
            font-size: 23px;
        }

        .header1 {
            position: absolute;
            left: 0;
        }

        /*
        * Navbar
        */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="../css/testeMenu.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!--adicionando uma ligacao com o site para pegar icones-->
    <script src="https://kit.fontawesome.com/894395ce28.js" crossorigin="anonymous"></script>

</head>

<body>
    <header class="header1 navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="header1 navbar-brand" href="menu.php">
            <img src="../Img/Logo/teste2.png" width="18%" height="105%" alt="Logo do Site">&nbsp &nbsp
            <strong>Teen Invest</strong>
        </a>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-10">

                <center><img src="../Img/Icones/user_2.png" alt="Icone" width="64px" height="64px" class="icone">
                    <h1>Meu Perfil</h1>
                </center>
            </div>
        </div>

        <div class="row">

            <!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav">
                    <h4>
                        <li class="active"><a data-toggle="tab">Dados do Usuário</a></li>
                    </h4>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">

                        <form name="Perfil" class="form" action="validacoes/passaDados.php" method="POST" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>Nome</h4>
                                    </label>
                                    <input type="text" class="form-control" name="PrimeiroNome" value="<?php echo $_SESSION['pn'] ?>" required="required" title="Digite seu nome">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Sobrenome</h4>
                                    </label>
                                    <input type="text" class="form-control" name="UltimoNome" value="<?php echo $_SESSION['un'] ?>" required="required" title="digite seu sobrenome">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="cpf">
                                        <h4>CPF</h4>
                                    </label>
                                    <input type="text" class="form-control" name="cpf" value="<?php echo $_SESSION['cpf'] ?>" title="Digite seu CPF" placeholder="000.000.000-00">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone">
                                        <h4>Telefone</h4>
                                    </label>
                                    <input type="text" class="form-control" name="telefone" value="<?php echo $_SESSION['t'] ?>" title="Digite seu telefone" placeholder="(00) 0000-0000">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="nascimento">
                                        <h4>Nascimento</h4>
                                    </label>
                                    <input class="form-control input-md" type="date" maxlength="10" name="nascimento" value="<?php echo $_SESSION['n'] ?>" placeholder="DD/MM/AAAA" title="Digite sua data de nascimento" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['e'] ?>" required="required" title="Digite seu email">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password">
                                        <h4>Senha</h4>
                                    </label>
                                    <input type="password" class="form-control" name="senha" id="password" value="<?php echo $_SESSION['s'] ?>" required="required" title="Digite sua senha">
                                </div>
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <input type="submit" name="alterar" class="btn btn-outline-primary" value="Salvar alterações"></input>
                                    <?php
                                    echo "<a type='button' name='excluir' class='btn btn-outline-danger' onclick=validaExcluir()>Excluir conta</a>";
                                    ?>
                                </div>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
                </form>
            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->
    </div>
    <hr>
    <?php include "./View/template.php"; ?>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>