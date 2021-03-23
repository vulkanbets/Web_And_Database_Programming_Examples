<?php
    // $mysqli = new mysqli("localhost", "user", "password", "database");
    $mysqli2 = new mysqli("localhost", "apache", "t80O8grSBeGXE3AH", "compe561");

    /* check connection */
    if( mysqli_connect_errno() )
    {
        printf("Connection failed: %s<br>", mysqli_connect_error());
        exit();
    }

    $statement = 'SELECT `device_name`, device.eui, `app_key`, `app_s_key`, `nwk_s_key`, `class`, band.region_code, frequencyband.description, `sub_band`, datarate.data_rate_id, `spreading_factor`, `bandwidth`, coderate.code_rate_id, codingrate.description, `tx_power` FROM `device` LEFT JOIN `appkey` ON device.eui = appkey.eui LEFT JOIN `appskey` ON device.eui = appskey.eui LEFT JOIN `nwkskey` ON device.eui = nwkskey.eui LEFT JOIN `class` ON device.eui = class.eui LEFT JOIN `band` ON device.eui = band.eui LEFT JOIN `frequencyband` ON band.region_code = frequencyband.region_code LEFT JOIN `subband` ON device.eui = subband.eui LEFT JOIN `datarate` ON device.eui = datarate.eui LEFT JOIN `spreadingfactor` ON datarate.data_rate_id = spreadingfactor.data_rate_id LEFT JOIN `coderate` ON device.eui = coderate.eui LEFT JOIN `codingrate` ON coderate.code_rate_id = codingrate.code_rate_id LEFT JOIN `power` ON device.eui = power.eui ORDER BY ts DESC LIMIT 1';

    if( ( $result = $mysqli2->query($statement) ) == false )
    {
        printf("Error: %s<br>", $mysqli2->error);
    }
    else
    {
        $row = $result->fetch_object();
        printf("%s", $row->eui);
        
        /* free result set */
        $result->close();
    }


    /* close connection */
    $mysqli2->close();
?>
