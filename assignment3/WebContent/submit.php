<?php
    // $mysqli = new mysqli("localhost", "user", "password", "database");
    $mysqli = new mysqli("localhost", "apache", "t80O8grSBeGXE3AH", "compe561");

    /* check connection */
    if( mysqli_connect_errno() )
    {
        printf("Connection failed: %s<br><br>", mysqli_connect_error());
        exit();
    }
    else
    {
        printf("Connection Succeeded, host info: %s<br><br>", $mysqli->host_info);
    }

    libxml_use_internal_errors(true);       // Create DOM object to extract certain
    $doc = new DOMDocument();               // tag elements by ID
    $doc->loadHTMLFile("assignment3.htm");  // this also clears any warnings
    libxml_clear_errors();                  // That are printed to the screen
    
    echo $doc->getElementById($_POST["datarate"])->nodeValue;

    printArray($_POST);
    function printArray($array)
    {
        foreach($array as $key => $value)
        {
            echo "<h2>$key => $value</h2>";
        }
    }

    

    //  Structured Query Language (SQL)
    $statement1 = 'INSERT INTO `device` (`device_name`, `eui`, `ts`) VALUES (\'' . $_POST["devicename"] . '\', \'' . $_POST["eui"] . '\', CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE device_name=\'' . $_POST["devicename"] . '\', eui=\'' . $_POST["eui"] . '\', ts=CURRENT_TIMESTAMP';
    echo "<h2>$statement1</h2>";

    $statement2 = 'INSERT INTO `appkey` (`eui`, `app_key`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["appkey"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', app_key=\'' . $_POST["appkey"] . '\'';
    echo "<h2>$statement2</h2>";

    $statement3 = 'INSERT INTO `appskey` (`eui`, `app_s_key`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["appskey"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', app_s_key=\'' . $_POST["appskey"] . '\'';
    echo "<h2>$statement3</h2>";

    $statement4 = 'INSERT INTO `nwkskey` (`eui`, `nwk_s_key`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["nwkskey"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', nwk_s_key=\'' . $_POST["nwkskey"] . '\'';
    echo "<h2>$statement4</h2>";

    $statement5 = 'INSERT INTO `class` (`eui`, `class`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["class"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', class=\'' . $_POST["class"] . '\'';
    echo "<h2>$statement5</h2>";

    $statement6 = 'INSERT INTO `band` (`eui`, `region_code`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["frequency"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', region_code=\'' . $_POST["frequency"] . '\'';
    echo "<h2>$statement6</h2>";

    $statement7 = 'INSERT INTO `subband` (`eui`, `sub_band`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["subband"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', sub_band=' . $_POST["subband"];
    echo "<h2>$statement7</h2>";

    $statement8 = 'INSERT INTO `datarate` (`eui`, `data_rate_id`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["datarate"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', data_rate_id=' . $_POST["datarate"];
    echo "<h2>$statement8</h2>";

    $statement9 = 'INSERT INTO `coderate` (`eui`, `code_rate_id`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["codingrate"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', code_rate_id=' . $_POST["codingrate"];
    echo "<h2>$statement9</h2>";

    $statement10 = 'INSERT INTO `power` (`eui`, `tx_power`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["txpower"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', tx_power=' . $_POST["txpower"];
    echo "<h2>$statement10</h2>";

    $statement11 = 'INSERT INTO `frequencyband` (`region_code`, `description`) VALUES (\'' . $_POST["frequency"] . '\', \'' . $doc->getElementById($_POST["frequency"])->nodeValue . '\') ON DUPLICATE KEY UPDATE region_code=\'' . $_POST["frequency"] . '\', description=\'' . $doc->getElementById($_POST["frequency"])->nodeValue . '\'';
    echo "<h2>$statement11</h2>";

    // INSERT INTO `spreadingfactor` (`data_rate_id`, `spreading_factor`, `bandwidth`) VALUES (3, 7, '125') ON DUPLICATE KEY UPDATE data_rate_id=3, spreading_factor=7, bandwidth='125'
    // 
    // $statement12 = 'INSERT INTO `spreadingfactor` (`data_rate_id`, `spreading_factor`, `bandwidth`) VALUES (\'' . $_POST["datarate"] . '\', \'' . $doc->getElementById($_POST["frequency"])->nodeValue . '\') ON DUPLICATE KEY UPDATE region_code=\'' . $_POST["frequency"] . '\', description=\'' . $doc->getElementById($_POST["frequency"])->nodeValue . '\'';
    // echo "<h2>$statement12</h2>";


    // if( $mysqli->query($statement) == false )
    // {
    //     printf("Error: %s\n", $mysqli->error);
    // }
    /* close connection */
    $mysqli->close();
?>
