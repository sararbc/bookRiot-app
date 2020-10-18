<?php

    function getAllLivros($titulo_pesquisa, $categorias){
        global $conn;
        $query = "select * from livro JOIN categoria 
                ON livro.categoria_id = categoria.categoria_id
                WHERE 1=1";
        if($titulo_pesquisa !="")
        $query .=  " AND livro.titulo like '".$titulo_pesquisa ."'";
           
        if(!empty($categorias) && sizeof($categorias) >0)
        {
            $query .= " AND  (";
           
            for($i=0; $i < sizeof($categorias); $i++)
            {
            if($i >0)
            {
                $query .= " OR ";
            }
           
            $query .= " livro.categoria_id = ". $categorias[$i];
           
            if($i == sizeof($categorias)- 1)
            $query .= ")";
            }
        }

        $result = pg_exec($conn,$query);
        return $result;
    }

    function getLivroById($livro_id){
        global $conn;
        $query= "select * from livro JOIN categoria ON livro.categoria_id = categoria.categoria_id WHERE livro_id=".$livro_id;
        $result = pg_exec($conn, $query);
        return $result;
    }

    function createLivro($titulo, $categoria_id, $preco, $editora, $autor, $sinopse, $tempo_entrega, $imagem){
        global $conn;
        $query="INSERT INTO livro (titulo, categoria_id, preco, editora, autor, sinopse, tempo_entrega, imagem) VALUES('".$titulo."', '".$categoria_id."', '".$preco."', '".$editora."', '".$autor."', '".$sinopse."', '".$tempo_entrega."','".$imagem."')"; 
        $result = pg_exec($conn, $query);
        return $result;
    }

    function updateLivro($titulo, $categoria_id, $preco, $editora, $autor, $sinopse, $tempo_entrega, $imagem, $livro_id){
        global $conn;
        $query = "UPDATE livro set titulo='".$titulo."', categoria_id='".$categoria_id."', preco='".$preco."', editora='".$editora."', autor='".$autor."', sinopse ='".$sinopse."', tempo_entrega ='".$tempo_entrega."', imagem='".$imagem."' WHERE livro_id = $livro_id ";
        $result = pg_exec($conn, $query);
        return $result;
    }

    function deleteLivro($livro_id){
        global $conn;
        $query = "DELETE from livro where livro_id=".$livro_id;
        $result = pg_exec($conn, $query);
    }
    

?>