<?php
    function getAvaliacoes($livro_id){
        global $conn;
        $query="select * from avaliacoes INNER JOIN utilizador ON avaliacoes.utilizador_id = utilizador.utilizador_id WHERE livro_id= $livro_id"; 
        $result=pg_exec($conn, $query);
        return $result;
    }
    
    function newAvaliacao($utilizador_id,$livro_id, $comentario){
        global $conn;
        $query= "INSERT INTO avaliacoes(utilizador_id,livro_id, comentario) VALUES(".$utilizador_id.",".$livro_id.",'".$comentario."')";
        $result=pg_exec($conn, $query);
        return $result;
    }
?>