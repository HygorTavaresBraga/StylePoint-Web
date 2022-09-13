<!DOCTYPE html>
<html lang="pt-BR">
    
    <?php
        include 'head.html';
        include '../restrict.php';
    ?>

    <body>
        <header>
            <section id="promocao">
                <b>ROUPAS FEMININAS COM ATÉ <strong>45%</strong> DE DESCONTO</b>
                <b><strong>FRETE GRÁTIS</strong> PARA COMPRAS ACIMA DE <strong>R$350,00</strong>!</b>
            </section>

            <section class="container-fluid menu align-items-center">
                <div class="row">

                    <div class="col-sm-4 text-center">
                        <a href="#">
                            <img id="logo-left" src="assets/logo.png" alt="Logo">
                        </a>
                    </div>

                    <div class="col-sm-4 text-center">
                        <a href="#">
                            <img id="logo-center" src="assets/style-light.png" alt="Logo">
                        </a>
                    </div>

                    <div id="media-menu" class="col-sm-4 text-right">

                        <a id="sacola" href="sacola.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-handbag" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z"/>
                            </svg>
                        </a>

                        <button type="button" id="login">
                            <a href="perfil.php">                 
                                <?php                                
                                    
                                    if(session_status() == PHP_SESSION_ACTIVE){  

                                        if(strlen($_SESSION['fotoCliente']) < 1){
                                            echo'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                          </svg>';
                                        }else{                                        
                                            echo'<img style="border-radius: 50%;" class="ml-2" width="25" height="25" src="assets/clientes/'.$_SESSION['fotoCliente'].'"></img>';
                                        }
                                        echo '<span style="font-family:\'Catamaran\';" class="ml-2">'.$_SESSION['nomeCliente'].'</span>'; 

                                        echo'<button class="ml-2" style="background:none; border:0px;">
                                                <a href="logout.php" style="color: #ebebeb; text-decoration: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                    </svg>
                                                </a>
                                            </button>';
                                    }

                                ?>
                                                              
                            </a>
                        </button>

                    

                </div>
            </section>

            <section class="container-fluid sub-menu align-items-center">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <a href="index.php">
                            início
                        </a>
                        <a href="lojas.php">
                            lojas
                        </a>
                        <a href="sobre.php">
                            sobre
                        </a>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-5 text-center">
                        <a href="masculino.php">
                            masculino
                        </a>
                        <a href="feminino.php">
                            feminino
                        </a>
                    </div>

                </div>
            </section>            
        </header>
    </body>
    
</html>