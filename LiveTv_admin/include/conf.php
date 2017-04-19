<?php
session_start();

//mysql_connect("localhost","root","") or die("not connected");
//mysql_select_db("cricket");
$_connection=mysql_connect("localhost","cricyard_livetvd","AkAn]Qk=iXl4") or die("not connected");
mysql_select_db("cricyard_live_tv_db",$_connection) or die("not connected db");  
mysql_set_charset('utf8',$_connection);
?>
