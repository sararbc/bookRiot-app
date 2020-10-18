<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Registo</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
    <h1>Novo Registo</h1>
<?php

    session_start();
	
    include "../includes/opendb.php";


    $nome=$username=$email=$password=$contacto=$morada=$codigo_postal=$data_nascimento="";
    $nome_invalido=$username_invalido=$email_invalido=$password_invalido=$contacto_invalido=$morada_invalido=$codigo_postal_invalido=$data_nascimento_invalido="";

    $cliente_correto=true;

    if($_SERVER["REQUEST_METHOD"] == "POST" ){

        //Nome
        if (empty ($_POST["nome"])) {
            $nomeutilizador_invalido = "ALERTA: Insira o seu nome.";
            $cliente_correto=false;
        }

        else {
            $nome= verificar ($_POST ["nome"]);
        }
            
        //Username
        if (empty ($_POST["username"])) {
            $username_invalido = "ALERTA: Insira o seu username.";
            $cliente_correto=false;
        }
        else {
            $username= $_POST ["username"];
        }

            //Email
        if (empty ($_POST["email"])) {
            $email_invalido = "ALERTA: Insira o seu email.";
            $cliente_correto=false;
        }
        else {
            $email= verificar($_POST ["email"]);
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $email_invalido="ALERTA: Insira um email válido.";
                $cliente_correto=false;
            }
        }
                
        //Password
        if (empty ($_POST["password"])) {
        $password_invalido="ALERTA: Insira a sua Password.";
        $cliente_correto=false;
        }
        else {
        $password= $_POST["password"];
        }

        //Contacto
        if (empty ($_POST["contacto"])) {
            $contacto_invalido = "ALERTA: Insira o seu contacto.";
            $cliente_correto=false;
        }
        else {
            $contacto= $_POST ["contacto"];
        if (!preg_match("/^[0-9]*$/",$contacto)) {
            $contacto_invalido="ALERTA: Insira um contacto válido.";
            $cliente_correto=false;
        }
        }

        //Morada
        if (empty ($_POST["morada"])) {
            $morada_invalido = "ALERTA: Insira a sua morada.";
            $cliente_correto=false;
        } 
        else {
        $morada= $_POST["morada"];
        }

        //Código Postal
        if (empty ($_POST["codigo_postal"])) {
            $codigo_postal_invalido="ALERTA: Insira o seu Código Postal.";
            $cliente_correto=false;
        }
        else {
        $codigo_postal= $_POST["codigo_postal"];
        }
        
        //Código Postal
        if (empty ($_POST["data_nascimento"])) {
        $data_nascimento_invalido="ALERTA: Insira a sua data de nascimento.";
        $cliente_correto=false;
        }
        else {
        $data_nascimento= $_POST["data_nascimento"];
        }
        if ($cliente_correto==true){
            include("../actions/registo_action.php");
        }	
    }
    
function verificar($aux){
$aux=trim($aux);	
$aux=stripslashes($aux);
return $aux;}
?>
</head>
<body>
<?php
    include_once "../includes/header.php";
?>
<div id="id01" class="modal">
    <span onclick="location.href='../index.php'"
    class="close" title="Close Modal">&times;</span>
    <div class="form_login">
        <form class = "modal-content animate" action="registo.php" method="post">
            <div class="imgcontainer">
                <img src="../images/login_icon.png" alt="login_icon" class="login_icon">
            </div>
            <div class="container_form">
            <h3> Novo Registo </h3>
            <label>Nome: </label>
            <br>
            <span> <?php echo $nome_invalido;?></span>
            <input type="text" name="nome" value=<?php echo $nome;?>>
            <br>
            <label>Username: </label>
            <br>
            <span> <?php echo $username_invalido;?></span>
            <input type="text" name="username" value=<?php echo $username;?>>
            <br>
            <label>Email: </label>
            <br>
            <span> <?php echo $email_invalido;?></span>
            <input type="email" name="email" value=<?php echo $email;?>>
            <br>
            <label>Password: </label>
            <br>
            <span> <?php echo $password_invalido;?></span>
            <input type="password" name="password" value=<?php echo $password;?>>
            <br>
            <label>Contacto: </label>
            <br>
            <span> <?php echo $contacto_invalido;?></span>
            <input type="text" name="contacto" value=<?php echo $contacto;?>>
            <br>
            <label>Morada: </label>
            <br>
            <span> <?php echo $morada_invalido;?></span>
            <input type="text" name="morada" value=<?php echo $morada;?>>
            <br>
            <label>Código Postal: </label>
            <br>
            <span> <?php echo $codigo_postal_invalido;?></span>
            <input type="text" name="codigo_postal" value=<?php echo $codigo_postal;?>>
            <br>
            <label>Data de Nascimento: </label>
            <br>
            <span> <?php echo $data_nascimento_invalido;?></span>
            <input type="date" name="data_nascimento" value=<?php echo $data_nascimento;?>>
            <br>
            <button type="submit" class="button_registo">Confirmar Dados</button>
            <button type="button" onclick="location.href='../index.php'" class="cancel">Cancelar</button>
            </div>
        </form>
    </div>
</div>
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>