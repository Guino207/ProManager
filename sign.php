<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" id="container">
        <div class="insira">
            <form action="" method="post">
                <h1>Cadastro</h1>
                <input type="text" placeholder="Digite o seu nome" name="name">
                <input type="email" placeholder="Digite o seu email" name="email">
                <input type="password" placeholder="Digite a sua password" name="senha">
                <input type="password" placeholder="Confirme a sua password" name="password">


                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
        </div>

        <div class="insira">
            <form action="" method="post">
                <h1>Login</h1>
                <input type="email" placeholder="Digite o seu email" name="email">
                <input type="password" placeholder="Digite a sua password" name="password">


                <button type="submit" name="login">Acessar</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-painel toggle-left">
                    <h1>Bem-Vindo de volta</h1>
                    <button type="submit" class="hidden" id="login" name="change">Login</button>
                </div>
                
                <div class="toggle-painel toggle-right">
                    <h1>Ola,ADM</h1>
                    <button type="submit" class="hidden" id="cadastro" name="changed">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>