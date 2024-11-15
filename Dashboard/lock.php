<?php
session_start();
// Verificar se o formulário de desbloqueio foi enviado
if (isset($_POST['unlock'])) {
    $senha = $_POST['password'];

    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "tacweb";
    $password = "nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237";
    $dbname = "comercial";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lock Screen</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    <div class="lock-screen-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card lock-screen-form mb-0">
                            <div class="card-body pt-5">
                                <h4 class="text-center">Desbloquear</h4>
                                <form class="mt-5 mb-5 login-input" method="POST" action="">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Senha"
                                            required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100"
                                        name="unlock">Desbloquear</button>
                                </form>
                                <p class="mt-5 lock-screen-form__footer">
                                    Não é você? <a href="exit.php" class="text-primary">Terminar</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>