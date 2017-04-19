<?php
include "../include/conf.php";
header('Content-Type: text/xml;charset="UTF-8"',true);
echo '<?xml version="1.0" encoding="UTF-8"?> <channel>';

	//$count = 0;
	$select_data = "select * from add_channel where Channels = 'Movie Channels'";
	$result=mysql_query($select_data);
	while($post=mysql_fetch_array($result))
	{
		$channel_id = $post['channel_id'];
		$Image = 'http://cricyard.com/iphone/live_tv/LiveTv_admin/data_images/'.$post['Image'];
		//echo date("Y-m-d H:i:s");
      echo "<item>";
		echo "<title>".$post['name']."</title>";
		echo "<link>".$post['link']."</link>";
		echo "<description>".$post['description']."</description>";
		echo "<enclosure>".$Image."</enclosure>";
	
      echo "</item>";
	 }
	

echo '</channel>';
?>

