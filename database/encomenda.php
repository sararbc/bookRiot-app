<?php
    function novaEncomenda($utilizador_id, $data_encomenda, $preco, $estado){
        global $conn;
        $query="INSERT INTO encomenda(utilizador_id, data_encomenda, preco, estado) VALUES (".$utilizador_id.",'$data_encomenda',".$preco.",'$estado') RETURNING encomenda_id"; 
        $result_encomenda=pg_exec($conn, $query);
        return $result_encomenda;
    }

    function addEncomendaLivro($encomenda_id, $livro_id, $quantidade){
        global $conn;
        $query= "INSERT INTO encomenda_livro(encomenda_id,livro_id,quantidade) VALUES(".$encomenda_id.",".$livro_id.",".$quantidade.")";
        pg_exec($conn, $query);
    }

    function listEncomendas($nome_pesquisa){
        global $conn;
        $query="SELECT encomenda_id, utilizador.nome, estado, preco FROM encomenda INNER JOIN utilizador ON encomenda.utilizador_id=utilizador.utilizador_id";

        if($nome_pesquisa !="")
        $query .= " AND (utilizador.nome like '".$nome_pesquisa ."')";
    
        $list_encomendas=pg_exec($conn, $query);
        return $list_encomendas;
    }

    function getLivrosByEncomenda($encomenda_id){
        global $conn;
        $query="SELECT encomenda_id, titulo, quantidade, preco FROM encomenda_livro INNER JOIN livro ON livro.livro_id = encomenda_livro.livro_id WHERE encomenda_id=".$encomenda_id;
        $list_livros=pg_exec($conn, $query);
        return $list_livros;
    }

    function updateEstadoEncomenda($estado,$encomenda_id){
        global $conn;
        $query="UPDATE encomenda set estado='".$estado."' WHERE encomenda_id= $encomenda_id";
        pg_exec($conn, $query);
    }
?>