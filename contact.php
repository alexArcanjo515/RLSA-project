<?php

include'config.php';
$id = 1;
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
    $logotipo = $row['logotipo']; 
    
        $paragrafos = [
        'Sobre' => $sobre,
    ];
} else {
    echo "No record found.";
}



if (isset($_POST['enviarsms'])) {
    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone_cliente = $_POST['telefone_cliente'];
    $projeto = $_POST['projeto'];
    $mensagem = $_POST['mensagem'];


    // Preparar a query SQL para inserir os dados
    $sql = "INSERT INTO mensagem (nome, email, telefone_cliente, projeto, mensagem) VALUES ('$nome', '$email', '$telefone_cliente', '$projeto', '$mensagem')";

    // Executar a query
    if ($conn->query($sql) === TRUE) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    
}


$sqlservico = "SELECT titulo, subtitulo, imagem FROM imgprojecto LIMIT 6";
$resultservico = $conn->query($sqlservico);

$sqladm = "SELECT nome_usuario, foto_perfil FROM adm LIMIT 6";
$resultadm = $conn->query($sqladm);

$sqlimgsobre = "SELECT imagem FROM imgsobre ORDER BY created_at DESC LIMIT 2";
$resultimgsobre = $conn->query($sqlimgsobre);

$imagenssobre = [];
if ($resultimgsobre->num_rows > 0) {
    while ($rowimgsobre = $resultimgsobre->fetch_assoc()) {
        $imagenssobre[] = htmlspecialchars($rowimgsobre['imagem']);
    }
} else {
    echo "Nenhuma imagem encontrada.";
}

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Construction HTML-5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

   <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/gijgo.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder-logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <?php include'cabecalho.php'; ?>
    <!-- slider Area Start-->
    <div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/sobre.jpg" style="background-size:cover;">
    <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Contacto</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Contacto</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
              
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Fale conosco!</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="mensagem" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escreva a Mensagem'" placeholder=" Escreva a mensagem"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="nome" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escreva o seu nome'" placeholder="Escreva o seu nome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="telefone_cliente" id="email" type="test" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite seu Contacto'" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escreva seu email'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="projeto" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Diga sobre oque se trata'" placeholder="Diga sobre oque se trata">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="button button-contactForm boxed-btn" name="enviarsms" value="ENVIAR"></i>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3><?php echo htmlspecialchars($nome_empresa);?></h3>
                                <p>Comercial</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3><?php echo htmlspecialchars($telefone);?></h3>
                                <p>Segunda – Sexta 8:00 a.m. – 5:00 p.m</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><?php echo htmlspecialchars($email);?></h3>
                                <p>Envia agora sua mensagem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
   <?php include'rodape.php';?>