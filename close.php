<?php 
session_start();

if(isset($_POST['Yes'])){
    session_unset();
    session_destroy();

    header("Location: sign.php");
}
elseif(isset($_POST['Not'])){
    header("Location: page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="./assets/css/close.css">
</head>
<body>

 <div class="Terminar" id="mensagem">
    <div class="conteudo">
        <div class="">
            <form action="" id="mensagem" method="post">
                <h3>Tens a certeza de que pretendes terminar a session</h3><br><br><br><br>
                <div class="buttons">
                    <button class="botão-save" name="Yes">Sim</button>
                    <button class="botão-fechar" name="Not">Não</button>
                </div>
            </form>
        </div>
    </div>
 </div>
</body>
</html>