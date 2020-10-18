<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/avaliacoes.php";
    include "../database/livros.php";

    $livro_id=$_GET['livro_id'];
    $comentario=$_GET['comentario'];

    if(!empty($_GET['Cancelar'])){
        header("Location: ../pages/livroView.php?livro_id='".$livro_id."'");
    }

    if(!empty($_GET['Confirmar'])){
        $query= "SELECT from avaliacoes WHERE utilizador_id = '".$_SESSION['utilizador_id']."' AND livro_id='".$livro_id."'";
        $result = pg_exec($conn, $query);
        if (pg_num_rows($result) != 0) {
            $_SESSION['msgErro'] = "*Já escreveu uma review deste livro, não pode escrever outra novamente.<p>";
            header("Location: ../pages/avaliacaoLivro.php?livro_id='".$livro_id."'");
        } 
        else {
            newAvaliacao($_SESSION['utilizador_id'],$livro_id, $comentario);
            header("Location: ../pages/avaliacaoLivro.php?livro_id='".$livro_id."'");
        }
    }
?>