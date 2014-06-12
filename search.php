<?php session_start(); include("session.php"); ?> 
<html>
<head></head>

<body>
<center>
<form method="GET" action="search.php">

	<input type="text" name="search" >
	<input type="submit" name="submit" value="search database">
	
</form>

</center>
<hr />
<u>Results:</u>&nbsp; 
<?php


if(!isset($_SESSION['name'])){

  echo "Access Denied!"; 

}else{


if(isset($_REQUEST['submit'])) {

	$search=$_GET['search'];  
	$terms=explode(" ", $search); 
	$query="SELECT*FROM users WHERE "; 
    $i=0; 
    foreach($terms as $each){
	$i++; 
	if($i==1){
	
	   $query.="name LIKE '%$each%' "; 
	}else{
	   $query .= "OR name LIKE '%$each%' "; 
	 }
	 
  }

    mysql_connect("localhost", "root", ""); 
	mysql_select_db("testsite"); 
	
	$query=mysql_query($query); 
	$num=mysql_num_rows($query); 
	
	if($num>0 && $search!=""){
	
	   echo "$num result(s) found for <b>$search</b>!"; 


   while($row=mysql_fetch_assoc($query)){


     $id=$row['id'];
     $name=$row['name']; 
	 $email=$row['email'];
	 $password=$row['password'];
	 
	 echo "<br /><h3>name:$name(id:$id)</h3>email: $email<br />password: $password<br />";
	 
	 }
	 
	}else{
	 
	 echo "No results were found"; 
	 
	}
	 
	mysql_close(); 
	 

}else{

     echo "Please type any word..."; 
	 
	 }
	 
include("links.php");

}
?>

</body>


</html>



