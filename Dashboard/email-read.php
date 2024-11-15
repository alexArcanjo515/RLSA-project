<?php 
session_start();
// Conexão com o banco de dados
$host = 'localhost'; // ou o endereço do seu servidor
$db = 'comercial';
$user = 'tacweb';
$pass = 'nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237';

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);

// Verifica se o ID da mensagem foi passado na URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Marcar mensagem como lida
    $updateStmt = $conn->prepare("UPDATE mensagem SET lida = 1 WHERE id = :id");
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $updateStmt->execute();

    // Recuperar a mensagem
    $stmt = $conn->prepare("SELECT `id`, `nome`, `email`, `telefone_cliente`, `projeto`, `mensagem`, `data_envio` FROM `mensagem` WHERE `id` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $mensagem = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redireciona para a inbox se o ID não for fornecido
    header("Location: email-inbox.php");
    exit();
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
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="email-left-box">
                            <a href="#" class="btn btn-primary btn-block">Mensagens</a>
                            <div class="mail-list mt-4">
                                <a href="email-inbox.php" class="list-group-item border-0 text-primary p-r-0">
                                    <i class="fa fa-inbox font-18 align-middle mr-2"></i> <b>Inbox</b>
                                </a>
                            </div>
                        </div>

                        <div class="email-right-box">
                            <div class="read-content">
                                <div class="media pt-5">
                                    <div class="media-body">
                                        <h5 class="m-b-3"><?php echo htmlspecialchars($mensagem['nome']); ?></h5>
                                        <p class="m-b-2"><?php echo htmlspecialchars($mensagem['email']); ?></p>
                                        <p class="m-b-2">
                                            <a class="btn btn-primary"
                                                href="tel:<?php echo htmlspecialchars($mensagem['telefone_cliente']); ?>"
                                                class="position-relative animated tada infinite">
                                                <i class="icon-phone menu-icon"></i>
                                                Ligar
                                            </a>
                                        </p>
                                        <p class="m-b-2"><?php echo htmlspecialchars($mensagem['data_envio']); ?></p>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="m-0 text-primary"><?php echo htmlspecialchars($mensagem['projeto']); ?></h4>
                                <p><?php echo nl2br(htmlspecialchars($mensagem['mensagem'])); ?></p>
                                <hr>
                            </div>

                            <!-- Formulário para enviar resposta -->
                            <div class="reply-section">
                                <h5>Enviar Mensagem</h5>
                                <form action="enviar_email.php" method="POST">
                                    <input type="hidden" name="email_destino"
                                        value="<?php echo htmlspecialchars($mensagem['email']); ?>">
                                    <div class="form-group">
                                        <label for="mensagem">Mensagem:</label>
                                        <textarea class="form-control" name="mensagem" id="mensagem" rows="4"
                                            required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>

                            <div class="text-right mt-3">
                                <a href="email-inbox.php" class="btn btn-secondary">Voltar</a>
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
        <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
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