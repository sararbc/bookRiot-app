<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dados Pessoais</title>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/user.css">
	<link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
 	session_start();
	include_once "../includes/header.php"
?>
<h1>Dados Pessoais</h1>
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
<div class="dados_container">
	<form class="form_dados" method ="POST" action ="user_dados.php">
			
		<p readonly="readonly" ><a><b>Nome: </b><?php echo $nome;?></a></p>
		<p readonly="readonly" ><a><b>Username: </b><?php echo $username;?></a></p>
		<p readonly="readonly" ><a><b>Email: </b><?php echo $email;?></a></p>
		<p readonly="readonly" ><a><b>Contacto: </b><?php echo $contacto;?></a></p>
		<p readonly="readonly" ><a><b>Morada: </b><?php echo $morada;?></a></p>
		<p readonly="readonly" ><a><b>Código Postal: </b><?php echo $codigo_postal;?></a></p>
		<p readonly="readonly" ><a><b>Data de Nascimento: </b><?php echo $data_nascimento;?></a></p>
			
	</form>

	<div class="final_buttons">
		<button class='button'><a href="user_editar_dados.php">Editar Dados</a></button>
		<button class='button'><a href="user_alterar_password.php">Alterar Password</a></button>
		<button class='button'><a href="user_list.php">Voltar</a></button>
	</div> 
</div>

<?php
	include_once "../includes/footer.php"
?>
</body>
</html>



  