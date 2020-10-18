<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários</title>
    <link rel="stylesheet" type="text/css" href="../css/sttle.css">
    <link rel="stylesheet" type="text/css" href="../css/avaliacoes.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/header.php";
    include "../database/avaliacoes.php";
    include "../database/livros.php";

    $comentario="";

    $livro_id=$_GET['livro_id']; 

    if (!empty($_SESSION['msgErro'])) {
        echo "<div class='msg_erro'>";
            echo "<p style=\"color:red\">".$_SESSION['msgErro']."<p>";
            $_SESSION['msgErro'] = NULL;
        echo " </div>";
    }
?>
<div class="avaliacoes">
    <?php
    $result_avaliacoes= getAvaliacoes($livro_id);
   
    if (pg_num_rows($result_avaliacoes)>0){
    $row = pg_fetch_assoc($result_avaliacoes); 
        while (isset($row['avaliacao_id'])){?>
            <div class="avaliacao-content">
                <p id="bold-name"><?php echo $row['nome'] ?></p>
                <p><?php echo $row['comentario'] ?></p>
                <br>
            </div>
        <?php
            $row = pg_fetch_assoc($result_avaliacoes);
        }  
    }
    else {
        echo "<p>Não existem comentários para este livro dos leitores.</p>";
    }
    ?>
    <?php
        if(isset($_SESSION['utilizador_id'])){ ?>
        <form action="../actions/addAvaliacao_action.php" method="GET">
            <input type="hidden" value="<?php echo $livro_id; ?>" name="livro_id">
            <input type="text" value="<?php echo $comentario;?>" name="comentario" placeholder="Escreva o seu comentário">
            <input type="submit" value="Confirmar" name="Confirmar" class="button"> 
            <input type="submit" value="Cancelar" name="Cancelar" class="button_gray">
        </form>
    <?php } 
        else{
            echo "<p id='bold-name-2'>Submeter comentário:</p>";
            echo "<a href='login.php'>Fazer login</a>";
        }?>
</div>
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>
