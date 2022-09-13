<?php
    include 'header.php';
?>

<body>
  <main>
    <!-- CARROSSEL  -->
    <div id="carouselExampleCaptions" class="carousel slide" data-interval="10000" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      </ol>

      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="assets/home/carousel/carousel.jpg" class="d-block w-100" alt="1ª Imagem do Carrossel">
        </div>

        <div class="carousel-item">
          <img src="assets/home/carousel/carousel-2.jpg" class="d-block w-100" alt="2ª Imagem do Carrossel">
        </div>

      </div>

      <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </button>

      <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </button>
    </div>

    <!-- GRANDES MARCAS -->
    <section id="grandes-marcas" class="container-fluid">

      <div id="title-area-logo" class="row align-items-center">
        <div class="col-sm-12 text-left">
          <h1>grandes marcas</h1>
        </div>
      </div>

      <div id="img-area-logo" class="row justify-content-between align-items-center">
        <div class="col-md-2"></div>
        <div class="col-sm-3 text-center">
          <a href="https://www.gucci.com/au/en_au/"><img src="assets/home/area-empresas/gucci.png" alt="Gucci"></a> 

          <a href="https://www.dolcegabbana.com/en/"><img src="assets/home/area-empresas/dolce-gabbana.png" alt="Dolce Gabbana"></a>
        </div>
        <div class="col-md-2"></div>
        <div class="col-sm-3 text-center">
          <a href="https://www.prada.com/br/pt.html"><img src="assets/home/area-empresas/prada.png" alt="Prada"></a>
     
          <a href="https://www.dior.com/pt_br"><img src="assets/home/area-empresas/dior.png" alt="Dior"></a>
        </div>
        <div class="col-md-2"></div>

      </div>
    </section>

    <!-- SESSÃO VÍDEO -->
    <section class="container-fluid" id="container-video">
      <div class="sessoes row d-flex">

        <div class="col-md-6 d-flex align-items-center">
          <video class="mx-auto" width="600" height="385" id="area-video" autoplay loop muted>
            <source src="assets/home/sp.mp4" type="video/mp4">
          </video>
        </div>

        <div id="area-sessoes" class="col-md-6 d-flex align-items-center justify-content-between" style="border-radius: 15px;">
         
            <div class="col-sm-4">
                <img id="banner-2" height="100%" width="100%" src="assets/home/area-banner/casual.jpg" alt="Banner 2">
            </div>

            <div class="col-sm-4">
                <img id="banner-3" height="100%" width="100%"  src="assets/home/area-banner/eventual.jpg" alt="Banner 3">
            </div>
            
            <div class="col-sm-4">
                <img id="banner-4" height="100%" width="100%"  src="assets/home/area-banner/estacao.jpg" alt="Banner 4">
            </div>

        </div>

      </div>
      
    </section>


</body>

<?php
    include 'footer.php';
?>