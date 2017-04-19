<?php
include("include/conf.php");

	if($_POST['get'] == 'country')
	{
		$query = mysql_query("select * from `manage_ipl_team` where team_id='".$_POST['id']."'");
		$row=mysql_fetch_array($query);
		$returnValue['team_id'] = $row['team_id'];
		$returnValue['team_first'] = $row['team_first'];
		$returnValue['team_second'] = $row['team_second'];
		$returnValue['date'] = $row['date'];
		$returnValue['flag_first'] = $row['flag_first'];
		$returnValue['flag_second'] = $row['flag_second'];
		$returnValue['time'] = $row['time'];
		$returnValue['ground'] = $row['ground'];
		
		echo json_encode($returnValue);
	}

?>