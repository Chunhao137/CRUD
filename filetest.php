<?php

$name=$_FILES['file']['name'];
$size=$_FILES['file']['size'];
$tmp_name=$_FILES['file']['tmp_name']; 
$type=$_FILES['file']['type'];  

if(isset($name)) {
	
	if(!empty($name)) {
		
		    $location='images/';
		if(move_uploaded_file($tmp_name, $location.$name)){
		
		  echo "uploaded";
		}
		
		}else {
		echo "Please choose a file"; 
		}
		
		}
	
?>
<form action="filetest.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><br><br>
	<input type="submit" value="submit">
</form>



