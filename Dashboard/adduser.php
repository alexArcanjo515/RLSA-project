<?php
// Iniciar sessão
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

if (isset($_POST['add_admin'])) {
   // Capturar dados do formulário
$nome_usuario = $_POST['nome_usuario']; 
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar a senha

// Processar o upload da foto de perfil
if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
    $foto_perfil = $_FILES['foto_perfil'];
    
    // Definir diretório para salvar a imagem
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto_perfil["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Verificar se o arquivo é uma imagem
    $check = getimagesize($foto_perfil["tmp_name"]);
    if ($check === false) {
        echo "O arquivo não é uma imagem.";
        exit();
    }
    
    // Verificar tamanho do arquivo (opcional, ex: 2MB)
    if ($foto_perfil["size"] > 2000000) {
        echo "A imagem é muito grande.";
        exit();
    }
    
    // Tipos de imagem permitidos
    if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
        echo "Apenas JPG, JPEG e PNG são permitidos.";
        exit();
    }
    
    // Mover o arquivo para o diretório final
    if (move_uploaded_file($foto_perfil["tmp_name"], $target_file)) {
        // Verificar se o email já existe
        $sql_check = "SELECT * FROM adm WHERE email = '$email'";
        $result = $conn->query($sql_check);
        
        if ($result->num_rows == 0) {
            // Inserir os dados no banco de dados
            $sql = "INSERT INTO adm (nome_usuario, email, senha, foto_perfil) VALUES ('$nome_usuario', '$email', '$senha', '$target_file')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Novo administrador adicionado com sucesso!";
                header('Location: index.php');
                exit(); // É uma boa prática sair após redirecionar
            } else {
                echo "Erro: " . $conn->error;
            }
        } else {
            echo "Email já cadastrado!";
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
} else {
    echo "Nenhuma foto de perfil enviada.";
}

}

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
                                        <input type="text" name="nome_usuario" class="form-control"
                                            placeholder="nome_usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="senha" class="form-control" placeholder="Senha"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="foto_perfil" class="form-control" accept="image/*">
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100"
                                        name="add_admin">Adicionar Novo</button>
                                </form>

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