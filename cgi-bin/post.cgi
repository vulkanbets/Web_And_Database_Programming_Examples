#!"C:/Program Files/Ampps/php-7.3/php-cgi.exe" -q
<?php
    // password: t80O8grSBeGXE3AH

    // $mysqli = new mysqli("localhost", "user", "password", "database");
    $mysqli = new mysqli("localhost", "apache", "t80O8grSBeGXE3AH", "compe561");

    /* check connection */
    if( mysqli_connect_errno() )
    {
        printf("Connection failed: %s<br>", mysqli_connect_error());
        exit();
    }
    else
    {
        printf("Connection Succeeded, host info: %s<br>", $mysqli->host_info);
    }

    //  Structured Query Language (SQL)
    //  INSERT INTO `ipaddress` (`address`) VALUES ('127.0.0.1');
    //  INSERT INTO `ipaddress` (`address`) VALUES ('130.191.166.101')

    $statement = 'INSERT INTO `ipaddress` (`address`) VALUES (\'' . $_POST["ipv4Address"] . '\')';

    echo "<h2>$statement</h2>";

    if( $mysqli->query($statement) == false )
    {
        printf("Error: %s\n", $mysqli->error);
    }

    printArray($_POST);

    /* close connection */
    $mysqli->close();

    function printArray($array)
    {
        foreach($array as $key => $value)
        {
            echo "<h2>$key => $value</h2>";
        }
    }
?>
