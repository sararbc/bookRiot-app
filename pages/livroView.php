<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/livros_view.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/header.php";
    include "../database/livros.php"; 

    $livro_id=$_GET['livro_id'];
    $result = getLivroById($livro_id);
    $row=pg_fetch_assoc($result);

    // Necessário introduzir query para as avaliações
?>
    <div class="item-left">
        <?php
            echo "<div class='product-image'>";
                echo "<img src=\"../images/livros/".$row['imagem']."\"></a>";
            echo "</div>";
            echo "<div class='information'>";
                echo "<br>";
                echo "<a href=\"avaliacaoLivro.php?livro_id=".$row['livro_id']."\">Avaliações dos leitores</a>";
                echo "<p class='preco'>" .$row['preco']. " €</p>";
            echo "</div>";
        ?>
    </div>
    <div class="item-right">
        <?php
            echo "<div class='product-titulo'>";
                echo "<p class='titulo'>" .$row['titulo']. "</p>";
                echo "<p class='autor'> De " .$row['autor']. " </p>";
            echo "</div>";
            echo "<div class='sinopse'>";
                echo "<p>" .$row['sinopse']. "</p>";
            echo "</div>";
        ?>
        <form action="../actions/add_carrinho_action.php" method="post" onSubmit="alert('Livro adicionado ao carrinho com sucesso!');">
            <input type="hidden" name="livro_id" value="<?php echo $row['livro_id']; ?>" />
            <input type="hidden" name="titulo" value="<?php echo $row['titulo']; ?>" />
            <input type="hidden" name="preco" value="<?php echo $row['preco']; ?>" />
            <input type="hidden" name="autor" value="<?php echo $row['autor']; ?>" />
            <input type="hidden" name="tempo_entrega" value="<?php echo $row['tempo_entrega']; ?>" />
            <input type="hidden" name="imagem" value="<?php echo $row['imagem']; ?>" />
		    <input type="hidden" name="quantidade" value="1"/>
            <div class="final_buttons low">
                <input type="submit" name="adicionar_carrinho" value="Comprar" class="button">
                <button class='button_gray'><a href='livros_list.php'>Continuar a ver livros</a></button>
            </div>
        </form>
        
    </div>
   
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>