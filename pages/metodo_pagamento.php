<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pagamento</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/carrinho.css">
</head>
<body>
<?php
    session_start();
    include_once "../includes/header.php";
    $total=$_POST['total'];

?>
<h1 id="h1_pagamento">Selecione o tipo de pagamento</h1>   

    <div class="metodos_pagamento">
        <form method="post" action="../actions/checkout_action.php" onSubmit="alert('Compra efetuada com sucesso!');">
            <input type="hidden" name="total" value="<?php echo $total; ?>" />
            <br>
            <button class="button_pagamento" type="submit">
                <div class="button_container">
                    <span class="button_text">Multibanco</span>
                    <img id="multibanco" src="../images/multibanco.png">
                </div>
            </button>
            <br>
            <button class="button_pagamento" type="submit">
                <div class="button_container">
                    <span class="button_text">Cartão de Crédito</span>
                    <div class="button_img">
                    <img id="credito" src="../images/credito.png">
                    </div>
                </div>
            </button>
            <br>
            <button class="button_pagamento" type="submit">
                <div class="button_container">
                    <span class="button_text">MB Way</span>
                    <div class="button_img">
                    <img id="mbway" src="../images/mbway.png">
                    </div>
                </div>
            </button>
        </form>
    </div>
</body>
</html>