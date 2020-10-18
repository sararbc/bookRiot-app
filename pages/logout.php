<?php
    session_start();
    $_SESSION['username']="";
    $_SESSION['utilizador_id'] ="";
    $_SESSION['nome'] = "";
    $_SESSION['username'] = "";
    $_SESSION['tipo_utilizador'] = "";
    $_SESSION['email'] = "";
    $_SESSION['contacto'] = "";
    $_SESSION['morada'] = "";
    $_SESSION['codigo_postal'] = "";
    $_SESSION['cartao_desconto'] ="";
    $_SESSION['data_nascimento'] = "";
    session_destroy();

    header("Location: login.php");
?>