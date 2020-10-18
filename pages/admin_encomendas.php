<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/utilizador.php";
    include "../database/encomenda.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    include_once "../includes/header.php";
?>
<h1>Encomendas efetuadas</h1>
<?php
    $nome_pesquisa = "";
    if(isset($_GET['nome'])){
        $nome_pesquisa=$_GET['nome'];
    }
?>
<form class="pesquisa_admin" action="admin_encomendas.php" method="get">
    <h3>Pesquisa por nome</h3>
    <label>Nome do Cliente: </label>
    <div class="box">
        <input type="text" name="nome" id="titulo" value="<?php echo $nome_pesquisa; ?>">
        <span>
        <input type="submit" value="Pesquisar" class="button">
    </div>
</form>
<table class="table_admin" width=80%>
    <thead>
        <tr>
            <th>Número</th>
            <th>Nome Cliente</th>
            <th>Estado</th>
            <th>Produtos</th>
            <th>Preço</th>
        </tr>
    </thead>
    <?php
    $list_encomendas=listEncomendas($nome_pesquisa);

    $row=pg_fetch_assoc($list_encomendas);
    while(isset($row['encomenda_id'])){

        echo"<tr>";

        echo "<td style='text-align:center'>" . $row["encomenda_id"] . "</td>";
        echo "<td style='text-align:left'>" . $row["nome"] . "</td>";
        echo "<td style='text-align:left'><a href='admin_updateEncomenda.php?encomenda_id=". $row['encomenda_id'] ."''>" . $row['estado'] . "</a></td>";
        echo "<td style='text-align:center'><a href='admin_verProdutos.php?encomenda_id=". $row['encomenda_id'] ."''><img src='../images/plus2.png'></a></td>";
        echo "<td style='text-align:center'>" . $row["preco"] . "€</td>"; 
            
        echo "</tr>";
     
        $row = pg_fetch_assoc($list_encomendas);
    }
?>
</table>
<div class="final_buttons">
    <button class='button'><a href="admin_list.php">Voltar</a></button>
</div>  
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>