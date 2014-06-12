<html>
<body>
<?php

session_start();


if(!isset($_SESSION['name'])){

   echo "access denied!"; 

}else{
include("session.php"); 
echo "<h3>Choose an ID to edit:</h3><p>"; 

mysql_connect("localhost", "root", "") or die ("problem with connection.."); 

mysql_select_db("testsite"); 
$per_page=6; 

$pages_query=mysql_query("SELECT COUNT('id') FROM users");
$pages=ceil(mysql_result($pages_query, 0)/$per_page); 
$page=(isset($_GET['page'])) ? (int)$_GET['page']:1; 
$start=($page-1)*$per_page; 
$query=mysql_query("SELECT*FROM users LIMIT $start,$per_page"); 

echo "<table width='90%' align=center border=2>"; 
echo"<td width='40%' align=center bgcolor=\"FFFF00\">ID</td>
<td width='40%' align=center bgcolor=\"FFFF00\">NAME</td>
<td width='40%' align=center bgcolor=\"FFFF00\">EMAIL</td>
<td width='40%' align=center bgcolor=\"FFFF00\">PASSWORD</td></tr>";
 

 while($row = mysql_fetch_assoc($query)) {
 
      $id=$row['id'];
	  $name=$row['name'];
	  $email=$row['email'];
	  $password=$row['password']; 
	  
echo "<tr><td align=center>
<a href=\"edit.php?ids=$id&names=$name&emails=$email&passwords=$password\"> $id</a></td>
<td>$name</td><td><a href=\"emailto.php?emails=$email\">$email</a></td><td>$password</td></tr>"; 

} echo "</table>"; 


$prev=$page-1; 
$next=$page+1; 

if(!($page<=1)){
  
     echo "<a href='update.php?page=$prev'>Prev</a> "; 
	 }
     
if($pages>=1){
   
	for($x=1; $x<=$pages; $x++)

	    echo ($x==$page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ': '<a href="?page='.$x.'">'.$x.'</a> ';

}

if(!($page>=$pages)){

echo "<a href='update.php?page=$next'>Next</a> "; 

}
mysql_close();
}
?>

</body>

<center> <?php include("links.php")?></center>;
</html>