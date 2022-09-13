<?php
    include 'header.php';
?>

<body>

    <div class="container-fluid">
        <div class="row navegacao-lojas">
            <div class="col-md-12">
                <a href="lojas.php" id="tijuca">Tijuca</a>
                <a id="botafogo" disabled style="cursor:not-allowed">Botafogo</a>
                <a href="caxias.php" id="caxias">Duque de Caxias</a>
            </div>
        </div>
    </div>

    <!-- BOTAFOGO -->

    <section id="endereco-botafogo">

    <div class="container-fluid">
        <div class="row local">
            <div class="col-md-12">
                <img id="img-loja" src="assets/lojas/img-lojas/riosul.jpg" alt="Loja Botafogo">
            </div>
        </div>
    </div>

    <div class="endereco-loja">
        <h2>Rua Lauro Müller, 116 - Botafogo, Rio de Janeiro - RJ, 22290-160 | 1º Andar</h2>
    </div>     

    <div class="mapa">
        <div style='overflow:hidden;height:280px;width:100%;color: #0095eb'>
            <div id='gmap_canvas' style='height:280px;width:100%;'></div>
            <style>#gmap_canvas img{max-width:none!important;background:none!important}.gm-ui-hover-effect{
            display: none!important;}</style>
        </div>

        <!-- Alterar apenas Aqui -->
        <script type='text/javascript'>
            function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(-22.9216159,-43.2352604),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-22.9216159,-43.2352604)});infowindow = new google.maps.InfoWindow({content:'<strong> STYLEPOINT </strong><br> SHOPPING TIJUCA <br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
        </script>
        <!-- Alterar apenas Aqui -->
    </div>
    </section>

    <?php
        include 'footer.php';
    ?>

</body>