<?php

if (isset($_COOKIE['testsite'])){

   header('Location: session.php'); 

}else{
$time=time();                /* mktime(19,45,0,3,10,1975);(hours, minutes, seconds, month, day, year)*/
$date=date('F d, Y, g: i: s a', $time); /*(Month, day, Year, hour: minutes: seconds)*/
 echo 'Today is&nbsp' . $date; 
echo"









<html>
<head></head>

<body>

<h1><center> Welcome to CRUD control center</center></h1>

<center>Please Login...</center>
<center>
<form method='post' action= 'login.php'>
<table border='0' width='30%'>
<tr><td>Name:</td><td><input type='text' name='name' maxlength='15'/><br /></td></tr>
<tr><td>Password:</td><td><input type='password' name='password' maxlength='8'/><br /></td>
<tr><td>Remember Me?</td><td><input type='checkbox' name='remember' /><br /></td>
</table>
<p>

<input type='submit' value='Login'/><br />
</form>
<a href='form.php'> Register?</a>
</center>


</body>



</html>
";
}

?>