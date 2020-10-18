<?php
    session_start();
    include "../database/livros.php";
	include "../includes/opendb.php";
	include "../includes/login_confirm.php";   

    // Buscar o id do livro 

    if(isset($_SESSION["carrinho"])){
		$item_array_id = array_column($_SESSION["carrinho"], "livro_id");
		if(!in_array($_GET["livro_id"], $item_array_id)){
			$count = count($_SESSION["carrinho"]);
			$item_array = array(
				'livro_id'	=> $_POST["livro_id"],
				'titulo' => $_POST["titulo"],
				'autor' => $_POST["autor"],
				'preco' => $_POST["preco"],
				'quantidade' => $_POST["quantidade"],
                'imagem' => $_POST["imagem"]
			);
			$_SESSION["carrinho"][$count] = $item_array;
		}
		else{ echo "Produto foi adicionado ao carrinho"; }
	}
	else{
		$item_array = array(
			'livro_id'	=> $_POST["livro_id"],
			'titulo' => $_POST["titulo"],
			'autor' => $_POST["autor"],
			'preco' => $_POST["preco"],
			'quantidade' => $_POST["quantidade"],
            'imagem' => $_POST["imagem"]
		);
		$_SESSION["carrinho"][0] = $item_array;
	}
	header("Location: ../pages/livroView.php?livro_id='".$_POST["livro_id"]."'");


?>