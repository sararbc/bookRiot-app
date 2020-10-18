<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/utilizador.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    include_once "../includes/header.php";
?>
<h1>Clientes</h1>
<?php
    $nome_pesquisa = "";

    if(isset($_GET['nome'])){
        $nome_pesquisa=$_GET['nome'];

    }
?>
<form class="pesquisa_admin" action="admin_clientes.php" method="get">
<h3>Pesquisa</h3>
    <div class="box">
        <label>Nome do Cliente: </label>
        <input type="text" id="titulo" name="nome" value="<?php echo $nome_pesquisa; ?>">
        <br>
        <input type="submit" value="Pesquisar" class="button">
    </div>
</form>
<br>
<table class="table_admin" width=80%>
<thead>
<tr>
    <th>Nome</th>
    <th>Data de Nascimento</th>
    <th>Telefone</th>
    <th>E-mail</th>
    <th>Saldo do Cartão €</th>
</tr>
</thead>
<?php
    $list_users=ListUsers($nome_pesquisa);

    $row=pg_fetch_assoc($list_users);
    while(isset($row['utilizador_id'])){

        echo"<tr>";
        echo "<td style='text-align:left'>" . $row["nome"] . "</td>";
        echo "<td style='text-align:center'>" . $row["data_nascimento"] . "</td>";
        echo "<td style='text-align:center'>" . $row["contacto"] . "</td>";
        echo "<td style='text-align:left'>" . $row["email"] . "</td>";  
        echo "<td style='text-align:center'>" . $row["cartao_desconto"] . "</td>"; 
            
     
        echo "</tr>";
     
        $row = pg_fetch_assoc($list_users);
    }
?>    
</table>
<br>
<div class="final_buttons">
    <button class='button'><a href="admin_list.php">Voltar</a></button>
</div>  
<?php
    include_once "../includes/footer.php";
?>
</body>
</html>