<!DOCTYPE html>
<?php
    session_start();

    include "../includes/opendb.php";
    include_once "../includes/login_confirm.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    include_once "../includes/header.php";
?>
<h1 id="h1_user">Área do Cliente</h1>
<br>
<table class="user_list" width=80%>
    <tr id="row1" data-href="user_dados.php">
        <th style="text-align:left">Dados Pessoais</th>
        <th style="text-align:right"><a href="user_dados.php"><img src="../images/dados.png"></a></th>
    </tr>
    <tr id="row2" data-href="user_encomendas.php">
        <th style="text-align:left">Encomendas</th>
        <th style="text-align:right"><a href="user_encomendas.php"><img src="../images/encomendas.png"></a></th>
    </tr>
    <tr data-href="user_cartao.php">
        <th style="text-align:left">Cartão de Fidelidade</th>
        <th style="text-align:right"><a href="user_cartao.php"><img src="../images/cartao_fidelidade.png"></a></th>
    </tr>   
</table>
<script>
    document.addEventListener("DOMContentLoaded", () =>{
        const rows = document.querySelectorAll("tr[data-href]");
       rows.forEach(row =>{
           row.addEventListener("click", ()=>{
            window.location.href=row.dataset.href;
           });
       });
    });
</script>
</body>
<?php
    include_once "../includes/footer.php";
?>
</html>