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
    include "../database/categorias.php";
    
    $livro_id ="";
    $titulo ="";
    $categoria_id ="";
    $preco="";
    $editora="";
    $autor="";
    $sinopse="";
    $tempo_entrega="";
?>
<html>
<body>
<?php
    include_once "../includes/header.php";
?>
<?php
//Se houver uma msg de erro na variável de sessão, apresenta-a e depois limpa a variável
if (!empty($_SESSION['msgErro'])) {
    echo "<div class='msg_erro'>";
        echo "<p style=\"color:red\">".$_SESSION['msgErro']."<p>";
        $_SESSION['msgErro'] = NULL;
    echo " </div>";
//Recuperar os campos do formulário guardados na variáveis de sessão, e depois limpar essas variáveis
if (!empty($_SESSION['titulo'])) 		 	    $titulo = $_SESSION['titulo']; 					else $titulo = "";
if (!empty($_SESSION['categoria_id'])) 		 	$categoria_id = $_SESSION['categoria_id']; 		else $categoria_id = "";
if (!empty($_SESSION['preco'])) 	            $preco = $_SESSION['preco']; 		            else $preco = "";
if (!empty($_SESSION['editora'])) 	            $editora = $_SESSION['editora']; 		        else $editora = "";
if (!empty($_SESSION['autor'])) 	            $autor = $_SESSION['autor']; 	                else $autor = "";
if (!empty($_SESSION['sinopse'])) 	            $sinopse = $_SESSION['sinopse']; 	            else $sinopse = "";
if (!empty($_SESSION['tempo_entrega'])) 	    $tempo_entrega = $_SESSION['tempo_entrega']; 	else $tempo_entrega = "";
if (!empty($_SESSION['fileName'])) 	            $imagem = $_SESSION['fileName']; 	            else $imagem = "";

$_SESSION['titulo'] = NULL; 		
$_SESSION['categoria_id'] = NULL;		 
$_SESSION['preco'] = NULL;	 
$_SESSION['editora'] = NULL;	
$_SESSION['autor'] = NULL;
$_SESSION['sinopse'] = NULL;
$_SESSION['tempo_entrega'] = NULL;
$_SESSION['imagem'] = NULL;

}
else {
    $livro_id=$_GET['livro_id'];

    $result_livro = getLivroById($livro_id);

    $row = pg_fetch_assoc($result_livro);

    $titulo =$row["titulo"];
    $categoria_id = $row["categoria_id"];
    $preco= $row["preco"];
    $editora= $row["editora"];
    $autor= $row["autor"];
    $sinopse= $row["sinopse"];
    $tempo_entrega= $row["tempo_entrega"];
}
$result_categorias =getAllCategorias();
?>
<form class="create_livro" action="../actions/edit_livro_action.php<?php echo ($livro_id ? '?livro_id='. $livro_id : ''); ?>" method="post" enctype="multipart/form-data">
<h3> Editar Livro </h1>
    <input type="hidden" name="livro_id" value="<?php echo $livro_id; ?>">
    <label>Título</label>
    <input type="text" name="titulo" value="<?php echo $titulo; ?>">
    <br>
    <label>Categoria</label>
    <select name="categoria_id">
    
    <?php
        $row = pg_fetch_assoc($result_categorias);
        while (isset($row['categoria_id'])) {

            echo "<option value='".$row['categoria_id'] . "'" . ($categoria_id == $row['categoria_id'] ? 'selected': ''). "> ". $row['categoria'] . "</option>"; 
            $row = pg_fetch_assoc($result_categorias);
        }
    ?>
    </select>
    <br>
    <label>Preço</label>
    <input type="text" name="preco" value="<?php echo $preco; ?>">
    <br>
    <label>Editora</label>
    <input type="text" name="editora" value="<?php echo $editora; ?>">
    <br>
    <label>Autor</label>
    <input type="text" name="autor" value="<?php echo $autor; ?>">
    <br>
    <label>Sinopse</label>
    <textarea name="sinopse" cols="30" rows="10" id="sinopse"><?php echo $sinopse; ?></textarea>
    <br>
    <label>Tempo de entrega</label>
    <input type="text" name="tempo_entrega" value="<?php echo $tempo_entrega; ?>">
    <?php if(isset($_GET['livro_id']) && isset($imagem)){ ?>
   <img style="height:50px; width:auto;" src="../../images/<?php  echo $imagem; ?>" alt="Imagem do Livro">
   <?php }?>
   <br>
   <br>
   <input type="file" name="imagem">
   <br>
   <br>
   <input type="submit" name="Confirmar" value="Confirmar" class="button">
   <input type="submit" name="Cancelar" value="Cancelar" class="button_gray">
</form>
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>


