 
 <?php
  session_start();
  //destruindo (limpando as variaves de sessao)
  session_destroy();
  
  //redirecionando para o inicio ao sair
  header("Location: ../index.php");
  
 ?>
 