<?php
    include "../includes/opendb.php";
    include "../database/livros.php";

    if (isset($_GET['Cancelar'])){
        header("Location:../pages/admin_livros.php");
    }
    else{
        $livro_id=$_GET['livro_id'];
        $result=deleteLivro($livro_id);
        header("Location:../pages/admin_livros.php");
    }
?>