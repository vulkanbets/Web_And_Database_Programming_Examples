#!"C:/Program Files/Ampps/php-7.3/php-cgi.exe" -q
<?php
    printArray($_POST);
    function printArray($array)
    {
        foreach($array as $key => $value)
        {
            echo "<h4>$key => $value</h4>";
        }
    }
?>
