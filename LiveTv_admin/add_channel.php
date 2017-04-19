<?php
include("header.php");
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
		
       
        $radio_image = $image_name;
	$name=mysql_real_escape_string($_POST['name']);
	$link=mysql_real_escape_string($_POST['link']);
	$description=mysql_real_escape_string($_POST['description']);
	$Channels=mysql_real_escape_string($_POST['Channels']);
	
        $res = mysql_query("INSERT INTO `add_channel`(`name`,`Image`,`link`,`description`,`Channels`)
        VALUES ('$name','$image_name','$link','$description','$Channels')");
	     
		
    echo "<script language='javascript'>window.location='manage_channel.php';</script>";
}
?>
<table border="0" align="center" cellpadding="5" cellspacing="5" width="40%">
<form name="math" method="post" action="" enctype="multipart/form-data">
     <tr class="update_text">
        <td colspan="2" align="center">Add Channel</td>
     </tr>
     <tr>
            <td>Channels Category:</td>
            <td>
		<select name="Channels">
		<option value="Local Channels">Local Channels</option>
		<option value="Sports Channels">Sports Channels</option>
		<option value="News Channels">News Channels</option>
		<option value="Movie Channels">Movie Channels</option>
		<option value="Music Channels">Music Channels</option>
		<option value="Kids Channels">Kids Channels</option>
		<option value="Videos On Demand">Videos On Demand</option>
		<option value="Entertainment">Entertainment</option>
		</select>
            </td>
        </tr>
     <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="name" id="name"  />
            </td>
        </tr>
     <tr>
        <td>Image:</td>
        <td>
        <input type="file" name="Image" id="Image"  />
        </td>
     </tr> 
     <tr>
            <td>Link:</td>
            <td>
                <input type="link" name="link" id="link"  />
            </td>
        </tr>
     <tr>
            <td>Description:</td>
            <td>
                <input type="description" name="description" id="description"  />
            </td>
        </tr>
     <tr>
     	<td align="right"><input type="submit" class="btnclass" name="submit" value="Add"></td>
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
