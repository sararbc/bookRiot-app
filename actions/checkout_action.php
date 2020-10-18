<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/encomenda.php";
    include "../database/utilizador.php";

    $total=$_POST['total'];
    $data_encomenda=date("Y-m-d");
    $estado= "Pendente";
    $result_encomenda=novaEncomenda($_SESSION['utilizador_id'], $data_encomenda, $total, $estado);

    //Acumular desconto
    $novo_desconto = number_format(0.1 * $total, 2);
		updateCartaoDesconto($novo_desconto, $_SESSION['utilizador_id']);
    
    while ($row = pg_fetch_array($result_encomenda)){
		$encomenda_id = $row['encomenda_id'];
	}
  
	foreach($_SESSION["carrinho"] as $keys => $values) {
		addEncomendaLivro($encomenda_id,$values['livro_id'],$values['quantidade']);
	}
  
	unset($_SESSION['carrinho']);
	header("Location: ../pages/carrinho.php");
    
?>