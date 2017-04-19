<?php
include("include/conf.php");

	if(isset($_POST['submit']))
	{
		$query = mysql_query("select * from admin_login where username='".$_POST['username']."' and password='".$_POST['password']."'");
		 while($check_row=mysql_fetch_array($query))
		{
			$_SESSION['admin_login_status']="1";
			$_SESSION['admin_id']=$check_row['id'];
			$_SESSION['admin_name']=$check_row['user_name'];
			echo "<script language='javascript'>window.location='manage_banner.php';</script>";
			die();
		}
	}


?>
<title>Welcome to Control Panel</title>
<link rel="stylesheet" href="css/admin.css" type="text/css" />

<form name="frmLogin" action="" method="post">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td align="center" class="texttitle">
			
		</td>

	</tr>
</table>

<table align="center" width="25%" cellpadding="2" cellspacing="0" border="0" class="even_row_border">
	<tr>
		<td colspan="3" class="field_row" style="height:30px" align="center">Administrator login</td>
	</tr>	
	<tr class="odd_row">
		<td class="detaild">User Name</td>
		<td>:</td>

		<td class="detaild"><input type="text" name="username"></td>		
	</tr>
	<tr class="odd_row">
		<td class="detaild">Password</td>
		<td>:</td>
		<td class="detaild"><input type="password" name="password"></td>		
	</tr>
	<tr class="odd_row">
		<td colspan="3" align="center">
			<input type="hidden" name="session_uniq_id" value="<?php echo $_SESSION['session_uniq_id']; ?>">
			<input type="submit" name="submit" value="Login">
		</td>
	</tr>
</table>
</form>
</body>
</head>
