
<?php

if(!isset($_SESSION['name']) && isset($_COOKIE['testsite'])){
    /*
     * If there is no session with the name of the user but there is a cookie
     * in the user's browser
     */
	$_SESSION['name'] = $_COOKIE['testsite'];
}

$dir = "profiles/".$_SESSION['name']."/images/";
/*
 * Sets the user's directory
 */
$open = opendir($dir);
/*
 * Opens the user's directory
 */

while(($file = readdir($open)) != FALSE){
    /*
     * While there is files
     */
	if($file!="."&&$file!=".."&&$file!="Thumbs.db"){
		echo "<img border='1' width='70' height='70' src='$dir/$file'>";
                /*
                 * Shows the picture
                 */
	}

}

echo "&nbsp<b>".$_SESSION['name']."</b>'s session<br /><a href='logout.php'>Logout</a>";
/*
 * Shows the User's session
 */

include('links.php');
/*
 * Include links.php Page
 */

