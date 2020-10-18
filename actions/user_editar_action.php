<?php
    include "../includes/opendb.php";
    include "../database/utilizador.php";

    if (!empty($_POST['Cancelar'])){
        //Se cancelou, redireciona para a página dos dados do cliente
        header("Location: ../pages/user_dados.php");
    }
    
    if(!empty($_POST['Confirmar'])){

    $username=$_POST["username"];
    $email=$_POST["email"];
    $contacto=$_POST["contacto"];
    $morada=$_POST["morada"];
    $codigo_postal=$_POST["codigo_postal"];
    $data_nascimento=$_POST["data_nascimento"];

    $utilizador_id=$_POST['utilizador_id'];
    
    
    
    
    # alterações a um utilizador
    $query = "UPDATE utilizador SET username='".$username."', email='".$email."', 
    contacto='".$contacto."', morada='".$morada."', codigo_postal='".$codigo_postal."', 
    data_nascimento= '".$data_nascimento."' WHERE utilizador_id ='".$utilizador_id."'";
    
    pg_exec($conn,$query);

    
    #reencaminhar o utilizador para os dados
    header('Location: ../pages/user_dados.php');
    }
?>