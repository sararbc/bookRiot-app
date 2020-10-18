<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Seu Carrinho</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/carrinho.css">
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
	<link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
	//FORM INCOMPLETO
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/header.php";
	include "../database/livros.php"; 
	include "../database/utilizador.php"; 
	include "../includes/login_confirm.php";

	if(!empty($_SESSION['carrinho'])){
		$total=0;
    }
?>
	<h1>O Seu Carrinho</h1>
	<?php if(isset($_SESSION['carrinho'])){?>
		<?php if(!empty($_SESSION['carrinho'])){ ?>
		<table class="tabela_carrinho" width=80%>	
			<thead>
			<tr>
				<th style="width:60%">Produto</th>
				<th style="width:20%">Quantidade</th>
				<th style="width:20%">Preço</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($_SESSION["carrinho"] as $keys => $values){?>
				<tr>
					<td  style="text-align:center">
						<div class="produto">
						<img width= 20% src="../images/livros/<?php echo $values["imagem"]?>">
							<div class="produtos">
								<p class="titulo"><b> <?php echo $values["titulo"]?></b></p>
								<p class="autor">De <?php echo $values["autor"]?></p>	
								
							</div>
						</div>
					</td>
					<td>
						<div class="caixa_quantidade" style="text-align:center">
							<p><?php echo $values["quantidade"]?></p>
						</div>
					</td>
					<td>
						<div class="preço" style="text-align:center; padding-top:20px">
						<p class="preco_total"><?php echo number_format($values["quantidade"] * $values["preco"], 2);?>€</p> <br>
						</div>
					</td>
					<td>
						<div class="eliminar" style="text-align:center">
							<a href="../actions/remover_carrinho_action.php?livro_id=<?php echo $values["livro_id"]; ?>"><img width="25px" src='../images/delete.png'></a>
						</div>
					</td>
				</tr>
				<?php
					$total = $total + ($values["quantidade"] * $values["preco"]);
				?>
			<?php }?>
			</tbody>
		</table>
		<?php
			echo "<div class='valores_finais'>";
			echo "<p class='info'><b>Total s/ desconto: </b>"  .$total. "€</p>";
			$result=getUtilizadorById($_SESSION['utilizador_id']);
			$row=pg_fetch_assoc($result);
			echo "<p class='info'><b>Valor atual no cartão: </b>" .$row['cartao_desconto']. "€</p>";
			$desconto_atual = $row['cartao_desconto'];
			$total = $total - $desconto_atual;
			echo "<p class='info'> <b>Total: </b>";
			echo number_format($total, 2);
			echo "€";
			echo "</div>";
		}
		else{
			echo "<div class='sem_produtos'>";
				echo "<img src='../images/empty_cart.png'>";
				echo "<p class='texto_divisao'>O seu carrinho de compras encontra-se vazio. Encontre livros que deseja!</p>";
				echo "<button class='button_divisao'><a href='livros_list.php'>Ver Livros</a></button>";
			echo "</div>";
		}
		?>
		<?php }
		else {
			echo "<div class='sem_produtos'>";
				echo "<img src='../images/empty_cart.png'>";
				echo "<p class='texto_divisao'>O seu carrinho de compras encontra-se vazio. Encontre livros que deseja!</p>";
				echo "<button class='button_divisao'><a href='livros_list.php'>Ver Livros</a></button>";
			echo "</div>";
		}	
		if(!empty($_SESSION["carrinho"])){ ?>
			<div class="caixa_produto resultados">
				<form method="post" action="../pages/metodo_pagamento.php">
					<input type="hidden" name="total" value="<?php echo $total; ?>" />
					<input type="submit" value="Continuar" class="button"/>
				</form>
			</div>
		<?php }
	?>
<?php
    include_once "../includes/footer.php";;
?>
</body>
</html>