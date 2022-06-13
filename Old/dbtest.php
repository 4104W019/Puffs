<?php
    $servername = "172.17.0.3";
    $username = "web";
    $password = "1qaz@WSX";
    $dbname = "puffs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (mysqli_connect_errno()) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>