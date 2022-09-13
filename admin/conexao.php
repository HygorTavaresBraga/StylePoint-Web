<?php
    $servername = "localhost";
    $username = "root";
    $passowrd = "";
    $database = "stylepoint";
    $conexao = mysqli_connect($servername , $username , $passowrd, $database);

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
 ?>

