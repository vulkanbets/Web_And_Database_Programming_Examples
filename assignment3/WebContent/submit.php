<?php
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

    libxml_use_internal_errors(true);       // Create DOM object to extract certain
    $doc = new DOMDocument();               // tag elements by ID
    $doc->loadHTMLFile("assignment3.htm");  // this also clears any warnings
    libxml_clear_errors();                  // That are printed to the screen
    

    printArray($_POST);
    function printArray($array)
    {
        foreach($array as $key => $value)
        {
            echo "<h2>$key => $value</h2>";
        }
    }

    //  Structured Query Language (SQL) Strings
    $statement1 = 'INSERT INTO `device` (`device_name`, `eui`, `ts`) VALUES (\'' . $_POST["devicename"] . '\', \'' . $_POST["eui"] . '\', CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE device_name=\'' . $_POST["devicename"] . '\', eui=\'' . $_POST["eui"] . '\', ts=CURRENT_TIMESTAMP';
    $statement2 = 'INSERT INTO `appkey` (`eui`, `app_key`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["appkey"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', app_key=\'' . $_POST["appkey"] . '\'';
    $statement3 = 'INSERT INTO `appskey` (`eui`, `app_s_key`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["appskey"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', app_s_key=\'' . $_POST["appskey"] . '\'';
    $statement4 = 'INSERT INTO `nwkskey` (`eui`, `nwk_s_key`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["nwkskey"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', nwk_s_key=\'' . $_POST["nwkskey"] . '\'';
    $statement5 = 'INSERT INTO `class` (`eui`, `class`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["class"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', class=\'' . $_POST["class"] . '\'';
    $statement6 = 'INSERT INTO `band` (`eui`, `region_code`) VALUES (\'' . $_POST["eui"] . '\', \'' . $_POST["frequency"] . '\') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', region_code=\'' . $_POST["frequency"] . '\'';
    $statement7 = 'INSERT INTO `subband` (`eui`, `sub_band`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["subband"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', sub_band=' . $_POST["subband"];
    $statement8 = 'INSERT INTO `datarate` (`eui`, `data_rate_id`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["datarate"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', data_rate_id=' . $_POST["datarate"];
    $statement9 = 'INSERT INTO `coderate` (`eui`, `code_rate_id`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["codingrate"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', code_rate_id=' . $_POST["codingrate"];
    $statement10 = 'INSERT INTO `power` (`eui`, `tx_power`) VALUES (\'' . $_POST["eui"] . '\', ' . $_POST["txpower"] . ') ON DUPLICATE KEY UPDATE eui=\'' . $_POST["eui"] . '\', tx_power=' . $_POST["txpower"];
    $statement11 = 'INSERT INTO `frequencyband` (`region_code`, `description`) VALUES (\'' . $_POST["frequency"] . '\', \'' . $doc->getElementById($_POST["frequency"])->nodeValue . '\') ON DUPLICATE KEY UPDATE region_code=\'' . $_POST["frequency"] . '\', description=\'' . $doc->getElementById($_POST["frequency"])->nodeValue . '\'';
    $string1 = $doc->getElementById($_POST["datarate"])->nodeValue;     // Get the string from html file by id
    $string2 = explode(" ", $string1);                                  // parse it and sepearte it into the two
    $string3 = substr($string2[0], 2);                                  // string parameters that I will send
    $string4 = substr($string2[1], 2, 3);                               // as an sql statement
    $statement12 = 'INSERT INTO `spreadingfactor` (`data_rate_id`, `spreading_factor`, `bandwidth`) VALUES (' . $_POST["datarate"] . ', ' . $string3 . ', \'' . $string4 . '\') ON DUPLICATE KEY UPDATE data_rate_id=' . $_POST["datarate"] . ', spreading_factor=' . $string3 . ', bandwidth=\'' . $string4 .'\'';
    $statement13 = 'INSERT INTO `codingrate` (`code_rate_id`, `description`) VALUES (' . $_POST["codingrate"] . ', \'' . $doc->getElementById($_POST["codingrate"])->nodeValue . '\') ON DUPLICATE KEY UPDATE code_rate_id=' . $_POST["codingrate"] . ', description=\'' . $doc->getElementById($_POST["codingrate"])->nodeValue . '\'';
    //  Structured Query Language (SQL) Strings

    // Store all statemetns in an array 
    $statement = array(
        0 => $statement1,
        1 => $statement2,
        2 => $statement3,
        3 => $statement4,
        4 => $statement5,
        5 => $statement6,
        6 => $statement7,
        7 => $statement8,
        8 => $statement9,
        9 => $statement10,
        10 => $statement11,
        11 => $statement12,
        12 => $statement13
    );
    // Store all statemetns in an array 

    // Execute sql statements
    for($i = 0; $i < 13; $i++)
    {
        if( $mysqli->query($statement[$i]) == false )
        {
            printf("Error: %s\n", $mysqli->error);
        }
    }
    // Execute sql statements
    
    /* close connection */
    $mysqli->close();
?>
