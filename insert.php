<?php

$mypic=$_FILES['file']['name'];
$size=$_FILES['file']['size'];
$tmp_name=$_FILES['file']['tmp_name']; 
$type=$_FILES['file']['type'];  

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword']; 


if ( $name && $email && $password && $cpassword) {

if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){

	if (strlen($password) > 3) {
	

	if($password==$cpassword){

mysql_connect("localhost", "root", "") or die ("we did not make a connection"); 
mysql_select_db("testsite");

$username=mysql_query("SELECT name FROM users WHERE name='$name'"); 
$count=mysql_num_rows($username); 
$remail=mysql_query("SELECT email FROM users WHERE email='$email'"); 
$checkemail=mysql_num_rows($remail); 
 if($checkemail!=0) {
 
     echo "you have entered an email that is already in the system. Please enter another email:";
	} else {
	
	
	if ($count!=0) {
  
     echo " You have entered a name that is already in the database. Please enter another name"; 
    } else {
		
		if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp")) {
		$directory="./profiles/$name/images/"; 
		mkdir($directory, 0777, true);
		
		move_uploaded_file($tmp_name, "profiles/$name/images/$mypic"); 
		echo "This is your profile picture!<p><img border='1' width='100' height='100' src='profiles/$name/images/$mypic'><p>"; 
	    $passwordmd5=md5($password); 
		mysql_query("INSERT INTO users(name, email, password) VALUES('$name','$email','$passwordmd5')"); 
		echo "You have sucessfully registered <a href='home.php'>Login Now!"; 
			 
		  }
		 }
		}
	    }else {echo "your passwords don't match.Please confirm password again.";
		}
	 
	
	}else{
	 
	    echo "Your password is too short"; 

		}
		
		}else{
		
             echo "you have an invalid email!Please retype"; 
			 }
	
	
	
	}else {

     echo "you forgot to type in a field"; 
   } 


	




?>