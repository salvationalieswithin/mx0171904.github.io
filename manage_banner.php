<?php
include("header.php");
if($_GET['banner_id'] != '')
{
	$radio_id = $_GET['banner_id'];
        mysql_query("delete from add_banner where id = '$radio_id'");
	echo "<script language='javascript'>window.location='manage_banner.php';</script>";
}
?>
<html>
<head>
<title>Music Admin Panel</title>
</head>
<body>
	<div class="add_button">
    	<a href="add_banner.php">Add Banner </a>
	</div>
<table border="0" align="center" cellpadding="5" cellspacing="5" width="100%">
    <tr class="update_text">
        <td colspan="2" align="center">Manage Banner</td>
     </tr>
	<tr align="left">
    	<th>Image</th>
        <th colspan="2" >Action</th>
    </tr>
    <?php
	$query = ("select * from add_banner ORDER BY `id` DESC");
        $getres = new display_navigator($query,'manage_banner.php?'.$pagelnk,"paging_links",10);
	while($res = mysql_fetch_array($getres->result))
	{

	?>
    <tr>
	<td><img class="image" src="data_images/<?php echo  $res['Image']; ?>" /></td>
        
        <td style="width:10%;" ><a href="update_banner.php?banner_id=<?php echo $res['id']; ?>"><img src="Images/edit.gif" /></a></td>
        <td style="width:10%;"><a href="manage_banner.php?banner_id=<?php echo $res['id']; ?>" onclick="return checkDelete()"><img src="Images/button_delete.gif" /></a></td>
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
