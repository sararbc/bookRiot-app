<?php

function getUtilizadorById($utilizador_id){
    global $conn;
    $query ="SELECT * FROM utilizador WHERE utilizador_id = '".$utilizador_id."'";
    $result =pg_exec($conn, $query);
    return $result;
}

function ListUsers($nome_pesquisa){
    global $conn;
    $query= "SELECT * FROM utilizador where tipo_utilizador='user'";
    
    if($nome_pesquisa !="")
    $query .= " AND (utilizador.nome like '".$nome_pesquisa ."')";
    $result =pg_exec($conn, $query);
    return $result;
}

//Cartão de desconto 

function getValorCartaoDesconto($utilizador_id){
    global $conn;
    $query= "SELECT cartao_desconto FROM utilizador WHERE utilizador_id= $utilizador_id";
    $result=pg_exec($conn, $query);
    return $result;
}

function updateCartaoDesconto($cartao_desconto,$utilizador_id){
    global $conn;
    $query="UPDATE utilizador set cartao_desconto='$cartao_desconto' WHERE utilizador_id= $utilizador_id";
    pg_exec($conn, $query);
}

?>