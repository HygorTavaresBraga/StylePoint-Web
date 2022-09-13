<!DOCTYPE html>
<html lang="pt-BR">
    
    <?php
        include 'conexao.php';
        include 'head-admin.html';
        include '../restrict-adm.php';
    ?>

    <body>
        <header>            

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
                        
                        <?php
                            if(strlen($_SESSION['fotoFuncionario']) < 1){
                                echo'<svg style="color: #fff;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>';
                            }else{                                        
                                echo'<img style="border-radius: 50%;" class="ml-2" width="25" height="25" src="../assets/funcionarios/'.$_SESSION['fotoFuncionario'].'"></img>';
                            }
                        
                            echo '<span style="font-family:\'Catamaran\'; color:#fff; cursor:default;" class="ml-2">'.$_SESSION['nomeFuncionario'].'</span>'; 

                            echo'<button class="ml-2" style="background:none; border:0px;">
                                            <a href="logout.php" style="color: #ebebeb; text-decoration: none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                </svg>
                                            </a>
                                        </button>';
                        ?>
                         
                    </div>

                </div>
            </section>

            <section class="container-fluid sub-menu align-items-center">
                <div class="row">

                    <div class="col-sm-12 text-center">
                        <a href="index.php">
                            início
                        </a>
                    </div>

                </div>
            </section>

            <section class="container-fluid" style="margin-top:50px;">
                <div class="row">
                    <div class="col-md-12 text-center">

                        <div class="btn-group">
                            <button style="color: #000; font-family: 'Catamaran'; font-size:16px;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                Produtos
                            </button>
                            <div class="dropdown-menu text-center">
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="create-produto.php">Cadastrar</a><br>
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="read-produtos.php">Consultar</a><br>
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="update-produtos.php">Editar</a><br>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button style="color: #000; font-family: 'Catamaran'; font-size:16px;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                Clientes
                            </button>
                            <div class="dropdown-menu text-center">
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="create-cliente.php">Cadastrar</a><br>
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="read-clientes.php">Consultar</a><br>
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="update-clientes.php">Editar</a><br>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button style="color: #000; font-family: 'Catamaran'; font-size:16px;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                Funcionários
                            </button>
                            <div class="dropdown-menu text-center">
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="create-funcionario.php">Cadastrar</a><br>
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="read-funcionarios.php">Consultar</a><br>
                                <a style="text-decoration: none; color: #000; font-family: 'Catamaran'; font-size:16px;" href="update-funcionarios.php">Editar</a><br>
                            </div>
                        </div>

                    

                    </div>
                </div>
            </section>  

        </header>
    </body>
    
</html>