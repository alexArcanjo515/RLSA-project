<?php
session_start();

// Database connection
$host = 'localhost';
$db   = 'comercial';
$user = 'tacweb'; // Your database username
$pass = 'nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237';     // Your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing data (assuming you have an ID to identify the record)
$id = 1; // Change this to the correct ID you want to edit
$sql = "SELECT * FROM perfil WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome_empresa = $row['nome_empresa'];
    $email = $row['email'];
    $telefone = $row['telefone'];
    $endereco = $row['endereco'];
    $sobre = $row['sobre'];
    $Datacriacao = $row['Datacriacao'];
    $missao = $row['missao'];
    $estrategia = $row['estrategia'];
    $anosexperiencia = $row['anosexperiencia'];
    $totaldeclientes = $row['totaldeclientes'];
    $totaldeprojectos = $row['totaldeprojectos'];
    $logotipo = $row['logotipo']; // If you want to display the current logo
} else {
    echo "No record found.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection (same as before)
    // ...

    // Get form data
    $id = $_POST['id'];
    $nome_empresa = $_POST['nome_empresa'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sobre = $_POST['sobre'];
    $Datacriacao = $_POST['Datacriacao'];
    $missao = $_POST['missao'];
    $estrategia = $_POST['estrategia'];
    $anosexperiencia = $_POST['anosexperiencia'];
    $totaldeclientes = $_POST['totaldeclientes'];
    $totaldeprojectos = $_POST['totaldeprojectos'];
    $logotipo_path = ""; // Default value for logotipo

    // Handle file upload if a new file is uploaded
    if (isset($_FILES['logotipo']) && $_FILES['logotipo']['error'] === UPLOAD_ERR_OK) {
        $logotipo_tmp = $_FILES['logotipo']['tmp_name'];
        $logotipo_name = basename($_FILES['logotipo']['name']);
        $logotipo_path = 'uploads/' . $logotipo_name;

        // Move uploaded file
        move_uploaded_file($logotipo_tmp, $logotipo_path);
    } else {
        // If no new file, keep the old logotipo
        $stmt = $conn->prepare("SELECT logotipo FROM perfil WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $logotipo_path = $row['logotipo'];
    }

    // Update the record
    $stmt = $conn->prepare("UPDATE perfil SET nome_empresa = ?, email = ?, telefone = ?, endereco = ?, sobre = ?, Datacriacao = ?, missao = ?, estrategia = ?, anosexperiencia = ?, totaldeclientes = ?, totaldeprojectos = ?, logotipo = ? WHERE id = ?");
    $stmt->bind_param("ssssssssssssi", $nome_empresa, $email, $telefone, $endereco, $sobre, $Datacriacao, $missao, $estrategia, $anosexperiencia, $totaldeclientes, $totaldeprojectos, $logotipo_path, $id);
    $stmt->execute();

    echo "Record updated successfully.";
    header('Location: perfil.php');

    // Close connections
    $stmt->close();
    $conn->close();
}



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

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">CRIE AGORA SEU SITE</h4>
                            <p class="text-muted m-b-15 f-s-12">Adapte agora os dados da sua empresa no seu site,
                                preenchendo os campos conforme o requerido</p>
                            <div class="basic-form">

                                <div class="form-group">
                                    <input type="text" name="nome_empresa" class="form-control input-default"
                                        placeholder="Nome da Empresa"
                                        value="<?php echo htmlspecialchars($nome_empresa); ?>" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="<?php echo htmlspecialchars($email); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="tel" name="telefone" class="form-control" placeholder="Telefone"
                                            value="<?php echo htmlspecialchars($telefone); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="endereco" class="form-control"
                                        placeholder="País/Prov/cidade"
                                        value="<?php echo htmlspecialchars($endereco); ?>">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Anos de experiência</h4>
                            <div class="basic-form">

                                <div class="form-group">
                                    <input type="number" name="anosexperiencia"
                                        value="<?php echo htmlspecialchars($anosexperiencia); ?>" class="form-control"
                                        required>
                                </div>
                                <h4 class="card-title">Total de Clientes </h4>

                                <div class="form-group">
                                    <input type="number" name="totaldeclientes" class="form-control"
                                        value="<?php echo htmlspecialchars($totaldeclientes); ?>" required>
                                </div>

                                <h4 class="card-title">Total de Projectos Feitos </h4>

                                <div class="form-group">
                                    <input type="number" name="totaldeprojectos" class="form-control"
                                        value="<?php echo htmlspecialchars($totaldeprojectos); ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Logotipo</h4>
                            <div class="basic-form">

                                <div class="form-group">
                                    <input type="file" name="logotipo" class="form-control-file" required>
                                    <?php if (!empty($logotipo)) : ?>
                                    <p>Logotipo atual: <img src="<?php echo htmlspecialchars($logotipo); ?>"
                                            alt="Logotipo" style="max-width: 100px;"></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="basic-form">

                                <input type="hidden" name="id" value="<?php echo $id; ?>">
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