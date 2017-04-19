<?php
include("include/conf.php");
include("include/function.php");
//include("include/function_noti.php");
if($_SESSION['admin_login_status'] != "1")
{
	echo "<script language='javascript'>window.location='login.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to Control Panel</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/admin.css" type="text/css" />
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tabel.css" />   
<link rel="stylesheet" href="js/jquery-ui.css">
    
<script src="js/jquery-ui.js"></script>
</head>
<body>
<div class="main_cntr">
<table width="980" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2" class="header" valign="top";>
			<div class="hdr_cntr">
				<div class="welcome_txt"><?php echo $_SESSION['admin_name'];?></div>
				<div class="logout_link"><a href="logout.php">Logout</a></div>
			</div>
		</td>
    </tr>
    <tr>
        <td width="15%" class="left_column" valign="top">
            <div class="left_cntr">
                <ul>
                    <li></li>
                    <font color="#70BA63">:</font>
                    <li><a href="index.php">Home</a></li> 
		    <li><a href="manage_banner.php">Manage banner</a></li> 
		    <li><a href="manage_channel.php">Manage channel</a></li>                 
                    <font color="#70BA63">:</font>
                </ul>                
            </div>
        </td>
        <td width="85%">
