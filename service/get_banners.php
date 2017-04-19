<?php
include "../include/conf.php";
$return_arr = array();

   $select_data = mysql_query("select * from add_banner");
    
    while($row = mysql_fetch_array($select_data))
    {
	
        $row_array['status'] = '1';
        $row_array['id'] = $row['id'];
        $row_array['Image'] = 'http://cricyard.com/iphone/live_tv/LiveTv_admin/data_images/'.$row['Image'];
        array_push($return_arr, $row_array);
    }

echo json_encode($return_arr); 
?>
