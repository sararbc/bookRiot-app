<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/utilizador.php";
    include "../database/encomenda.php";

    $encomenda_id=$_GET['encomenda_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Produtos</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    include_once "../includes/header.php";

    $result = getLivrosByEncomenda($encomenda_id);

    $row= pg_fetch_assoc($result);
?>
<h1>Encomenda <?php echo $row['encomenda_id']?></h1>
<br>
<table class="table_admin" width=80%>
    <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>   
    </thead>
<?php
    while(isset($row['encomenda_id'])){

        echo"<tr>";
        echo "<td style='text-align:left'>" . $row["titulo"] . "</td>";
        echo "<td style='text-align:center'>" . $row["quantidade"] . "</td>";
        echo "<td style='text-align:center'>" . $row["preco"] . "</td>";
            
        echo "</tr>";
     
        $row = pg_fetch_assoc($result);
    }
?>
</table>
<div class="final_buttons">
    <button class='button'><a href="admin_encomendas.php">Voltar</a></button>
</div>  
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>