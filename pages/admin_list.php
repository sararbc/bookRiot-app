<!DOCTYPE html>
<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/login_confirm.php";

    if(isset($_SESSION['username'])){
        echo "Olá " . $_SESSION['username'] . "!";
        echo "<a href='logout.php'> Logout </a>";
    }
    else{
        echo "<a href='login.php'>Login </a>";
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<html>
<body>

<html>
<body>
<?php
    include_once "../includes/header.php"; 
?>
<h1>Área do Administrador</h1>
<br>

<table class="admin_list" width=80%>
    <tr id="row1" data-href="admin_clientes.php">
        <th style="text-align:left">Clientes</th>
        <th style="text-align:right"><a href="admin_clientes.php"><img src="../images/clients.png"></a></th>
    </tr>
    <tr id="row2" data-href="admin_encomendas.php">
        <th style="text-align:left">Encomendas</th>
        <th style="text-align:right"><a href="admin_encomendas.php"><img src="../images/encomendas.png"></a></th>
    </tr>
    <tr data-href="admin_livros.php">
        <th style="text-align:left">Livros</th>
        <th style="text-align:right"><a href="admin_livros.php"><img src="../images/admin_books.png"></a></th>
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
<?php
    include_once "../includes/footer.php"; 
?>
</body>
</html>