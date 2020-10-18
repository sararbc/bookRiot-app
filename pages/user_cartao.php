<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartão de Fidelidade</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
    
</head>
<body>
<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/header.php";
?>
<h1>Cartão de Fidelidade</h1>
<?php 
    $query= "SELECT * FROM encomenda WHERE utilizador_id = '".$_SESSION['utilizador_id']."'";
    $result = pg_exec($conn, $query);
    $total_cartao=0;
?>          
<table class= "tabela_cartao" width=80%>
    <thead>
		<tr>
			<th>Data</th>
			<th>Encomenda</th>
            <th>Valor descontado</th>
        </tr>
    </thead>
<?php
    while ($row=pg_fetch_assoc($result)){
        $encomenda_id=$row['encomenda_id'];
        $data_encomenda=$row['data_encomenda'];
        $valor_cartao=number_format($row["preco"] * 0.1, 2);?>
        <tr>
            <td style="text-align:center"> <?php echo $data_encomenda?> </td>
            <td style="text-align:center"> <?php echo $encomenda_id?> </td>
            <td style="text-align:center"> <?php echo $valor_cartao?>€</td>
        </tr>
<?php 
        $total_cartao=($total_cartao + $valor_cartao);
    }?>     
</table>
<div class="total_cartao">
    <?php
         echo "Saldo já atribuido: " .$total_cartao . "€";
    ?>
</div>		
<div class="final_buttons">
	<button class='button'><a href="user_list.php">Voltar</a></button>
</div> 
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>