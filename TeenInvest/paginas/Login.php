<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Entre na sua Conta</title>
        <link rel="icon" href="../Img/icones/favicon_io/favicon.ico">
        <link href="../css/formata.css" rel="stylesheet">
    </head>
    <body>
        <div class="card">
            <div>
                <img class="logo" src="../Img/Logo/imgTCC_logo6Prt2.png">
            </div>
            <div class="text-center">
                <h3>Entre na sua conta</h3>
                <span class="abt">Ainda nao tem uma conta? <a href="CriarConta.php">Crie</a></span>
                <div>

                <form name="Login" action="validacoes/logaConta.php" method="POST">
                            
                            <input type="text" class="form-control" placeholder="Email" name="email" required="required">
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Senha" name="senha" required="required">
                        </div>
                    </div>

                    <div class="mt-4 proceed">
                        <button class="btn btn-cor text-center" name="entrar" value="entrar">
                            <div class="text-right">
                                <span>
                                    Entrar
                                </span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
