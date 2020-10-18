<!DOCTYPE html>
<html>

<head>
</head>

<body>
<?php
  
  // Verificar se o utilizador fez login
  //Sem Login efetuado	- > redirecionada para a página login
  if(!isset($_SESSION['username'])){
    header("Location: ../pages/login.php");   
  }

    ?>
</body>
</html>