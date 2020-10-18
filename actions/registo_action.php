<?php
    include "../includes/opendb.php";
    
    //Registar
    $inserir= "INSERT INTO utilizador (tipo_utilizador, nome, username, email, password, contacto, morada, codigo_postal, cartao_desconto, data_nascimento) VALUES ('user', '$nome', '$username', '$email', '$password', '$contacto', '$morada', '$codigo_postal', '0', '$data_nascimento') RETURNING utilizador_id";
	
    pg_exec($conn,$inserir);
    
	//session_start();

	$inserir_novo=pg_fetch_row($inserir);
	
	$inserir_query = pg_query("SELECT lastval();");
	$inserir_novo = pg_fetch_row($inserir_query);
	$_SESSION ['id']=$inserir_novo[0];
	
	pg_close($conn);
	
	
	header('Location: login.php');

?>