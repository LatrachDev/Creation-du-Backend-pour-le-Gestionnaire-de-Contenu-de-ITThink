<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "itthink_dashboard";
    
    $conn = mysqli_connect
    (
        hostname: $db_server, 
        username: $db_user, 
        password: $db_pass, 
        database: $db_name
    );

    if($conn)
    {
        echo"You're connected!";
    }
    else
    {
        echo "couldn't connect";
    }
?>
