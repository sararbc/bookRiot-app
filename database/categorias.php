<?php

    function getAllCategorias(){
        global $conn;
        $query = "select * from categoria";
        $result = pg_exec($conn, $query);
        return $result;
    }

    function getCategoriaById($categoria_id){
        global $conn;
        $query ="select * from categoria WHERE categoria_id" . $categoria_id;
        $result =pg_exec($conn, $query);
        return $result;
    }
?>