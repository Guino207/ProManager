<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro/Login</title>
    <link rel="stylesheet" href="./assets/css/sign.css">
</head>
<body>
    <div class="container" id="container">
         <div class="insira-container user-face">
            <form action="" method="post">
                <h1>Cadastro</h1>
                <?php if(isset($mensagem)): ?>
                    <p style="color: red; text-align: center;"><?php echo $mensagem; ?></p>
                <?php endif; ?>
                <?php if(isset($error) && isset($_POST['cadastrar'])): ?>
                    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
                <?php endif; ?>
                <input type="text" placeholder="Digite o nome..." name="name" required>
                <input type="email" placeholder="Digite o e-mail" name="email" required>
                <input type="password" placeholder="Digite a senha" name="senha" required>
                <input type="password" name="password" placeholder="Confirme a senha" required>
                

                
                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
        </div>

        
        <div class="insira-container login-face">
            <form action="" method="post">
                <h1>Login</h1>
                <?php if(isset($error) && isset($_POST['login'])): ?>
                    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
                <?php endif; ?>
                <input type="email" placeholder="Digite o e-mail" name="email" required>
                <input type="password" placeholder="Digite a senha" name="password" required>
                

                
                <button type="submit" name="login">Enviar</button>
                <a href="#">Esqueceu a senha?</a>
            </form>
        </div>
        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-painel toggle-left">
                    <h1>Bem-Vindo de volta!</h1>
                    <button class="hidden" id="login">login</button>
                </div>
                <div class="toggle-painel toggle-right">
                    <h1>Olá, ADM!</h1>
                    <button class="hidden" id="cadastro">cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>