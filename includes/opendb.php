<?php
    $conn=pg_connect("host=db dbname=si2015 user=si2015 password=burpees");

    if(!$conn){
        print "Não foi possível estabelecer ligação";
    }

    $query="set schema 'livraria';";
    pg_exec($conn,$query);
    
?>