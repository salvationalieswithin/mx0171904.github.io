<?php
include("header.php");
//include("include/function.php");
$id = $_GET['banner_id'];
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
		

		 if($_FILES["Image"]["tmp_name"] != '')
		 {
				 $res = mysql_query("UPDATE  `add_banner` SET `Image`='$image_name' WHERE id = '$id'");
		 }
		  
       
		
		echo "<script language='javascript'>window.location='manage_banner.php';</script>";
		
	
	}
?>
<?php
$qry  = mysql_query("select * from add_banner where id = '$id'");
$res = mysql_fetch_array($qry);

?>
<table border="0" align="center" cellpadding="5" cellspacing="5" width="40%">
<form name="math" method="post" action="" enctype="multipart/form-data">
     <tr class="update_text">
        <td colspan="2" align="center">Update Banner</td>
     </tr>
     <tr>
        <td>Image:</td>
        <td>
        <input type="file" name="Image" id="Image"  />
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
    window.location.assign("manage_banner.php");
    
}
</script>
<?php
include("footer.php");
?>
