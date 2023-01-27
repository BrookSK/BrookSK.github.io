<!DOCTYPE html>
<html lang="pt-br">

<title>Suporte</title>
<link rel="icon" href="../Img/icones/favicon_io/favicon.ico">

<script language="javascript" type="text/javascript">
  function v1(){
    if(form1.name.value=="" && form1.email.value=="" && form1.subject.value=="" && form1.message.value==""){
      window.alert("Preencha todos os campos.");
    }else{f_mostraDeu();}
  }
  function f_mostraDeu() {
    alert("Mensagem enviada com sucesso !");
  }

  function f_mostraNaoDeu() {
    alert("Não foi possivel enviar a mensagem !");
  }
</script>

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

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand" href="menu.php">
      <img src="../Img/Logo/teste2.png" width="43px" height="23%" alt="Logo do Site">&nbsp &nbsp
      <strong>Teen Invest</strong>
    </a>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav px-5">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>

        </a>
      </li>
    </ul>
  </header>

  <!-- Srart Contact Us
		=========================================== -->
  <section class="contact-us section bg-gray" id="contact">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="title text-center">
            <h2>Entre em contato conosco.</h2>
            <p>suporte online!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Contact Form -->
        <div class="contact-form col-12 col-md-6  mx-auto">
          <form id="form1" name="form1" method="post" action="menu.php" role="form">

            <div class="form-group">
              <input type="text" placeholder="Seu Nome" class="form-control" name="name" id="name" required="required"><br>
            </div>

            <div class="form-group">
              <input type="email" placeholder="Seu Email" class="form-control" name="email" id="email" required="required"><br>
            </div>

            <div class="form-group">
              <input type="text" placeholder="Assunto" class="form-control" name="subject" id="subject" required="required"><br>
            </div>

            <div class="form-group">
              <textarea rows="6" placeholder="Digite sua mensagem" class="form-control" name="message" id="message" required="required"></textarea><br>
            </div>

            <div id="cf-submit">
              <input placeholder="" class="btn btn-outline-primary" type="submit" id="contact-submit" class="btn btn-transparent" value="Enviar" onclick="v1()">
            </div>
          </form>
        </div>
        <!-- ./End Contact Form -->
      </div> <!-- end row -->
    </div> <!-- end container -->
  </section> <!-- end section -->
  <?php include "./View/template.php"; ?>
</body>

</html>