<!DOCTYPE html>
<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/livros.php";
    include "../database/categorias.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<html>
<body>
<?php
    include_once "../includes/header.php";
?>
<h1>Livros</h1>
<?php
    $titulo_pesquisa = "";
    $categorias = [];

    if(isset($_GET['titulo'])){
        $titulo_pesquisa= $_GET['titulo'];
    }
    if(isset($_GET['categorias'])){
		$categorias = $_GET['categorias'];
    }
    
    //Obter as categorias
    $result_categorias= getAllCategorias();
?>
<form class="pesquisa_admin" action="admin_livros.php" method="get">
    <h3>Pesquisa</h3>
    <div class="box">
        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $titulo_pesquisa; ?>">
        <input type="submit" value="Pesquisar" class="button">
    </div>
    <br>
    <br>
    <?php
        $row = pg_fetch_assoc($result_categorias);
        while (isset($row['categoria_id'])){
            echo "<div class='checkboxes'>";
                echo "<label for='". $row['categoria']."'>". $row['categoria']."</label>";
                echo "<input id='checkbox_categorias' type='checkbox' name='categorias[]' value='".$row['categoria_id']. "'";

                for($i =0; $i < sizeof($categorias) ;$i++){
                if( $row['categoria_id'] == $categorias[$i])
                    echo "checked";
                }
                echo " > ";
                echo "<span></span>";
                echo "<br>";
                $row =  pg_fetch_assoc($result_categorias);
            echo "</div>";
        }
    ?>
</form>
<table class="table_admin" width=70% >
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Editora</th>
            <th width=10%>Preço</th>
            <th>INFO</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <?php
        $result = getAllLivros($titulo_pesquisa, $categorias);

        $row =pg_fetch_assoc($result);
        while(isset($row['livro_id'])){

            echo"<tr>";
            echo "<td>" . $row["titulo"] . "</td>";
            echo "<td>" . $row["autor"] . "</td>";
            echo "<td>" . $row["editora"] . "</td>";
     
            echo "<td style='text-align:center'>" . $row["preco"] . "€</td>";
            
            
            echo "<td style='text-align:center'><a href='admin_formViewLivro.php?livro_id=". $row['livro_id'] ."''><img src='../images/plus2.png'></a></td>";
            echo "<td style='text-align:center'><a href='admin_UpdateLivro.php?livro_id=". $row['livro_id'] ."''><img src='../images/edit.png'></a></td>";
            echo "<td style='text-align:center'><a href='admin_formDeleteLivro.php?livro_id=". $row['livro_id'] ."''><img src='../images/delete.png'></a></td>";
            
     
            echo "</tr>";
     
            $row = pg_fetch_assoc($result);
        }
    ?>
</table>
<br>
<div class="final_buttons">
    <button class='button'><a href="admin_CreateLivro.php">Adicionar Livro</a></button>
    <br>
    <button class='button'><a href="admin_list.php">Voltar</a></button>
</div>   
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>