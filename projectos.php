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
}?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Construction HTML-5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/gijgo.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
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
<?php include'cabecalho.php';?>
    <main>
        <!-- slider Area Start-->
        <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/sobre.jpg" style="background-size:cover;">
        <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>Nossos Projectos</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Projectos</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
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
    </main>
  <?php include'rodape.php';?>