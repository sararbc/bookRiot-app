<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas</title>
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/encomendas.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
    
</head>
<body>
<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/header.php";
?>
<h1>As Suas Encomendas</h1>
<div class="filtro_encomendas">
    <?php
        $query= "SELECT * FROM encomenda WHERE utilizador_id = '".$_SESSION['utilizador_id']."'";
        $result = pg_exec($conn, $query);
        if(pg_numrows($result)>0){
            echo "<form method='POST'>";
            echo "<select name='encomenda' value=''>Encomenda</option>"; 
            echo "<option value=''>Escolha a sua encomenda</option>";  
                while ($row=pg_fetch_assoc($result)){
                $encomenda_id=$row['encomenda_id'];
                $data_encomenda=$row['data_encomenda'];
                    if ($_POST['encomenda'] == $encomenda_id){
                        echo "<option value=\"".$encomenda_id."\" selected='selected'>Encomenda n.º ".$encomenda_id." (".$data_encomenda.")</option>"; 
                    } 
                    else{
                        echo "<option value=\"".$encomenda_id."\">Encomenda n.º ".$encomenda_id." (".$data_encomenda.")</option>";       
                    }   
                }
            echo "</select>";
            echo "<span>";
            echo "<input type='submit' value = 'Confirmar'>"; 
            echo "</form>";
        }
    ?>
</div>
<div class="content_encomendas">
    <?php
        if(pg_numrows($result)>0){
            echo "<div class='encomendas_box'>";
            if(isset($_POST['encomenda'])){
            if($_POST['encomenda']<>''){
                $encomenda_id = $_POST['encomenda'];
                $query = "SELECT * FROM encomenda WHERE encomenda_id = '".$encomenda_id."'";
                $result = pg_exec($conn, $query);
                $row = pg_fetch_assoc($result);
                    echo "<div class='content'>";
                        echo "<div class='encomendas_info'>";
                                echo "<p class='info'><b>Valor total da encomenda: </b>" .$row['preco']. "€</p>";
                                echo "<p class='info'><b>Data da encomenda: </b>" .$row['data_encomenda']. " </p>";
                                echo "<p class='info'><b>Estado da encomenda: </b>" .$row['estado']. " </p>";
                        echo "</div>";
                    echo "</div>";
                    $row = pg_fetch_assoc($result);
                } 
        }
            echo "</div>";
    }
    else{
        echo "<p> Sem resultados. </p>";
    }
    ?>
    <div class="content_tabela_encomendas">
        <?php if(isset($_POST['encomenda'])){
            $encomenda_id = $_POST['encomenda'];
            $query = "SELECT * FROM encomenda_livro JOIN livro ON encomenda_livro.livro_id = livro.livro_id WHERE encomenda_id='".$encomenda_id."'";
            $result = pg_exec($conn, $query);
            $row = pg_fetch_assoc($result);
        ?>
            <table class="tabela_encomendas" width=100%>
                <thead>
                    <tr>
                        <th style="width: 60%">Produtos</th>
                        <th style="width: 20%">Quantidade</th>
                        <th style="width: 20%">Preço</th>
                    </tr>
                </thead>
                <?php
                    while(isset($row['encomenda_id'])){?>
                    <tr>
                        <td class="" style="text-align:center">
                            <div class="produto">
                                <img width=15% src="../images/livros/<?php echo $row["imagem"]?>">
                                <div class="produtos">
                                    <p class="titulo"><b> <?php echo $row["titulo"]?></b></p>
                                    <p class="autor">De <?php echo $row["autor"]?></p>	
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="quantidade" style="text-align:center">
                                <p class="quantidade"><?php echo $row["quantidade"]?></p>
                            </div>
                        </td>
                        <td>
                            <div class="preço" style="text-align:center">
                                <p class="preco"><?php echo $row["preco"]?>€</p>
                            </div>
                        </td>
                    </tr>
                        <?php 
                            $row = pg_fetch_assoc($result);
                        }
                        ?>
            </table>
                <?php }
                    if(isset($_POST['encomenda'])){
                        $encomenda_id = $_POST['encomenda'];
                        $query = "SELECT * FROM encomenda WHERE encomenda_id = '".$encomenda_id."'";
                        $result = pg_exec($conn, $query);
                        $row = pg_fetch_assoc($result);
                        $cartao=number_format($row["preco"] * 0.1, 2);
                        echo "<div class='content'>";
                            echo "<div class='encomendas_final'>";
                                echo "<p class='info'><b>Total: </b>" .$row['preco']. "€</p>";
                                echo "<p class='info'><b>Poupança em cartão: </b>" .$cartao. "€</p>";
                            echo "</div>";
                        echo "</div>";
                        }
                ?>
                        
    </div>	
</div>
    <?php
        if(isset($_POST['encomenda'])){
            echo "<button class='button'><a href='user_list.php'>Voltar</a></button>";
        }
    ?>

<?php
    include_once "../includes/footer.php";
?>

</body>
</html>