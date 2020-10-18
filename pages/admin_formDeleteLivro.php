<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../login.php");
    }
    // Form Eliminar Livro
    include "../includes/opendb.php";
    include "../database/livros.php";
?>
<html>
<body>
    <h3>Eliminar Livro</h3>

    <?php
        $livro_id = $_GET['livro_id'];

        $result_livro= getLivroById($livro_id);
        $row = pg_fetch_assoc($result_livro);

        include_once "../includes/header.php"; 
    ?>

<form action="../actions/deleteLivro_action.php" method="get" enctype="multipart/form-data">
        
    <input type="hidden" name="livro_id" value="<?php echo $livro_id; ?>">
    <label>Título</label>
    <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>">
    <br>
    <label>Categoria</label>
    <input type="text" name="categoria" value="<?php echo $row['categoria']; ?>">
    <br>
    <label>Preço</label>
    <input type="text" name="preco" value="<?php echo $row['preco']; ?>">
    <br>
    <label>Editora</label>
    <input type="text" name="editora" value="<?php echo  $row['editora']; ?>">
    <br>
    <label>Autor</label>
    <input type="text" name="autor" value="<?php echo  $row['autor']; ?>">
    <br>
    <label>Sinopse</label>
    <input type="text" name="sinopse" value="<?php echo $row['sinopse']; ?>">
    <br>
    <label>Tempo de entrega</label>
    <input type="text" name="tempo_entrega" value="<?php echo $row['tempo_entrega']; ?>">

    <?php if(isset($_GET['livro_id']) && isset($imagem)){ ?>
    <img style="height:50px; width:auto;" src="../../images/<?php  echo $row['imagem']; ?>" alt="Imagem do Livro">
    <?php }?>
    <br>
    <br>
    <input type="file" name="imagem">
    <br>
    <br>
    <input type="submit" name="Confirmar" value="Confirmar">
    <input type="submit" name="Cancelar" value="Cancelar">
</form>
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>