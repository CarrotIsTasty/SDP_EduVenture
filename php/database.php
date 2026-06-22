<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'edudb';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Connection error:". mysqli_connect_error());

?>