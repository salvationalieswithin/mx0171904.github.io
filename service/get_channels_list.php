<?php
include "../include/conf.php";
header('Content-Type: text/xml;charset="UTF-8"',true);
echo '<?xml version="1.0" encoding="UTF-8"?> <channel>';

	//$count = 0;
	$select_data = "SELECT count(`channel_id`),`Channels` FROM `add_channel` group by `Channels`";
	$result=mysql_query($select_data);
	while($post=mysql_fetch_array($result))
	{
		if ($post['Channels'] =='Entertainment') {
			$post['Channels'] = 'Adult Channels';
		}
		if ($post['Channels'] =='Videos On Demand') {
			$post['Channels'] = 'Videos Channels';
		}
      echo "<item>";
		echo "<count>".$post['count(`channel_id`)']."</count>";
		echo "<Channels_Name>".mysql_real_escape_string($post['Channels'])."</Channels_Name>";	
      echo "</item>";
	 }
	

echo '</channel>';
?>

