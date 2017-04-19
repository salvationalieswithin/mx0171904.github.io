<?php
session_start();
session_unset();
echo "<script language='javascript'>window.location='login.php';</script>";
die();
?>