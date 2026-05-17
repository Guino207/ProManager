<?php
session_start();

require_once 'conectar.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_POST['cadastrar'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['password'];

    if(empty($name) or empty($email) or empty($senha) or empty($password)){
        $mensagem = "Precisa preencher todos os campos";
    }elseif ($senha != $confirmar_senha){
        $error = "Senhas não são iguais";
    }else{
        $has = password_hash($senha ,PASSWORD_DEFAULT);

        $sql = "INSERT INTO user(name,email,password) VALUES(?,?,?)";
        $stmt = $manager->prepare($sql);
        $stmt->bind_param("sss",$name,$email,$has);

        if($stmt->execute()){
            header("Location: index.php");
            exit();
        }else{
            $mensagem = "Erro " .$manager->error;
        }
        $stmt->close();
    }
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT id,name, email, password FROM user WHERE email = ?";
    $stmt = $manager->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $usuario = $result->fetch_assoc();

        if(password_verify($senha, $usuario['password'])){
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_name'] = $usuario['name'];
            $_SESSION['usuario_email'] = $usuario['email'];

            header("Location: index.php");
            exit();
        }else{
            $error = "Senha incorreta";
        }
    }else{
        $error = "Usuário não encontrado";
    }
    $stmt->close();
}

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

        <style>
            img{
                border-radius: 80px;
                height: 140px;
                width: 160px;
                margin-bottom: 12px;
            }
        </style>
        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-painel toggle-left">
                    <img src="./assets/Logo.png" alt="logotipo">
                    <p>Crie a sua conta e gerencie os seus projetos com propriedade</p>
                    <button class="hidden" id="login">login</button>
                </div>
                <div class="toggle-painel toggle-right">
                    <img src="./assets/Logo.png" alt="logotipo" heigth="400px" width="200px">
                    <h2></h2>

                    <button class="hidden" id="cadastro">cadastrar</button>
                </div>
            </div>
        </div>
    </div>

</div>

    <script src="./assets/script/sign.js"></script>
</body>
</html>