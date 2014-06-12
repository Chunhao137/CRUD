<html>
<head></head>

<body>

<h3>Edit User:<?php echo $_REQUEST['names'];?></h3>


<form enctype="multipart/form-data" method="post" action="change.php">
<table border="0" width="60%">
<tr><td width="30%">Name</td><td><input type="text" name="newname" value="<?php echo $_REQUEST['names'];?>"></td>
<tr><td width="30%">Email</td><td><input type="text" name="newemail" value="<?php echo $_REQUEST['emails'];?>"></td>
<tr><td width="30%">New Password</td><td><input type="password" name="newpassword" value=""></td>
</table>

Change picture:<input type='file' name='newupload' /><p>

<input type="submit" name="submit" value="save and update"/>
<input type="hidden" name="id" value="<?php echo $_REQUEST['ids']; ?>">
</form>



</body>

<?php include("links.php") ?>; 




</html>
