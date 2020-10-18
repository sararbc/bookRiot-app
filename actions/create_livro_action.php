<?php
    session_start();
    include "../includes/opendb.php";
    include "../database/livros.php";
  
  if (!empty($_POST['Cancelar'])){
    //Se cancelou, redireciona de imediato para a página de admin_livros
    header("Location: ../pages/admin_livros.php");
  }
  if(!empty($_POST['Confirmar'])){

    $livro_id = $_POST['livro_id'];
    $titulo = $_POST['titulo'];
    $categoria_id = $_POST['categoria_id'];
    $preco = $_POST['preco'];
    $editora = $_POST['editora'];
    $autor = $_POST['autor'];
    $sinopse = $_POST['sinopse'];
    $tempo_entrega = $_POST['tempo_entrega'];

    // Código de Upload de Imagens
    $fileName = "";
    if (isset($_FILES["imagem"]["error"]) && $_FILES["imagem"]["error"] > 0)
    {
    echo "Error: " . $_FILES["imagem"]["error"] . "<br>";
    }
    else
    {
    $prefixo = 'livro_'; // definir um prefixo apropriado para identificação
    $fileName = $prefixo . $_FILES["imagem"]["name"];
    $fileName = str_replace(' ', '', $fileName);//remover os espaços para evitar erros
    $fileName = str_replace(':', '', $fileName);//remover os : para evitar erros
    $fileName = str_replace('-', '', $fileName);//remover os - para evitar erros
    $destino = '../images/livros/' . $fileName;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $destino);
    }

    // Validação dos dados: assumiu-se que todos os campos são obrigatórios
    if (empty($titulo) ||empty($categoria_id) || empty($preco) || empty($editora) || empty($autor) || empty($sinopse) || empty($tempo_entrega) || empty($fileName)){
        $dados_validos = false;
    }
    else{
      $dados_validos = true;
    }
    if(!$dados_validos){
      $_SESSION['msgErro'] = "*Pelo menos um campo do formulário em falta, necessário preencher.<p>";
    
			$_SESSION['titulo'] = $titulo;
			$_SESSION['preco'] = $preco;
			$_SESSION['editora'] = $editora;
      $_SESSION['autor'] = $autor;
      $_SESSION['sinopse'] = $sinopse;
      $_SESSION['tempo_entrega'] = $tempo_entrega;
      $_SESSION['fileName'] = $fileName;

      //Redireciona para pag. anterior
      header("Location: ../pages/admin_CreateLivro.php");
    }
    else{
      $result= createLivro($titulo, $categoria_id, $preco, $editora, $autor, $sinopse, $tempo_entrega, $fileName);
      echo "Adicionado";
      header('Location: ../pages/admin_livros.php');
    }
  }
?>
