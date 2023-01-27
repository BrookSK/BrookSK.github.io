<?php
session_start();
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">

    <title>Teen Invest</title>

    <!--colocando o icone no site do navegador-->
    <link rel="icon" href="../Img/icones/favicon_io/favicon.ico">

    <?php
    include "../api/hg_finance.php";

    // Primeiro parametro do construtor recebe a chave da API
    $HGFinance = new HGFinance('d1019797');

    // Metodo para obter os todos dados
    $finance = $HGFinance->get();

    ?>

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

        .hgFinance {
            font-size: 13px;
            font-family: "Poppins", sans-serif;
            color: darkgrey;
        }
    </style>

    <!-- CSS principal do Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!--adicionando uma ligacao com o site para pegar icones-->
    <script src="https://kit.fontawesome.com/894395ce28.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../vendor/aos/aos.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Estilos personalizados para este modelo -->
    <link href="../css/testeMenu.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand" href="#">
            <img src="../Img/Logo/teste2.png" width="43px" height="23%" alt="Logo do Site">&nbsp &nbsp
            <strong>Teen Invest</strong>
        </a>       

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../bd/sair.php">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    &nbspSair
                </a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cursos.php">
                                <span data-feather="book-open"></span>
                                Cursos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="informações.php">
                                <span data-feather="info"></span>
                                Informações
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./noticias.php">
                                <span data-feather="help-circle"></span>
                                Notícias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./simulador/simulador.php">
                                <span data-feather="bar-chart-2"></span>
                                Simulador
                            </a>
                        </li>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Minha Conta</span>
                        </h6>

                        <li class="nav-item">
                            <?php
                            echo "<a class=nav-link href=Perfil.php?id={$_SESSION["id"]}><span data-feather=user></span> Perfil </a>";
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./suporte.php">
                                <span data-feather="help-circle"></span>
                                Suporte
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./sobre_nos.php">
                                <span data-feather="code"></span>
                                Sobre nós
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Creditos.php">
                                <span data-feather="users"></span>
                                Créditos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><b>Gráfico das Principais Cotações</b></h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    </div>
                </div>

                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div id="tradingview_92ea6"></div>
                    <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/BTCUSD/?exchange=COINBASE" rel="noopener" target="_blank"><span class="blue-text">Bitcoin/USD</span></a> por TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.MediumWidget({
                            "symbols": [
                                [
                                    "Bitcoin/USD",
                                    "COINBASE:BTCUSD|1D"
                                ],
                                [
                                    "Ethereum",
                                    "COINBASE:ETHUSD|1D"
                                ],
                                [
                                    "Netflix",
                                    "NASDAQ:NFLX|1D"
                                ],
                                [
                                    "Apple",
                                    "NASDAQ:AAPL|1D"
                                ],
                                [
                                    "Nvidia",
                                    "NASDAQ:NVDA|1D"
                                ],
                                [
                                    "Google",
                                    "NASDAQ:GOOGL|1D"
                                ],
                                [
                                    "Tesla",
                                    "NASDAQ:TSLA|1D"
                                ]
                            ],
                            "chartOnly": false,
                            "width": "100%",
                            "height": "480",
                            "locale": "br",
                            "colorTheme": "light",
                            "gridLineColor": "rgba(0, 0, 0, 0)",
                            "fontColor": "rgba(0, 0, 0, 1)",
                            "isTransparent": false,
                            "autosize": true,
                            "showVolume": false,
                            "scalePosition": "right",
                            "scaleMode": "Normal",
                            "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                            "noTimeScale": false,
                            "valuesTracking": "1",
                            "chartType": "area",
                            "lineColor": "#2962ff",
                            "topColor": "rgba(41, 98, 255, 0.3)",
                            "bottomColor": "rgba(41, 98, 255, 0)",
                            "lineWidth": 2,
                            "container_id": "tradingview_92ea6"
                        });
                    </script>
                </div>
                <!-- TradingView Widget END -->

                <h2>Principais Cotações</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ATIVO</th>
                                <th>NOME</th>
                                <th>VAL. COMPRA(R$)</th>
                                <th>VAL. VENDA(R$)</th>
                                <th>VARIAÇÃO(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>USD</td>
                                <td><?php echo $finance['currencies']['USD']['name']; ?></td>
                                <td><?php echo $finance['currencies']['USD']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['USD']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['USD']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>EUR</td>
                                <td><?php echo $finance['currencies']['EUR']['name']; ?></td>
                                <td><?php echo $finance['currencies']['EUR']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['EUR']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['EUR']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>GBP</td>
                                <td><?php echo $finance['currencies']['GBP']['name']; ?></td>
                                <td><?php echo $finance['currencies']['GBP']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['GBP']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['GBP']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>ARS</td>
                                <td><?php echo $finance['currencies']['ARS']['name']; ?></td>
                                <td><?php echo $finance['currencies']['ARS']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['ARS']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['ARS']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>CAD</td>
                                <td><?php echo $finance['currencies']['CAD']['name']; ?></td>
                                <td><?php echo $finance['currencies']['CAD']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['CAD']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['CAD']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>AUD</td>
                                <td><?php echo $finance['currencies']['AUD']['name']; ?></td>
                                <td><?php echo $finance['currencies']['AUD']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['AUD']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['AUD']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>JPY</td>
                                <td><?php echo $finance['currencies']['JPY']['name']; ?></td>
                                <td><?php echo $finance['currencies']['JPY']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['JPY']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['JPY']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>CNY</td>
                                <td><?php echo $finance['currencies']['CNY']['name']; ?></td>
                                <td><?php echo $finance['currencies']['CNY']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['CNY']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['CNY']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>BTC</td>
                                <td><?php echo $finance['currencies']['BTC']['name']; ?></td>
                                <td><?php echo $finance['currencies']['BTC']['buy']; ?></td>
                                <td><?php echo $finance['currencies']['BTC']['sell']; ?></td>
                                <td><?php echo $finance['currencies']['BTC']['variation']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ÍNDICE</th>
                                <th>NOME</th>
                                <th>LOCALIZAÇÃO</th>
                                <th>PONTOS</th>
                                <th>VARIAÇÃO(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>IBOVESPA</td>
                                <td><?php echo $finance['stocks']['IBOVESPA']['name']; ?></td>
                                <td><?php echo $finance['stocks']['IBOVESPA']['location']; ?></td>
                                <td><?php echo $finance['stocks']['IBOVESPA']['points']; ?></td>
                                <td><?php echo $finance['stocks']['IBOVESPA']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>IFIX</td>
                                <td><?php echo $finance['stocks']['IFIX']['name']; ?></td>
                                <td><?php echo $finance['stocks']['IFIX']['location']; ?></td>
                                <td><?php echo $finance['stocks']['IFIX']['points']; ?></td>
                                <td><?php echo $finance['stocks']['IFIX']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>NASDAQ</td>
                                <td><?php echo $finance['stocks']['NASDAQ']['name']; ?></td>
                                <td><?php echo $finance['stocks']['NASDAQ']['location']; ?></td>
                                <td><?php echo $finance['stocks']['NASDAQ']['points']; ?></td>
                                <td><?php echo $finance['stocks']['NASDAQ']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>DOWJONES</td>
                                <td><?php echo $finance['stocks']['DOWJONES']['name']; ?></td>
                                <td><?php echo $finance['stocks']['DOWJONES']['location']; ?></td>
                                <td><?php echo $finance['stocks']['DOWJONES']['points']; ?></td>
                                <td><?php echo $finance['stocks']['DOWJONES']['variation']; ?></td>
                            </tr>
                            <tr>
                                <td>NIKKEI</td>
                                <td><?php echo $finance['stocks']['NIKKEI']['name']; ?></td>
                                <td><?php echo $finance['stocks']['NIKKEI']['location']; ?></td>
                                <td><?php echo $finance['stocks']['NIKKEI']['points']; ?></td>
                                <td><?php echo $finance['stocks']['NIKKEI']['variation']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="tradingview-widget-copyright">Dados retirados de <a href="https://hgbrasil.com/status/finance" rel="noopener" target="_blank"><span class="blue-text">HG-Finance</span></a></div>
                </div>
                <hr>
                <?php include "./View/template.php"; ?>
            </main>
        </div>
    </div>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../js/menu.js"></script>
</body>

</html>