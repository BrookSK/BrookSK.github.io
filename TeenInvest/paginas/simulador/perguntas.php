<!DOCTYPE html>
<html lang="pt-br">

<title>Perfil de Investimento | Teen Invest</title>
<link rel="icon" href="../../Img/icones/favicon_io/favicon.ico">

<!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/testeMenu.css" rel="stylesheet">
<link href="../../css/cursos.css" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="../../vendor/aos/aos.css" rel="stylesheet">
<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="../../vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<script>
  /*Função validar*/
  function validar(){
    if(document.simulador.nivelInvestimento[0].checked == false && document.simulador.nivelInvestimento[1].checked == false && document.simulador.nivelInvestimento[2].checked == false && document.simulador.nivelInvestimento[3].checked == false){
      alert('Por favor, selecione o quanto você deseja investir.');
      return false;
    }if(document.simulador.tempo[0].checked == false && document.simulador.tempo[1].checked == false && document.simulador.tempo[2].checked == false && document.simulador.tempo[3].checked == false){
      alert('Por favor, selecione quando você quer resgatar seu investimento.');
      return false;
    }if(document.simulador.nivelRisco[0].checked == false && document.simulador.nivelRisco[1].checked == false && document.simulador.nivelRisco[2].checked == false && document.simulador.nivelRisco[3].checked == false){
      alert('Por favor, selecione qual mais te atende em relação as suas expectativas com o investimento.');
      return false;
    }
    return true;
  }
</script>

<body>

<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
?>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand" href="../menu.php">
          <img src="../../Img/Logo/teste2.png" width="43px" height="23%" alt="Logo do Site">&nbsp &nbsp
          <strong>Teen Invest</strong>
      </a>
  </header>
  <div class="col-12 col-md-6  mx-auto">
      <form id="simulador" name="simulador" action="../validacoes/resultquiz.php" method="POST" onSubmit="return validar();">

        <br>

        <label for="nivelInvestimento">Quanto você quer investir?</label><br><br>
        <input type="radio" name="nivelInvestimento" value="D">De R$1.000 até R$9.999<br>
        <input type="radio" name="nivelInvestimento" value="C">De R$10.000 até R$50.000<br>
        <input type="radio" name="nivelInvestimento" value="B">De R$50.001 até R$100.000<br>
        <input type="radio" name="nivelInvestimento" value="A">De R$100.001 até R$1.000.000<br>

        <br>

        <label for="tempo">Quando você quer resgatar seu investimento?</label><br><br>
        <input type="radio" name="tempo" value="1 Ano ou menos">1 Ano ou menos<br>
        <input type="radio" name="tempo" value="2-3 Anos">2-3 Anos<br>
        <input type="radio" name="tempo" value="4-5 Anos">4-5 Anos<br>
        <input type="radio" name="tempo" value="6 Anos">6 Anos<br>

        <br>

        <label for="nivelRisco">Quais das opções abaixo, qual mais te atende em relação as suas expectativas com o investimento?</label><br><br>
        <input type="radio" name="nivelRisco" value="100% de chance de ganhar 10%">100% de chance de ganhar 10%<br>
        <input type="radio" name="nivelRisco" value="Possibilidade de ganhar entre 5% - 20%">Possibilidade de ganhar entre 5% - 20%<br>
        <input type="radio" name="nivelRisco" value="Possibilidade de ganhar entre 0% - 25%">Possibilidade de ganhar entre 0% - 25%<br>
        <input type="radio" name="nivelRisco" value="Possibilidade de perder 10% ou ganhar até 40%">Possibilidade de perder 10% ou ganhar até 40%<br>

        <div id="cf-submit">
          <input class="btn btn-outline-primary" type="submit" id="contact-submit" class="btn btn-transparent" value="Enviar">
        </div>
      </form>
  </div>
</body>

</html>