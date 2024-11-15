<?php
include'config.php';

// Atualizar a contagem de cliques na mesma linha e registrar a data/hora
$sql = "INSERT INTO cliques (id, total_cliques, data_hora) VALUES (1, 1, NOW()) 
        ON DUPLICATE KEY UPDATE total_cliques = total_cliques + 1, data_hora = NOW()";

if (!$conn->query($sql)) {
    echo "Erro ao registrar clique: " . $conn->error;
}

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
        <title>RSLA comercial</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
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
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="hero__caption">
                                    <div class="hero-text1">
                                        <span data-animation="fadeInUp" data-delay=".3s">Nossa missão é satisfazer sua necessidade</span>
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay=".5s"><?php echo htmlspecialchars($nome_empresa);?></h1>
                                    <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                        <h2>Comercial</h2>
                                        <h2>Comercial</h2>
                                    </div>
                                    <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                       <span><a href="services.html">Nossos Serviços</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="hero__caption">
                                    <div class="hero-text1">
                                        <span data-animation="fadeInUp" data-delay=".3s">hand car wash and detailing service</span>
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay=".5s">RSLA</h1>
                                    <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                        <h2>Comercial</h2>
                                        <h2>Comercial</h2>
                                    </div>
                                    <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                        <span><a href="services.html">Nossos Serviços</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Services Area Start -->
        
        <!-- Services Area End -->
        <!-- About Area Start -->
        <section class="support-company-area fix pt-10">
            <div class="support-wrapper align-items-end">
                <div class="left-content">
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-55">
                        <div class="front-text">
                            <h2 class="">Quem somos</h2>
                        </div>
                        <span class="back-text">Quem somos</span>
                    </div>
                    <div class="support-caption">
                        <p class="pera-top">Compromisso da RSLA Comercial com o Mercado Imobiliário</p>
                        <p><?php echo nl2br(htmlspecialchars($sobre)); ?></p>
                        <a href="about.html" class="btn red-btn2">Ler Mais</a>
                    </div>
                </div>
                <div class="right-content">
                    <!-- img -->
                    <div class="right-img">
                        <?php
                    if (isset($imagenssobre[1])): ?>
                        <img src="<?php echo './Dashboard/' . $imagenssobre[1]; ?>"
                            class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                        <?php endif; ?>
                        
                    </div>
                    <div class="support-img-cap text-center">
                        <span>1994</span>
                        <p>Since</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        <!-- Project Area Start -->
        <section class="project-area  section-padding30">
            <div class="container">
               <div class="project-heading mb-35">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle3">
                                <div class="front-text">
                                    <h2 class="">Nossos Projectos</h2>
                                </div>
                                <span class="back-text">Galeria</span>
                            </div>
                        </div>
                     
                    </div>
               </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content active" id="nav-tabContent">
                            <!-- card ONE -->
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                <div class="project-caption">
                                    <div class="row">
                                              <?php


                if ($resultservico->num_rows > 0) {
                    while ($rowservico = $resultservico->fetch_assoc()) {
                                        
                                        echo '<div class="col-lg-4 col-md-6">';
                                         echo '   <div class="single-project mb-30">';
                                         echo '       <div class="project-img">';
                                           echo '         <img src="./Dashboard/' . htmlspecialchars($rowservico["imagem"]) . '" alt="">';
                                         echo '       </div>';
                                           echo '     <div class="project-cap">';
                                           echo '         <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>';
                                           echo '         <h4><a href="project_details.html">'. htmlspecialchars($rowservico["titulo"]).'</a></h4>';
                                          echo '      </div>';
                                          echo '  </div>';
                                       echo ' </div>';
                    
                                       }
                } else {
                    echo "Nenhum projeto encontrado.";
                }?>
                                       
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Project Area End -->
        <!-- contact with us Start -->
        <section class="contact-with-area" data-background="assets/img/gallery/section-bg2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
                        <div class="contact-us-caption">
                            <div class="team-info mb-30 pt-45">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle4">
                                    <div class="front-text">
                                        <h2 class="">Planificação do futuro e Execução do futuro</h2>
                                    </div>
                                    <span class="back-text">Estratégia</span>
                                </div>
                                <p><?php echo htmlspecialchars($missao);?></p>
                                <a href="#" class="white-btn">Ler Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact with us End-->
        <!-- CountDown Area Start -->
        <div class="count-area">
            <div class="container">
                <div class="count-wrapper count-bg" data-background="assets/img/gallery/section-bg3.jpg">
                    <div class="row justify-content-center" >
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter"><?php echo $anosexperiencia;?></span>
                                    </div>
                                    <div class="count-text">
                                        <p>Anos de Experiência</p>
                                        <h5>Lubango</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter"><?php echo $totaldeclientes;?></span>
                                    </div>
                                    <div class="count-text">
                                        <p>Total de Clientes</p>
                                        <h5>Angola</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter"><?php echo $totaldeprojectos;?></span>
                                    </div>
                                    <div class="count-text">
                                        <p>Projectos Realizados</p>
                                        <h5>2024</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CountDown Area End -->
        <!-- Team Start -->
        <div class="team-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle5 mb-50">
                            <div class="front-text">
                                <h2 class="">Fundador</h2>
                            </div>
                            <span class="back-text">Proprietário</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single Tem -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-30">
                            <div class="team-img">
                          <?php 
