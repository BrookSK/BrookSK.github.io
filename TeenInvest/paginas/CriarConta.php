<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Crie sua Conta</title>
        <link rel="icon" href="../Img/icones/favicon_io/favicon.ico">
        <link href="../css/formata.css" rel="stylesheet">
    </head>
    <body>
        <div class="card">
            <div>
                <img class="logo" src="../Img/Logo/imgTCC_logo6Prt2.png">
            </div>
            <div class="text-center">
                <h3>Crie sua conta</h3>
                <span class="abt">Já possui conta? <a href="Login.php">Entre</a></span>
            </div>

            <form name="CriarConta" action="validacoes/cadastraConta.php" method="POST">

                <div class="form mt-3">
                    <div>
                        <input type="text" placeholder="Primeiro nome" class="form-control" name="PrimeiroNome" required="required">
                        <input type="text" placeholder="Ultimo nome" class="form-control" name="UltimoNome" required="required">
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email" required="required">
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Senha" name="senha" required="required">
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Confirme sua senha" name="senhac" required="required">
                    </div>
                </div>

                <div class="mt-4 proceed">
                    <button class="btn btn-cor text-center" name="cadastrar" value="cadastrar" onclick="return js/confcadastro.js/confirmarCadastro()">
                        <div class="text-right">
                            <span>
                                Criar conta
                            </span>
                        </div>
                    </button>
                </div>
            </form>
            <div class="mt-1">
                <div class="form-check" id="checkbox1" name="checkbox1">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="checkbox2"  required="required">
                    <label class="form-check-label" for="flexCheckDefault"> Eu li e concordo com os <a href="./politicas/termos.php">Termos de uso</a></label>
                </div>
            </div>
        </div>
    </body>
</html>
