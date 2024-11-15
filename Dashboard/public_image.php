<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost"; // seu servidor
$username = "tacweb"; // seu usuário do banco de dados
$password = "nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237"; // sua senha do banco de dados
$dbname = "comercial"; // nome do banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['public_projecto'])) {
    // Valida os dados do formulário
    $titulo = htmlspecialchars($_POST['titulo']);
    $subtitulo = htmlspecialchars($_POST['subtitulo']);
    
    // Tratamento do arquivo
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos
    $target_file = $target_dir . basename($_FILES["email"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica se o arquivo é uma imagem
    $check = getimagesize($_FILES["email"]["tmp_name"]);
    if ($check === false) {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Verifica se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    // Verifica o tamanho do arquivo
  
    // Permite certos formatos de arquivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifica se $uploadOk foi configurado para 0 por um erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    } else {
        // Tenta fazer o upload do arquivo
        if (move_uploaded_file($_FILES["email"]["tmp_name"], $target_file)) {
            // Prepara e executa a inserção no banco de dados
            $stmt = $conn->prepare("INSERT INTO imgprojecto (titulo, subtitulo, imagem) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $titulo, $subtitulo, $target_file);

            if ($stmt->execute()) {
                echo "O projeto foi publicado com sucesso.";
            } else {
                echo "Erro: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    }
}

if (isset($_POST['salvar_sobre'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgsobre1' => $_FILES["imgsobre1"], 'imgsobre2' => $_FILES["imgsobre2"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO imgsobre (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}

if (isset($_POST['salvar_redes'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgredes3' => $_FILES["imgredes3"], 'imgredes4' => $_FILES["imgredes4"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO imgredes (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}

if (isset($_POST['salvar_datacenter'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgdatacenter5' => $_FILES["imgdatacenter5"], 'imgdatacenter6' => $_FILES["imgdatacenter6"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO imgdatacenter (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}

if (isset($_POST['salvar_aplicacao'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgdatacenter7' => $_FILES["imgdatacenter7"], 'imgdatacenter8' => $_FILES["imgdatacenter8"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO imgaplicacao (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}


if (isset($_POST['salvar_soc'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgdatacenter9' => $_FILES["imgdatacenter9"], 'imgdatacenter10' => $_FILES["imgdatacenter10"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO imgsocnoc (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}

if (isset($_POST['salvar_xaas'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgdatacenter11' => $_FILES["imgdatacenter11"], 'imgdatacenter12' => $_FILES["imgdatacenter12"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO imgxaas (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}

if (isset($_POST['salvar_sustentabilidade'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgdatacenter13' => $_FILES["imgdatacenter13"], 'imgdatacenter14' => $_FILES["imgdatacenter14"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO imgsustentabilidade (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}

if (isset($_POST['salvar_back'])) {
    $target_dir = "uploads/"; // Diretório onde os arquivos serão salvos

    // Array para os arquivos
    $fileInputs = ['imgback1' => $_FILES["imgback1"], 'imgback2' => $_FILES["imgback2"]];
    
    foreach ($fileInputs as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Erro ao enviar o arquivo $key.";
            continue;
        }

        // Gerar um nome único para cada arquivo
        $uniqueFileName = uniqid() . "_" . basename($file["name"]);
        $target_file = $target_dir . $uniqueFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "O arquivo $key não é uma imagem.";
            $uploadOk = 0;
        }

        // Permite certos formatos de arquivo
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos para $key.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk foi configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo $key não foi enviado.";
        } else {
            // Tenta fazer o upload do arquivo
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Prepara e executa a inserção no banco de dados
                $stmt = $conn->prepare("INSERT INTO background (imagem) VALUES (?)");
                $stmt->bind_param("s", $target_file);

                if (!$stmt->execute()) {
                    echo "Erro ao salvar no banco de dados: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo $key.";
            }
        }
    }

    echo "As imagens foram enviadas com sucesso.";
}








$conn->close();


include "cabecalho.php";
?>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<!--**********************************
            Sidebar start
        ***********************************-->
<?php
include "menu.php";
?>
<!--**********************************
            Sidebar end
        ***********************************-->

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Formulários
                <li class="breadcrumb-item active"> Criar Site</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">IMAGENS PARA O SLIDE DO BACKGROUND DO SITE</h4>
                <div class="basic-form">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <div style="display: flex;">
                                <input type="file" name="imgback1" class="form-control-file" required id="fileback">
                                <img id="previewback" src="" alt="Pré-visualização"
                                    style="display:none; max-width: 40%; height: auto;" />

                                <input type="file" name="imgback2" class="form-control-file" required id="filebacks">
                                <img id="previewbacks" src="" alt="Pré-visualização"
                                    style="display:none; max-width: 40%; height: auto;" />
                            </div>
                        </div>
                        <input type="submit" value="Publicar" name="salvar_back" class="btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">IMAGEM DE PROJECTOS</h4>
                            <p class="text-muted m-b-15 f-s-12">Faça aqui a publicação dos seus projectos, serviços,
                                apresentção, etc...</p>
                            <div class="basic-form">


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="file" name="email" class="form-control" required
                                            id="fileInput"><br>
                                        <input type="text" name="titulo" class="form-control" required
                                            placeholder="Título do Projecto"><br>
                                        <input type="text" name="subtitulo" class="form-control" required
                                            placeholder="Subtítulo do Projecto"><br>

                                    </div><br>
                                    <div class="form-group col-md-6">
                                        <img id="preview" src="" alt="Pré-visualização"
                                            style="display:none; max-width: 40%; height: auto;" />

                                    </div>

                                </div>
                                <input type="submit" value="Publicar" class="btn btn-dark" name="public_projecto">

    </form>
    <script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });
    </script>
</div>
</div>
</div>
</div>








<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">IMAGEM PARA CONTEÚDO SOBRE NO SITE</h4>
            <div class="basic-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="display: flex;">
                            <input type="file" name="imgsobre1" class="form-control-file" required id="fileInputss">
                            <img id="previews" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />

                            <input type="file" name="imgsobre2" class="form-control-file" required id="fileInputsss">
                            <img id="previewss" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />
                        </div>
                    </div>
                    <input type="submit" value="Publicar" name="salvar_sobre" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>




<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">IMAGEM PARA CONTEÚDO REDES & COMPUTAÇÃO</h4>
            <div class="basic-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="display: flex;">
                            <input type="file" name="imgredes3" class="form-control-file" required id="fileInputssss">
                            <img id="previewsss" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />

                            <input type="file" name="imgredes4" class="form-control-file" required id="fileInputsssss">
                            <img id="previewssss" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />
                        </div>
                    </div>
                    <input type="submit" value="Publicar" name="salvar_redes" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>



<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">IMAGEM PARA CONTEÚDO DATACENTER</h4>
            <div class="basic-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="display: flex;">
                            <input type="file" name="imgdatacenter5" class="form-control-file" required
                                id="fileInputssssssss">
                            <img id="previewssssss" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />

                            <input type="file" name="imgdatacenter6" class="form-control-file" required
                                id="fileInputssssssssssssss">
                            <img id="previewssssttttt" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />
                        </div>
                    </div>
                    <input type="submit" value="Publicar" name="salvar_datacenter" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>




<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">IMAGEM PARA CONTEÚDO APLICAÇÕES & SISTEMAS</h4>
            <div class="basic-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="display: flex;">
                            <input type="file" name="imgdatacenter7" class="form-control-file" required id="filests">
                            <img id="previacion" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />

                            <input type="file" name="imgdatacenter8" class="form-control-file" required id="fliesdtv">
                            <img id="previacionsall" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />
                        </div>
                    </div>
                    <input type="submit" value="Publicar" name="salvar_aplicacao" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>







<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">IMAGEM PARA CONTEÚDO SOC & NOC</h4>
            <div class="basic-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="display: flex;">
                            <input type="file" name="imgdatacenter9" class="form-control-file" required id="filesoc">
                            <img id="previewsoc" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />

                            <input type="file" name="imgdatacenter10" class="form-control-file" required id="filenoc">
                            <img id="previewnoc" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />
                        </div>
                    </div>
                    <input type="submit" value="Publicar" name="salvar_soc" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>








<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">IMAGEM PARA CONTEÚDO XaaS</h4>
            <div class="basic-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="display: flex;">
                            <input type="file" name="imgdatacenter11" class="form-control-file" required id="filexaas">
                            <img id="previewxaas" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />

                            <input type="file" name="imgdatacenter12" class="form-control-file" required id="fileiaas">
                            <img id="previewiaas" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />
                        </div>
                    </div>
                    <input type="submit" value="Publicar" name="salvar_xaas" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>









<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">IMAGEM PARA CONTEÚDO SUSTENTABILIDADE</h4>
            <div class="basic-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <div style="display: flex;">
                            <input type="file" name="imgdatacenter13" class="form-control-file" required id="filesust">
                            <img id="previewsust" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />

                            <input type="file" name="imgdatacenter14" class="form-control-file" required
                                id="filesustent">
                            <img id="previewsustent" src="" alt="Pré-visualização"
                                style="display:none; max-width: 40%; height: auto;" />
                        </div>
                    </div>
                    <input type="submit" value="Publicar" name="salvar_sustentabilidade" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>





<script>
document.getElementById('filesust').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewsust');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});

document.getElementById('filesustent').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewsustent');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});











document.getElementById('filexaas').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewxaas');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});

document.getElementById('fileiaas').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewiaas');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});









document.getElementById('filesoc').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewsoc');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});

document.getElementById('filenoc').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewnoc');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});




document.getElementById('filests').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previacion');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});

document.getElementById('fliesdtv').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previacionsall');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});






document.getElementById('fileInputssss').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewsss');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});

document.getElementById('fileInputsssss').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewssss');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});









document.getElementById('fileInputssssssss').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewssssss');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});

document.getElementById('fileInputssssssssssssss').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewssssttttt');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});


















document.getElementById('fileInputss').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previews');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});

document.getElementById('fileInputsss').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewss');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});
</script>

<div class="col-lg-12">

    <div class="card">
        <div class="card-body">

            <div class="basic-form">

                <input type="submit" class="btn btn-dark" value="Salvar">
                <input type="reset" class="btn btn-danger" value="Limpar">


            </div>
        </div>
    </div>

</div>



</div>
</div>
</form>
<!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->


<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://">TACSystem</a> 2024</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

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