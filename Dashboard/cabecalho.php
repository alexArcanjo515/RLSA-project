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
    echo "No record found.";
}


$stmt = $conn->prepare("SELECT id, nome, projeto, mensagem FROM mensagem WHERE lida = 0 ORDER BY data_envio DESC LIMIT 5");
$stmt->execute();
$result_mensagenss = $stmt->get_result();

// Contar mensagens não lidas
$stmt_count = $conn->prepare("SELECT COUNT(*) as total_novas FROM mensagem WHERE lida = 0");
$stmt_count->execute();
$result_mensagens = $stmt_count->get_result();
$total_mensagens_novas = $result_mensagens->fetch_assoc()['total_novas'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-Pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Control</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $logotipo;?>">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .icon-phone {
        animation: vibrate 0.3s infinite;
        /* Aplica a animação de vibração */
    }

    @keyframes vibrate {
        0% {
            transform: translate(0);
        }

        20% {
            transform: translate(-2px, 2px);
        }

        40% {
            transform: translate(2px, -2px);
        }

        60% {
            transform: translate(-2px, 2px);
        }

        80% {
            transform: translate(2px, -2px);
        }

        100% {
            transform: translate(0);
        }
    }
    </style>

</head>

<body>

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


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="<?php echo $logotipo;?>" alt=""> </b>
                    <span class="logo-compact"><img src="<?php echo $logotipo;?>" alt=""></span>
                    <span class="brand-title">
                        <img src="<?php echo $logotipo;?>" alt="" width="80"
                            style="margin-top: -20px; align-items: center;justify-content: center; margin-left:40px">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Procurar..."
                            aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2"><?php echo $total_mensagens_novas; ?></span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><?php echo $total_mensagens_novas; ?> Novas Mensagens</span>

                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php if ($result_mensagenss->num_rows > 0): ?>
                                        <?php while ($rowss = $result_mensagenss->fetch_assoc()): ?>
                                        <li>
                                            <a href="email-read.php?id=<?php echo $rowss['id']; ?>">
                                                <!-- Link para detalhes -->
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">
                                                        <?php echo htmlspecialchars($rowss['nome']); ?></h6>
                                                    <span class="notification-text">
                                                        <?php echo htmlspecialchars($rowss['projeto']); ?>
                                                    </span>

                                                </div>
                                            </a>
                                        </li>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                        <li>
                                            <a href="javascript:void()">
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Não há novas mensagens</h6>
                                                    <span class="notification-text"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </li>

                 
                    </ul>
                </div>
            </div>
        </div>