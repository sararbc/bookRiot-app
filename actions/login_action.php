<?php

session_start();
include "../includes/opendb.php";

$username=$_POST['username'];
$password=$_POST['password'];


$query= "SELECT * FROM utilizador WHERE username ='".$username."' and password='".$password."'";
$result= pg_exec($conn, $query);
pg_close($conn);

$num_registos= pg_numrows($result);

if($num_registos>0){
    $row =pg_fetch_assoc($result);
    $_SESSION['utilizador_id'] = $row['utilizador_id'];
    $_SESSION['nome'] = $row['nome'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['tipo_utilizador'] = $row['tipo_utilizador'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['contacto'] = $row['contacto'];
    $_SESSION['morada'] = $row['morada'];
    $_SESSION['codigo_postal'] = $row['codigo_postal'];
    $_SESSION['cartao_desconto'] = $row['cartao_desconto'];
    $_SESSION['data_nascimento'] = $row['data_nascimento'];
}
else{
    $login_invalido=true;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if (empty($_POST["username"]) && (!empty($_POST['password']))) {
          $_SESSION['username_invalido']="ALERTA: Preencha o campo relativo ao username.";
        }
    
        else{
          $username=verificar($_POST["username"]);
        }
        
        if(empty($_POST["password"]) && (!empty($_POST['username']))){
          $_SESSION['password_invalido']="ALERTA: Preencha o campo relativo à password.";
        }
        else{
          $password=$_POST["password"];
        }

        if ($login_invalido=true){
            $_SESSION['login_invalido']="ALERTA: Login inválido.";
        }
      }
    header("Location: ../pages/login.php");

}
function verificar($dados){
    $dados=trim($dados);
    $dados= stripslashes ($dados);  
    $dados=htmlspecialchars($dados);
    return $dados;
}
if ($_SESSION['tipo_utilizador'] == "admin") {
    header("Location: ../pages/admin_list.php");
    $_SESSION ['valido'] = TRUE;
}
else {
    header("Location: ../pages/user_list.php");
    $_SESSION ['valido'] = TRUE;
}
        
?>