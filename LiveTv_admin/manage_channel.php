<?php
include("header.php");
if($_GET['channel_id'] != '')
{
	$radio_id = $_GET['channel_id'];
        mysql_query("delete from add_channel where channel_id = '$radio_id'");
	echo "<script language='javascript'>window.location='manage_channel.php';</script>";
}
?>
<html>
<head>
<title>Admin Panel</title>
</head>
<body>
	<div class="add_button">
    	<a href="add_channel.php">Add Channel </a>
	</div>
<table border="0" align="center" cellpadding="5" cellspacing="5" width="100%">
    <tr class="update_text">
        <td colspan="2" align="center">Manage Channel</td>
     </tr>
	<tr align="left">
	<th>Channel</th>
	<th>Title</th>
    	<th>Logo</th>
	<th>Link</th>
	<th>Description</th>
        <th colspan="2" >Action</th>
    </tr>
    <?php
	$query = ("select * from add_channel ORDER BY `channel_id` DESC");
        $getres = new display_navigator($query,'manage_channel.php?'.$pagelnk,"paging_links",10);
	while($res = mysql_fetch_array($getres->result))
	{

	?>
    <tr>
	<td><?php echo $res['Channels']; ?></td>
	<td><?php echo $res['name']; ?></td>
	<td><img class="image" src="data_images/<?php echo  $res['Image']; ?>" /></td>
        <td><?php echo $res['link']; ?></td>
	<td><?php echo $res['description']; ?></td>
        <td style="width:10%;" ><a href="update_channel.php?channel_id=<?php echo $res['channel_id']; ?>"><img src="Images/edit.gif" /></a></td>
        <td style="width:10%;"><a href="manage_channel.php?channel_id=<?php echo $res['channel_id']; ?>" onclick="return checkDelete()"><img src="Images/button_delete.gif" /></a></td>
    </tr>
    <?php
	}
	?>
</table>
    <div class="right_nex_pre" style="margin-right: 3%" align="right">

        <?php
        if ($getres->hrefpglinks != '')
            echo $getres->hrefpglinks;

        if ($getres->totalRecordFound <= 0)
            echo "<p>No any record.</p>";
        ?>

    </div>
 <script>
 $(function() {
  $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
});
</script>
<script>
  function checkDelete(){
    return confirm('Are you sure want to delete ?');
}
</script>
<?php
include("footer.php");
?>
</body>
</html>
