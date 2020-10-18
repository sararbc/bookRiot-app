<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/livros.php";

    $livro_id = $_GET['livro_id'];
    $result = getLivroById($livro_id);
    $row= pg_fetch_assoc($result);
?>
<html>
<body>
<?php
    include_once "../includes/header.php";
?>
<div class="info-box">
    <p id="bold_tittle_big"> <?php echo $row['titulo']?></p>
    <div class="image_book">
        <?php
          if(isset($row["imagem"])){
            echo "<img style='height:300px; width:auto;' src='../images/livros/". $row["imagem"] ."' alt='Imagem do Utilizador'>";
        }
        ?>
    </div>
    <p id="bold_tittle">Categoria: <span id="no_bold"><?php echo $row['categoria']?></span></p>
    <p id="bold_tittle">Editora:  <span id="no_bold"><?php echo $row['editora']?></span></p>
    <p id="bold_tittle">Autor:  <span id="no_bold"><?php echo $row['autor']?></span></p>
    <p id="bold_tittle">Preço:  <span id="no_bold"><?php echo $row['preco']?> €</span></p>
    <p id="bold_tittle">Sinopse:  <span id="no_bold"><?php echo $row['sinopse']?></span></p>
    <p id="bold_tittle">Tempo de entrega:  <span id="no_bold"><?php echo $row['tempo_entrega']?> dias</span></p>
</div>	
<div class="final_buttons">
    <button class='button'><a href="admin_livros.php">Voltar</a></button>
</div>   
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>
