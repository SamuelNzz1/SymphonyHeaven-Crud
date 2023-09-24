<?php
    $sal_host  = "localhost";
    $sal_dbname = "loja_instrumentos";
    $sal_username = "root";
    $sal_password = "00467200Samuel@";


    $sal_conn = new mysqli($sal_host, $sal_username, $sal_password, $sal_dbname);

    if ($sal_conn->connect_errno) {
        echo "Falha ao conectar: (" . $sal_conn->connect_errno . ")" . $sal_conn->connect_error;
    }
?>