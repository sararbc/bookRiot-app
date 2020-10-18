<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Password</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    include_once "../includes/header.php";
?>
<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/utilizador.php";
    
    if (!empty($_POST['Cancelar'])){
        //Se cancelou, redireciona para a página dos dados do cliente
        header("Location: ../pages/user_dados.php");
    }

    if(!empty($_POST['Submit'])){
        $utilizador_id = $_POST['utilizador_id'];
        $password_atual = $_POST['password_atual'];
        $password_nova = $_POST['password_nova'];

        $query = "SELECT utilizador_id, password FROM utilizador WHERE utilizador_id = '".$utilizador_id."' AND password = '".$password_atual."' ";
        $result= pg_exec($conn,$query);
        $num = pg_fetch_array($result);

        if($num>0){
            $query2 = "UPDATE utilizador SET password = '".$password_nova."' WHERE utilizador_id = '".$utilizador_id."' ";
            pg_exec($conn,$query2);
            header('Location: ../user/user_dados.php');
        }
        
    }
?>
    <h1>Alterar Password</h1>

    <form class="form_pass"  action="" method="post">
    <label>Password Atual: </label>
    <input type="password" name= "password_atual">
    <br>
    <label>Nova Password: </label>
    <input type="password" name= "password_nova">
    <br>
    <input type="hidden" name="utilizador_id"  value = "<?php echo $_SESSION['utilizador_id'];?>">
    <input type="submit" name="Submit" value= "Confirmar Password" class="button">
    <input type="submit" name="Cancelar" value= "Cancelar" class="button_gray">
    </form>
<?php
    include_once "../includes/footer.php";
?>   
</body>
</html>