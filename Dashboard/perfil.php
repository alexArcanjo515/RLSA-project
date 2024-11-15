<?php 
session_start();

// Database connection
$host = 'localhost';
$db = 'comercial';
$user = 'tacweb'; // Your database username
$pass = 'nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237';     // Your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch profile data
$sql = "SELECT * FROM perfil WHERE id = 1"; // Assume you want to fetch the first record
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome_empresa = htmlspecialchars($row['nome_empresa']);
    $localizacao = htmlspecialchars($row['endereco']);
    $telefone = htmlspecialchars($row['telefone']);
    $email_empresa = htmlspecialchars($row['email']);
    $logotipo = htmlspecialchars($row['logotipo']); // Path to the logo
    $clientes = 263; // Replace with a dynamic value if necessary
    $seguidores = 263; // Replace with a dynamic value if necessary
    $sobre_nos = htmlspecialchars($row['sobre']);
} else {
    echo "No record found.";
}

// Fetch messages
$sql_messages = "SELECT id, nome, data_envio FROM mensagem ORDER BY data_envio DESC LIMIT 5"; 
$result_messages = $conn->query($sql_messages);

$mensagens = [];
if ($result_messages->num_rows > 0) {
    while ($message_row = $result_messages->fetch_assoc()) {
        $mensagens[] = $message_row; // Store messages in an array
    }
} else {
    $mensagens = []; // No messages found
}


// Total de cliques
$sql_total_cliques = "SELECT SUM(total_cliques) AS total_de_cliques FROM cliques"; 
$result_total_cliques = $conn->query($sql_total_cliques);
$total_de_cliques = ($result_total_cliques->num_rows > 0) ? $result_total_cliques->fetch_assoc()['total_de_cliques'] : 0;

// Buscar cliques
$sql_cliques = "SELECT `id`, `total_cliques`, `created_at`, `data_hora` FROM `cliques`"; 
$result_cliques = $conn->query($sql_cliques);

$cliques = [];
if ($result_cliques->num_rows > 0) {
    while ($click_row = $result_cliques->fetch_assoc()) {
        $cliques[] = $click_row; // Armazenar cliques em um array
    }
} else {
    $cliques = []; // Nenhum clique encontrado
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3" src="<?php echo $logotipo; ?>" width="80" height="80"
                                alt="Logotipo da Empresa">
                            <div class="media-body">
                                <h3 class="mb-0"><?php echo $nome_empresa; ?></h3>
                                <p class="text-muted mb-0"><?php echo $localizacao; ?></p>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                    <h3 class="mb-0"><?php echo $clientes; ?></h3>
                                    <p class="text-muted px-4">Clientes</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                                    <h3 class="mb-0"><?php echo $total_de_cliques;?></h3>
                                    <p class="text-muted">Visitantes</p>
                                </div>
                            </div>
                        </div>

                        <h4>Sobre Nós</h4>
                        <p class="text-muted"><?php echo $sobre_nos; ?></p>

                        <ul class="card-profile__info">
                            <li class="mb-1"><strong class="text-dark mr-4">Telefone:</strong>
                                <span><?php echo $telefone; ?></span>
                            </li>
                            <li class="mb-1"><strong class="text-dark mr-4">Email:</strong>
                                <span><?php echo $email_empresa; ?></span>
                            </li>
                            <li class="mb-1"><strong class="text-dark mr-4">Redes Sociais:</strong>
                                <ul>
                                    <li><a href="<?php echo htmlspecialchars($facebook); ?>">Facebook</a></li>
                                    <li><a href="<?php echo htmlspecialchars($twitter); ?>">Twitter</a></li>
                                    <li><a href="<?php echo htmlspecialchars($linkedin); ?>">LinkedIn</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">


                <div class="card">
                    <div class="card-body">
                        <div class="media media-reply">
                            <div class="media-body">
                                <div class="d-sm-flex justify-content-between mb-2">
                                    <h5 class="mb-sm-0">Mensagens Recentes</h5>
                                </div>

                                <?php 
                // Limita a exibição a 5 mensagens
                $mensagens_lidas = array_slice($mensagens, 0, 5); 
                foreach ($mensagens_lidas as $mensagem): ?>
                                <a href="email-read.php?id=<?php echo $mensagem['id']; ?>"
                                    class="list-group-item border-0 p-r-0">
                                    <i
                                        class="fa fa-envelope font-18 align-middle mr-2"></i><?php echo htmlspecialchars($mensagem['nome']); ?>
                                    <span
                                        class="float-right"><?php echo htmlspecialchars($mensagem['data_envio']); ?></span>
                                </a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->


<!--**********************************
            Footer start
        ***********************************-->

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