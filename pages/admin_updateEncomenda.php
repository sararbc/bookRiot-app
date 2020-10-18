<?php
    session_start();
    include "../includes/opendb.php";
    include_once "../database/encomenda.php";
    $encomenda_id=$_GET['encomenda_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Encomenda</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="icon" href="../images/icon_book_2.png">
</head>
<body>
<?php
    include "../includes/header.php";
?>
<div id="id01" class="modal">
    <span onclick="location.href='admin_encomendas.php'"
    class="close" title="Close Modal">&times;</span>
    <div class="form_atualizarEcomenda">
        <form class="modal-content animate" action="admin_updateEncomenda.php<?php echo ($encomenda_id ? '?encomenda_id='. $encomenda_id : ''); ?>" method="post" >
            <div class="container_form">
                <label>Atualize o estado: </label>
                <select class="select_encomenda" id="estado" name="estado">
                    <option value="Pendente">Pendente</option>
                    <option value="Enviado">Enviado</option>
                    <option value="Recebido">Recebido</option>
                </select>
                <input type="submit" name="Atualizar" value="Atualizar" class="button">
                <input type="submit" name="Cancelar" value="Cancelar" class="button_gray">
            </div>
        </form>
    </div>
</div>
<?php
if (!empty($_POST['Cancelar'])){
    //Se cancelou, redireciona de imediato para a página de admin_livros
    header("Location: admin_encomendas.php");
}
if(!empty($_POST['Atualizar'])){
    $novo_estado=$_POST['estado'];
    updateEstadoEncomenda($novo_estado,$encomenda_id);
    header('Location: admin_encomendas.php');
}
?>
</body>
</html>