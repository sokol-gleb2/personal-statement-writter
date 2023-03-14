<?php
    $host = "ieatlas.co.uk.mysql";
    $username = "ieatlas_co_ukatlas";
    $password = "123456";
    $dbname = "ieatlas_co_ukatlas";
    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }
?>
