<?php
    $servername = "localhost";
    $username = "root";
    $password = "2003Muf$24";
    $dbname = "simpleerp";

    //Creating the connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>