<?php
    
    $sname= "localhost";

    $uname= "root";

    $password = "";

    $db_name = "IPT101";

    $port = 3307;

    $conn = mysqli_connect($sname, $uname, $password, $db_name, $port);

    if (!$conn) {
        echo "Connection failed!";
    }
        echo "";  
        
?>