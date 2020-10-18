<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
<link rel="icon" href="../images/icon_book_2.png">
</head> 
<?php 
  session_start();
  include "../includes/opendb.php";
 
  $username=$password="";
  
if (isset($_SESSION['utilizador_id'])) {
  if($_SESSION['tipo_utilizador'] == "admin"){
    header("Location: admin_list.php");
  }
  else{
    header("Location: user_list.php");
  }
}
?>
<body>
<?php
  include_once "../includes/header.php";
?>
  <div id="id01" class="modal">
    <span onclick="location.href='../index.php'"
    class="close" title="Close Modal">&times;</span>
    <div class="form_login">
      <form class="modal-content animate" action="../actions/login_action.php" method="POST">
        <div class="imgcontainer">
          <img src="../images/login_icon.png" alt="login_icon" class="login_icon">
        </div>
        <div class="container_form">
          <h3> Login </h3>
          <label>Username: </label>
          <br>
          <?php if(!empty($_SESSION['username_invalido'])){?>
          <span><?php echo $_SESSION['username_invalido'];?></span>
          <?php $_SESSION['username_invalido'] = NULL;?>
          <?php }?>
          <input type="username" name="username" value="<?php echo $username;?>" placeholder="Username">
          <br>
          <label>Password:</label>
          <br>
          <?php if(!empty($_SESSION['password_invalido'])){?>
          <span><?php echo $_SESSION['password_invalido'];?></span>
          <?php $_SESSION['password_invalido'] = NULL;?>
          <?php }?>
          <input type="password" name="password" value="<?php echo $password;?>" placeholder="Password" id="myInput">
          <input type="checkbox" onclick="myFunction()"> Show Password
          <br>
          <?php if(!empty($_SESSION['login_invalido'])){?>
          <span><?php echo $_SESSION['login_invalido'];?></span>
          <?php $_SESSION['login_invalido'] = NULL;?>
          <?php }?>
          <br>
          <button type="submit">Login</button>
        </div>
        <div class="container_form" style="background-color:#f1f1f1">
          <button type="button" onclick="location.href='../index.php'" class="cancel">Cancelar</button>
          <span class="go_registo">Se ainda não tiver conta, <a href="registo.php">faça o registo.</a></span>
          <br>
          <span class="credenciais" id="text_decoration">Credenciais</span>
          <br>
          <span class="credenciais" id="bold">Admin:</span>
          <br>
          <span class="credenciais">username: admin</span>
          <br>
          <span class="credenciais">password: admin</span>
          <br>
          <span class="credenciais" id="bold">User:</span>
          <br>
          <span class="credenciais">username: user</span>
          <br>
          <span class="credenciais">password: user</span>
          <br>
        </div>
      </form>
      <script>
        function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password"){
        x.type = "text";
        } else {
          x.type = "password";
        }
      }
      </script>   
      </div>
    </div>
    <br>
  <?php
    include_once "../includes/footer.php";
  ?>
</body>
</html>