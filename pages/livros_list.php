<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/livros_list_user.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/header.php";
    include "../database/livros.php";
    include "../database/categorias.php";

    $titulo_pesquisa = "";
    $categorias = [];
    $preco_intervalo=[];

    if(isset($_GET['titulo'])){
        $titulo_pesquisa= $_GET['titulo'];
    }
    if(isset($_GET['categorias'])){
		$categorias = $_GET['categorias'];
    }
    if(isset($_GET['preco_intervalo'])){
		$preco_intervalo = $_GET['preco_intervalo'];
    }
?>
<div class="col-left">
<?php
    $result = getAllLivros($titulo_pesquisa, $categorias);
    // Gerar grid com os livros 
    if(pg_numrows($result)>0){
        echo "<div class='product-card'; style='top:8vh';>";
            $row = pg_fetch_assoc($result);
            while (isset($row['livro_id'])){
                echo "<div class='content'>";
                    echo "<div class='product-image'>";
                        echo "<a href=\"livroView.php?livro_id=".$row['livro_id']."\"><img src=\"../images/livros/".$row['imagem']."\" class='img_livro'></a>";
                    echo "</div>";
                    echo "<div class='product-info'>";
                        echo "<p class='titulo'>" .$row['titulo']. "</p>";
                        echo "<p class='autor'> De " .$row['autor']. " </p>";
                        echo "<p class='preco'>" .$row['preco']. " €</p>"; ?>
                        <form action="../actions/add_carrinho_action.php" method="post" onSubmit="alert('Livro adicionado ao carrinho com sucesso!');">
                            <input type="hidden" name="livro_id" value="<?php echo $row['livro_id']; ?>" />
                            <input type="hidden" name="titulo" value="<?php echo $row['titulo']; ?>" />
                            <input type="hidden" name="preco" value="<?php echo $row['preco']; ?>" />
                            <input type="hidden" name="autor" value="<?php echo $row['autor']; ?>" />
                            <input type="hidden" name="tempo_entrega" value="<?php echo $row['tempo_entrega']; ?>" />
                            <input type="hidden" name="imagem" value="<?php echo $row['imagem']; ?>" />
                            <input type="hidden" name="quantidade" value="1"/>
                            <input type="image" name="adicionar_carrinho" src="../images/shopping_cart.png">
                        </form>
                    <?php
                        echo "</div>";
                    echo "</div>";
                $row = pg_fetch_assoc($result);
                }
            echo  "</div>";
        }
        else{
            echo "<p id='no_results'> Sem resultados.</p>";
        }
    ?>
</div>
<div class="col-right"> 
    <form class="form_filtro" action="livros_list.php" method="get">
        <label class="checkmark">Título: </label>
        <input type="text" name="titulo" value="<?php echo $titulo_pesquisa; ?>">
        <br>
        <h3>Categorias</h3>
        <?php
            //Obter as categorias
            $result_categorias= getAllCategorias();
            $row = pg_fetch_assoc($result_categorias);
            while (isset($row['categoria_id'])){
                echo "<div class='checkboxes'>";
                    echo "<label for='". $row['categoria']."'>". $row['categoria']."</label>";
                    echo "<input type='checkbox' name='categorias[]' value='".$row['categoria_id']. "'";

                    for($i =0; $i < sizeof($categorias) ;$i++){
                    if( $row['categoria_id'] == $categorias[$i])
                        echo "checked";
                    }
                    echo " > ";
                    echo "<br>";
                    $row =  pg_fetch_assoc($result_categorias);
                echo "</div>";
            }
        ?>
        <br>
        <div class="final_button">
            <button type="submit">Pesquisar</button>
        </div>
    </form>
</div>
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>