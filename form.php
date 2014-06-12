<html>

<head></head>


<body>

<h2>Register Form </h2>

<form enctype ="multipart/form-data" method="POST" action= "insert.php">
<table border="0" width="60%">
<tr><td width="10%">Name:</td><td><input type="text" name="name" maxlength="15"/><br /></td></tr>
<tr><td width="20%">Email:</td><td><input type="text" name="email" maxlength="40"/><br /></td></tr>
<tr><td width="10%">Password:</td><td><input type="password" name="password" maxlength="8"/><br /></td>
<tr><td width="10%">Confirm Password:</td><td><input type="password" name="cpassword" maxlength="8"/><br /></td></tr>

<p>
</table>

Choose your picture: <input type="file" name="file"><p>
<input type="submit" value="register"/><br />
</form>



</body>

</html>