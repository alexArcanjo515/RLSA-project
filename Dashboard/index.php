<?php 
// Defina as credenciais
$valid_username = 'tacweb';
$valid_password = '123456qwe!#';

// Verifique se as credenciais foram fornecidas
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    // Se não, solicite o login
    header('WWW-Authenticate: Basic realm="Área Restrita"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Autenticação necessária.';
    exit;
} else {
    // Verifique as credenciais
    if ($_SERVER['PHP_AUTH_USER'] !== $valid_username || $_SERVER['PHP_AUTH_PW'] !== $valid_password) {
        header('HTTP/1.0 401 Unauthorized');
        echo 'Credenciais inválidas.';
        exit;
    }
}

session_start();

$host = 'localhost';
$db = 'comercial';
$user = 'tacweb'; // Your database username
$pass = 'nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237';     // Your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM perfil WHERE id = 1"; // Assume you want to fetch the first record
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome_empresa = htmlspecialchars($row['nome_empresa']);
    $localizacao = htmlspecialchars($row['endereco']);
    $telefone = htmlspecialchars($row['telefone']);
    $email = htmlspecialchars($row['email']);
    $logotipo = htmlspecialchars($row['logotipo']); // Path to the logo
    $clientes = 263; // Replace with a dynamic value if necessary
    $seguidores = 263; // Replace with a dynamic value if necessary
    $sobre_nos = htmlspecialchars($row['sobre']);
} else {
    die("Nenhum registro encontrado.");
}

// Buscar total de mensagens
$sql_count = "SELECT COUNT(*) AS total FROM mensagem"; 
$result_count = $conn->query($sql_count);
$total_mensagens = ($result_count->num_rows > 0) ? $result_count->fetch_assoc()['total'] : 0;

// Buscar mensagens
$sql_messages = "SELECT `id`, `nome`, `email`, `projeto`, `mensagem`, `data_envio` FROM mensagem ORDER BY data_envio DESC LIMIT 5"; 
$result_messages = $conn->query($sql_messages);

$mensagens = [];
if ($result_messages->num_rows > 0) {
    while ($message_row = $result_messages->fetch_assoc()) {
        $mensagens[] = $message_row; // Armazenar mensagens em um array
    }
} else {
    $mensagens = []; // Nenhuma mensagem encontrada
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

    <div class="container-fluid mt-3">
        <div class="row">



            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Mensagens Enviadas</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php echo $total_mensagens;?></h2>
                            <p class="text-white mb-0"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-7">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total de Cliques</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php echo $total_de_cliques;?></h2>
                            <p class="text-white mb-0"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>







        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo $logotipo; ?>" alt="">
                            <h5 class="mt-3 mb-1"><?php echo $nome_empresa;?></h5>
                            <p class="m-0"></p>
                            <a href="https://localhost/tac/public/index.php" class="btn btn-sm btn-warning">Ir para o
                                Site</a>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-member">
                            <div class="table-responsive">
                                <table class="table table-xs mb-0">
                                    <thead>
                                        <tr>
                                            <th>Emissor</th>
                                            <th>Assunto</th>
                                            <th>Projecto</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
        // Limita a exibição a 5 mensagens
        $mensagens_lidas = array_slice($mensagens, 0, 5); 
        foreach ($mensagens_lidas as $mensagem): ?>
                                        <tr>
                                            <td>
                                                <a href="email-read.php?id=<?php echo $mensagem['id']; ?>"
                                                    class="list-group-item border-0 p-r-0">
                                                    <i
                                                        class="fa fa-envelope font-18 align-middle mr-2"></i><?php echo htmlspecialchars($mensagem['nome']); ?>
                                                </a>
                                            </td>
                                            <td><?php echo htmlspecialchars($mensagem['email']); ?></td>
                                            <!-- Supondo que você tenha um campo 'assunto' -->
                                            <td><?php echo htmlspecialchars($mensagem['projeto']); ?></td>
                                            <!-- Supondo que você tenha um campo 'localizacao' -->
                                            <td><?php echo htmlspecialchars($mensagem['data_envio']); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-xl-6 col-lg-12 col-sm-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Localização</h4>
                        <div style="height: 470px;">
                            <iframe class="rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30841.9056771603!2d13.509835026002595!3d-14.923816224812459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ba34b10ff7e7f45%3A0xb7389c5e127c5216!2sCristo%20Rei%2C%20Lubango!5e0!3m2!1spt-PT!2sao!4v1731684203106!5m2!1spt-PT!2sao"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-facebook">
                        <span class="s-icon"><i class="fa fa-facebook"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0</h4>
                                <p class="m-0">Amigos</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0</h4>
                                <p class="m-0">Seguidores</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-linkedin">
                        <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0</h4>
                                <p class="m-0">Amigos</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0</h4>
                                <p class="m-0">Seguidores</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-googleplus">
                        <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0</h4>
                                <p class="m-0">Amigos</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0</h4>
                                <p class="m-0">Seguidores</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-twitter">
                        <span class="s-icon"><i class="fa fa-twitter"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0 </h4>
                                <p class="m-0">Amigos</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">0</h4>
                                <p class="m-0">Seguidores</p>
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
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="http://tac.co.ao">TACSystem</a> 2024
        </p>
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

<!-- Chartjs -->
<script src="./plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="./plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="./plugins/d3v3/index.js"></script>
<script src="./plugins/topojson/topojson.min.js"></script>
<script src="./plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="./plugins/raphael/raphael.min.js"></script>
<script src="./plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="./plugins/chartist/js/chartist.min.js"></script>
<script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>