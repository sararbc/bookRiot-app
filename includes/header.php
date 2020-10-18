<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookRiot</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
    <header>
        <div class= "logo">
            <a href="../index.php"><img src="../images/book_riot_logo.png"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a class="livros_active" href="../pages/livros_list.php">LIVROS</a></li>
                <li><a class="livrarias_active" href="../pages/livrarias.php">LIVRARIAS</a></li>
                <li><a class="sobrenos_active" href="../pages/sobrenos.php">SOBRE NÓS</a></li>
            </ul>
        </div>
        <div class="icons">
            <ul>
                <a href="../pages/login.php" ><img src="../images/login_icon.png"></a>
                <a href="../pages/carrinho.php"><img src="../images/shopping_cart.png"></a>
                <?php
                if (isset($_SESSION['carrinho'])){
                    $count = count($_SESSION['carrinho']);
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                }
                if(isset($_SESSION['nome'])){
                    echo "<span id='nome_username'> Olá " . $_SESSION['nome'] . "!</span>";
                    echo "<span id='logout'><a href='logout.php'> Logout </a></span>";
                }
            ?>
            </ul>
        </div>        
    </header>
    <div class="container">