<?php
    include 'header.php';
?>

<body>

    <div class="container-fluid">
        <div class="row navegacao-lojas">
            <div class="col-md-12">
                <a href="lojas.php" id="tijuca">Tijuca</a>
                <a href="botafogo.php" id="botafogo">Botafogo</a>
                <a id="caxias" disabled style="cursor:not-allowed">Duque de Caxias</a>
            </div>
        </div>
    </div>

    <!-- DUQUE DE CAXIAS -->

    <section style="display:block"  id="endereco-caxias">

    <div class="container-fluid">
        <div class="row local">
            <div class="col-md-12">
                <img id="img-loja" src="assets/lojas/img-lojas/caxias.jpg" alt="Loja Caxias">
            </div>
        </div>
    </div>

    <div class="endereco-loja">
        <h2>Rod. Washington Luíz, 2895 - Parque Duque, Duque de Caxias - RJ, 25085-008 | 2º Andar</h2>
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