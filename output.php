<?php
mysql_connect("localhost", "root","") or die("we have a connection problem"); 

mysql_select_db("testsite");

$result=mysql_query("SELECT*FROM users"); 


while($row = mysql_fetch_array($result)) {
	echo $row['name']." ".$row['email']." ".$row['password']; 
	
	echo "<br />";

}





?>
