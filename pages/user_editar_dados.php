<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados Pessoais</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    session_start();
	include_once "../includes/header.php"
?> 
<?php
    include "../includes/opendb.php";
    include "../database/utilizador.php";
    

    $utilizador_id = $_SESSION['utilizador_id'];
    

    $result_utilizador = getUtilizadorById($utilizador_id);

    $row = pg_fetch_assoc($result_utilizador);

    $nome=$row["nome"];
    $username=$row["username"];
    $email=$row["email"];
    $contacto=$row["contacto"];
    $morada=$row["morada"];
    $codigo_postal=$row["codigo_postal"];
    $data_nascimento=$row["data_nascimento"];

?>


    <form class="form_edit" action="../actions/user_editar_action.php" method="post">
    <h3> Editar Dados Pessoais </h3>
    <label>Username: </label>
    <input type="text" name= "username" value = "<?php echo $username; ?>">
    <br>
    <label>Email: </label>
    <input type="text" name= "email" value = "<?php echo $email; ?>">
    <br>
    <label>Contacto: </label>
    <input type="text" name= "contacto" value = "<?php echo $contacto; ?>">
    <br>
    <label>Morada: </label>
    <input type="text" name= "morada" value = "<?php echo $morada; ?>">
    <br>
    <label>Códido Postal: </label>
    <input type="text" name= "codigo_postal" value = "<?php echo $codigo_postal; ?>">
    <br>
    <label>Data de Nascimento: </label>
    <input type="text" name= "data_nascimento" value = "<?php echo $data_nascimento; ?>">
    <br>
    <input type="hidden" name="utilizador_id" value = "<?php echo $utilizador_id;?>">
    <input type="submit" value= "Confirmar Dados" class="button">
    <input type="submit" name="Cancelar" value="Cancelar" class="button_gray">

    </form>
<?php
	include_once "../includes/footer.php"
?>    
    
</body>
</html>