<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/sobrenos.css">
    <link rel="icon" href="../images/icon_book_2.png">
    <title>Sobre Nós</title>
</head>
<body>
<?php
    include_once "../includes/header.php";
?>
<div class="container_white">
    <p id="center_line">Este projeto foi realizado no âmbito da unidade curricular de Sistemas da Informação II do MIEGI </p>
    <div class="container_images">
        <div class="image">
            <img width=50% src="../images/SaraCorreia.jpg">
            <p id="name">Sara Correia</p>
            <p id="email"><a href="mailto: up201606900@fe.up.pt">up201606900@fe.up.pt</a></p>
        </div>
        <div class="image">
        <img width=50%  src="../images/CatarinaCamilo.jpg">
            <p id="name">Catarina Camilo</p>
            <p id="email"><a href="mailto: up201606915@fe.up.pt">up201606915@fe.up.pt</a></p>
        </div>
    </div>
</div>
<div class="container_gray">
    <div class="php">
        <a href="../php.rar" Download><img width=100px src="../images/phpfile.png"></a>
        <p id="underline">Download PHP files</p>
    </div>
    <div class="css">
        <a href="../css.rar" Download ><img  width=100px src="../images/cssfile.png" alt=""></a>
        <p id="underline">Download CSS files</p>
    </div>
    <div class="ppt">
        <a href="../Mockup_Final.pptx" Download><img  width=100px src="../images/pptfile.png" alt=""></a>
        <p id="underline">Download Mockup</p>
    </div>
</div>
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>