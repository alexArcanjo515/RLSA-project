<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "tacweb";
$password = "nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237";
$dbname = "comercial";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processar o login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o email e senha estão corretos
    $sql = "SELECT id, nome_usuario, email, senha, foto_perfil FROM adm WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        // Verificar a senha usando password_verify
        if (password_verify($senha, $admin['senha'])) {
            // Armazenar os dados do administrador na sessão
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['email'] = $admin['email'];
            $_SESSION['nome_usuario'] = $admin['nome_usuario'];
            $_SESSION['foto_perfil'] = $admin['foto_perfil'];

            // Redirecionar para o dashboard
            header('Location: index.php');
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Email não encontrado!";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <h4 class="text-center">Login</h4>
                                <form class="mt-5 mb-5 login-input" method="POST" action="">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="senha" class="form-control" placeholder="Senha"
                                            required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100"
                                        name="login">Entrar</button>
                                </form>
                                <p class="mt-5 login-form__footer">Não tem conta? <a href="register.php"
                                        class="text-primary">Crie uma agora</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>