if ($resultadm->num_rows > 0) {
    // Pegue apenas a primeira linha do resultado
    $rowadm = $resultadm->fetch_assoc();
    echo '<img src="./Dashboard/' . htmlspecialchars($rowadm["foto_perfil"]) . '" alt="">';
    echo ' </div>
                            <div class="team-caption">
                                <span>'.htmlspecialchars($rowadm["nome_usuario"]) .'</span>
                                <h3>Atual Dono da RSLA</h3>';
}
?>

                           
                            </div>
                        </div>
                    </div>
                   
                  
                </div>
            </div>
        </div>
        <!-- Team End -->
        <!-- Testimonial Start -->
        <div class="testimonial-area t-bg testimonial-padding">
            <div class="container ">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle6 mb-50">
                            <div class="front-text">
                                <h2 class="">Construindo o Futuro de Angola</h2>
                            </div>
                            <span class="back-text">Comercial</span>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-xl-10 col-lg-11 col-md-10 offset-xl-1">
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                     
                            <!-- Single Testimonial -->
                            <div class="single-testimonial">
                                 <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <!-- SVG icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"width="86px" height="63px">
                                        <path fill-rule="evenodd"  stroke-width="1px" stroke="rgb(255, 95, 19)" fill-opacity="0" fill="rgb(0, 0, 0)"
                                        d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z"/>
                                        </svg>
                                        <p>"A RSLA Comercial é reconhecida por sua experiência em imóveis e engenharia. Com uma equipe de especialistas e um portfólio diversificado, a empresa oferece soluções que atendem aos mais altos padrões de qualidade e inovação. Desde a consultoria personalizada até a execução de grandes projetos, cada detalhe é pensado para garantir um espaço que não só atenda às necessidades dos clientes, mas que também respeite e valorize o ambiente ao redor."</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center">
                                       <div class="founder-text">
                                            <span>RSLA Comercial</span>
                                            <p>Imóveis e Engenharia</p>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- Testimonial End -->
        <!--latest Nnews Area start -->
        <div class="latest-news-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle7 mb-50">
                            <div class="front-text">
                                <h2 class="">Oque fazemos?</h2>
                            </div>
                            <span class="back-text">Trabalhos</span>
                        </div>
                    </div>
                </div>
                <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-6">
                        <!-- single-news -->
                        <div class="single-news mb-30">
                            <div class="news-img">
                                <img src="assets/img/david/david_3.jpg" alt="">
                                <div class="news-date text-center">
                                    <span>2024/2025</span>
                                    <p>Agora o tempo é seu</p>
                                </div>
                            </div>
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp;  925-880-402</li>
                                </ul>
                                <h2><a href="single-blog.html">Construção civil</a></h2>
                                <h2><a href="single-blog.html">Sistemas Informáticos</a></h2>
                                <h2><a href="single-blog.html">Habilitação documentar</a></h2>
                                <h2><a href="single-blog.html">Advogacia</a></h2>
                                <h2><a href="single-blog.html">Infantários!</a></h2>




                                <a href="single-blog.html" class="d-btn">Ler mais » </a>
                            </div>
                        </div>
                    </div>
                 
                   
               </div>
            </div>
        </div>
        <!--latest News Area End -->

    </main>
  <?php include'rodape.php';?>