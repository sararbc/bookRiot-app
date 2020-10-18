<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livrarias</title>
    <link rel="icon" href="../images/icon_book_2.png">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/livrarias.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    
</head>
<body>
<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../includes/header.php";

?>
<h1>As Nossas Livrarias</h1>
<div class="filtro">
    <?php
        $query= "SELECT DISTINCT distrito FROM livraria";
        $result = pg_exec($conn, $query);
        if(pg_numrows($result)>0){
            echo "<form method='POST'>";
            echo "<select name='distrito' value=''>Distrito</option>";   
            echo "<option value=''>Escolha o seu distrito</option>";
            while ($row=pg_fetch_assoc($result)){
                $distrito=$row['distrito'];
                if ($_POST['distrito'] == $distrito){
                    echo "<option value=\"".$distrito."\" selected='selected'>$distrito</option>"; 
                    } 
                else{
                    echo "<option value=\"".$distrito."\">$distrito</option>";       
                    }  
            }
            echo "</select>";
            echo "<span>";
            echo "<input type='submit' value = 'Filtrar'>"; 
            echo "</form>";
        }
    ?>
</div>
<?php
    $query = "select * from livraria";
    $result = pg_exec($conn, $query);
    
    if(pg_numrows($result)>0){
        echo "<div class='livraria_box'>";
            if(!isset($_POST['distrito'])){
                $row = pg_fetch_assoc($result);
                while (isset($row['livraria_id'])){
                    echo "<div class='content'>";
                        echo "<div class='livraria_info'>";
                                echo "<p class='nome'>" .$row['nome']. "</p>";
                                echo "<p class='info'>" .$row['morada']. " </p>";
                                echo "<p class='info'>" .$row['codigo_postal']. " </p>";
                                echo "<p class='info'> Tel: " .$row['contacto']. " </p>";
                        echo "</div>";
                    echo "</div>";
                   
                $row = pg_fetch_assoc($result);
                } 
                
            }
            elseif(isset($_POST['distrito'])){
                $distrito = $_POST['distrito'];
                $query="SELECT * FROM livraria WHERE distrito = '".$distrito."'";
                $result = pg_exec($conn, $query);
                $row = pg_fetch_assoc($result);
                while (isset($row['livraria_id'])){
                    echo "<div class='content'>";
                        echo "<div class='livraria_info'>";
                                echo "<p class='nome'>" .$row['nome']. "</p>";
                                echo "<p class='info'>" .$row['morada']. " </p>";
                                echo "<p class='info'>" .$row['codigo_postal']. " </p>";
                                echo "<p class='info'> Tel: " .$row['contacto']. " </p>";
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
<?php
    include_once "../includes/footer.php";
?>

</body>
</html>