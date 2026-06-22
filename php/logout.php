<?php
session_start();
session_unset();
session_destroy();
header("Location: /SDPSoftware1/login.php");
exit();
?>