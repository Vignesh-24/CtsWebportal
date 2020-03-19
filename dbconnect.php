<?php
    
    DEFINE ('DB_USER','id12680429_root');
    DEFINE ('DB_HOST','localhost');
    DEFINE ('DB_PSWD','focus');
    DEFINE ('DB_NAME','id12680429_ctsclub');

    $scon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);

    if(!$scon)
    {
        die('Error Connecting to Database');
    }
?>