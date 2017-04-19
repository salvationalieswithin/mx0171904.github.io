<?php
include("header.php");
//include("include/function.php");
$id = $_GET['channel_id'];
if($_SESSION['admin_login_status'] != "1")
{
	echo "<script language='javascript'>window.location='login.php';</script>";
}
function getuniqkey($special = '') {
    return md5(date("Y-m-d H:i:s") . uniqid(rand(), true) . time() . $special);
}
if(isset($_POST['submit']))
{

	 if(isset($_FILES["Image"]))
            {
                    //if ($_FILES["movie_picture"]["error"] == UPLOAD_ERROR_OK) {
                        $tmp_name = $_FILES["Image"]["tmp_name"];
                        $name = $_FILES["Image"]["name"];
                        $image_name = getuniqkey($tmp_name) . substr($name, strrpos($name, "."));
                        $path = "data_images/".$image_name;
                        move_uploaded_file($_FILES["Image"]["tmp_name"],$path);

                        $image_name; 
                    //}   
            }		
		$name=mysql_real_escape_string($_POST['name']);
		$link=mysql_real_escape_string($_POST['link']);
		$description=mysql_real_escape_string($_POST['description']);

		 if($_FILES["Image"]["tmp_name"] != '')
		 {
				//$res = mysql_query("UPDATE  `movie` SET `Image`='$movie_name',`movie_picture`='$image_name' WHERE Id = '$id'");
$res = mysql_query("UPDATE  `add_channel` SET `name`='$name',`Image`='$image_name',`link`='$link',`description`='$description' WHERE channel_id = '$id'");
			 }
		  else
		  {
		   $res = mysql_query("UPDATE  `add_channel` SET `name`='$name',`link`='$link',`description`='$description' WHERE channel_id = '$id'");
		  }
		  
       
		
		echo "<script language='javascript'>window.location='manage_channel.php';</script>";
		
	
	}
?>
<?php
$qry  = mysql_query("select * from add_channel where channel_id = '$id'");
$res = mysql_fetch_array($qry);

?>
<table border="0" align="center" cellpadding="5" cellspacing="5" width="40%">
<form name="math" method="post" action="" enctype="multipart/form-data">
     <tr class="update_text">
        <td colspan="2" align="center">Update Channel</td>
     </tr>
     <tr>
            <td>Channel:</td>
            <td>
                <input type="text" name="Channels" id="Channels"   value="<?php echo $res['Channels']; ?>" disabled/>
            </td>
        </tr>
     <tr>
            <td>Title:</td>
            <td>
                <input type="text" name="name" id="name"   value="<?php echo $res['name']; ?>" />
            </td>
        </tr>
     <tr>
        <td>Logo:</td>
        <td>
        <input type="file" name="Image" id="Image"  />
        </td>
     </tr>
    <tr>
            <td>Link:</td>
            <td>
                <input type="text" name="link" id="link"   value="<?php echo $res['link']; ?>" />
            </td>
        </tr>
    <tr>
            <td>Description:</td>
            <td>
                <input type="text" name="description" id="description"   value="<?php echo $res['description']; ?>" />
            </td>
        </tr>
     
     <tr>
     	<td align="right"><input type="submit" class="btnclass" name="submit" value="Update"></td>
	<td><input type="reset" name="cancel" class="btnclass" onclick="newDoc()" value="Cancel"></td>
     </tr>
 </form>
</table>
<script>
function newDoc() {
    window.location.assign("manage_channel.php");
    
}
</script>
<?php
include("footer.php");
?>
