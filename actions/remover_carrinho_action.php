<?php
    session_start();
    include_once "../includes/opendb.php";

    foreach($_SESSION["carrinho"] as $keys => $values){
		if($values["livro_id"] == $_GET["livro_id"]){
			unset($_SESSION["carrinho"][$keys]);
		}
    }
    header("Location: ../pages/carrinho.php");
?>