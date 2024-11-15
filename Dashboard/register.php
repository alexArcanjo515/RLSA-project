<?php 

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

if(isset($_POST['salvar'])){
    $email = $_POST['email'];
    $nome_usuario = $_POST['nome'];

    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash para segurança
    
    // Processar o upload da foto
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
        $foto = $_FILES['foto_perfil'];
        
        // Definir caminho de upload
        $diretorio = "uploads/";
        $caminho_foto = $diretorio . basename($foto["name"]);
    
        // Verificar e mover a foto para o diretório correto
        if (move_uploaded_file($foto["tmp_name"], $caminho_foto)) {
            echo "Foto de perfil enviada com sucesso.";
        } else {
            echo "Falha ao enviar a foto de perfil.";
            $caminho_foto = null;
        }
    } else {
        $caminho_foto = null; // Caso nenhuma foto seja enviada
    }
    
    // Inserir os dados no banco de dados
    $sql = "INSERT INTO adm (nome_usuario, email, senha, foto_perfil) VALUES ('$nome_usuario', '$email', '$senha', '$caminho_foto')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro realizado com sucesso.";
        header('Location: login.php');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
 
}
// Receber os dados do formulário
$conn->close();
?>


<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>Criar Conta</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="POST" action="<?php $_SERVER['PHP_SELF'];?>"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Senha"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="foto_perfil" class="form-control" accept="image/*"
                                            required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100"
                                        name="salvar">Entrar</button>
                                </form>

                                <p class="mt-5 login-form__footer">Já tem Uma conta? <a href="login.php"
                                        class="text-primary">Login</a> Agora</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>