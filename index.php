<?php
$host = 'localhost';
$db   = 'comercial';
$user = 'tacweb';
$pass = 'nac456*Lx2hhhgdsdswfhhhIUYTYHJGBvRFC639347tk987365378237';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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




?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>RLSA comercial</title>
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
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>     
                                        <li>+(123) 1234-567-8901</li>
                                        <li>info@domain.com</li>
                                        <li>Mon - Sat 8:00 - 17:30, Sunday - CLOSED</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">    
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                       <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <!-- logo-1 -->
                                    <a href="index.php" class="big-logo"><img src="assets/img/logo/logo.png" alt=""></a>
                                    <!-- logo-2 -->
                                    <a href="index.php" class="small-logo"><img src="assets/img/logo/loder-logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                                                   
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="project.html">Projects</a></li>
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="project_details.html">Projects Details</a></li>
                                                    <li><a href="services_details.html">Services Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>             
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="#" class="btn">Contact Now</a>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
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
                                        <span data-animation="fadeInUp" data-delay=".3s">hand car wash and detailing service</span>
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
                                    <h1 data-animation="fadeInUp" data-delay=".5s">advanced</h1>
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
        <div class="services-area1 section-padding30">
            <div class="container">
                <!-- section tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-55">
                            <div class="front-text">
                                <h2 class="">Nossos Serviços</h2>
                            </div>
                            <span class="back-text">Serviços</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php


              #  if ($resultservico->num_rows > 0) {
              #      while ($rowservico = $resultservico->fetch_assoc()) {
              #     echo ' <div class="col-xl-4 col-lg-4 col-md-6">';
               #       echo '  <div class="single-service-cap mb-30">';
                #          echo '  <div class="service-img">';
                 #       echo '        <img src="./Dashboard/' . htmlspecialchars($rowservico["imagem"]) . '" alt="">';
                  #     echo '     </div>';
                   #   echo '      <div class="service-cap">';
                    #  echo '          <h4><a href="services_details.html">' . htmlspecialchars($rowservico["titulo"]). '</h4>';
                     # echo '          <a href="services_details.html" class="more-btn">Ler Mais <i class="ti-plus"></i></a>';
                      #echo '      </div>';
                    #  echo '      <div class="service-icon">';
                     # echo '          <img src="assets/img/icon/services_icon1.png" alt="">';
                      #echo '      </div>';
                   #   echo '  </div>';
                   #echo ' </div>';
                 #}
               # } else {
                #    echo "Nenhum projeto encontrado.";
                #}?>
                </div>
            </div>
        </div>
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
                        <p class="pera-top">Compromisso da RLSA Comercial com o Mercado Imobiliário</p>
                        <p><?php echo nl2br(htmlspecialchars($sobre)); ?></p>
                        <a href="about.html" class="btn red-btn2">Ler Mais</a>
                    </div>
                </div>
                <div class="right-content">
                    <!-- img -->
                    <div class="right-img">
                        <img src="assets/img/gallery/safe_in.png" alt="">
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
                                <h3>Atual Dono da RLSA</h3>';
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
                                        <p>"A RLSA Comercial é reconhecida por sua experiência em imóveis e engenharia. Com uma equipe de especialistas e um portfólio diversificado, a empresa oferece soluções que atendem aos mais altos padrões de qualidade e inovação. Desde a consultoria personalizada até a execução de grandes projetos, cada detalhe é pensado para garantir um espaço que não só atenda às necessidades dos clientes, mas que também respeite e valorize o ambiente ao redor."</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center">
                                       <div class="founder-text">
                                            <span>RLSA Comercial</span>
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
                                <h2 class="">latest news</h2>
                            </div>
                            <span class="back-text">Our Blog</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <!-- single-news -->
                        <div class="single-news mb-30">
                            <div class="news-img">
                                <img src="assets/img/david/david_1.png" alt="">
                                <div class="news-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp;  Porperties</li>
                                </ul>
                                <h2><a href="single-blog.html">Footprints in Time is perfect
                                    House in Kurashiki</a></h2>
                                <a href="single-blog.html" class="d-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <!-- single-news -->
                        <div class="single-news mb-30">
                            <div class="news-img">
                                <img src="assets/img/david/david_2.png" alt="">
                                <div class="news-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="news-caption">
                                <ul class="david-info">
                                    <li> | &nbsp; &nbsp;  Porperties</li>
                                </ul>
                                <h2><a href="single-blog.html">Footprints in Time is perfect
                                    House in Kurashiki</a></h2>
                                <a href="single-blog.html" class="d-btn">Read more » </a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!--latest News Area End -->

    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-main">
                <div class="footer-area footer-padding">
                    <div class="container">
                        <div class="row  justify-content-between">
                            <div class="col-lg-4 col-md-4 col-sm-8">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p class="info1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-5">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Quick Links</h4>
                                        <ul>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Projects</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-7">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Contact</h4>
                                        <div class="footer-pera">
                                            <p class="info1">198 West 21th Street, Suite 721 New York,NY 10010</p>
                                        </div>
                                        <ul>
                                            <li><a href="#">Phone: +95 (0) 123 456 789</a></li>
                                            <li><a href="#">Cell: +95 (0) 123 456 789</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-8">
                                <div class="single-footer-caption mb-50">
                                    <!-- Form -->
                                    <div class="footer-form">
                                        <div id="mc_embed_signup">
                                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                                <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                                <div class="form-icon">
                                                    <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                        SIGN UP
                                                    </button>
                                                </div>
                                                <div class="mt-10 info"></div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Map -->
                                    <div class="map-footer">
                                        <img src="assets/img/gallery/map-footer.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Copy-Right -->
                        <div class="row align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Footer End-->
    </footer>
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
               
        <!-- counter , waypoint -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>