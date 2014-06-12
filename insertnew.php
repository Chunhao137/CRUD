
<?php

$mypic = $_FILES['upload']['name'];
$temp = $_FILES['upload']['tmp_name'];
$type = $_FILES['upload']['type'];
/*
 * Gets the info for the file uploaded
 */


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
/*
 * Gets the info of the new User 
 */


if ($name && $email && $password && $cpassword) {
    /*
     * If the field are filled
     */

    if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
        /*
         * If the email is on the right format 
         */

        if (strlen($password) > 3) {
            /*
             * If the password length is more than 3
             */

            if ($password == $cpassword) {
                /*
                 * If the passwords match
                 */

                mysql_connect("localhost", "root", "") or die("problem with connection...");                /*
                 * Connects to the database localhost, with the user root and blank
                 * password. If the connection could not be made then stops the 
                 * execution of the program returning "We couldn't connect!"
                 */
                mysql_select_db("testsite");
                /*
                 * Selects the database to operate on
                 */

                $username = mysql_query("SELECT name FROM users WHERE name='$name'");
                /*
                 * Queries the database to see is the user with that name is already
                 * registered
                 */
                $count = mysql_num_rows($username);
                /*
                 * $count is the number of users with the same name as the new user
                 */
                $remail = mysql_query("SELECT email FROM users WHERE email='$email'");
                /*
                 * Queries the database to see if there is a user registered with
                 * the same email
                 */
                $checkemail = mysql_num_rows($remail);
                /*
                 * Returns the number of users with the same email
                 */

                if ($checkemail != 0) {
                    /*
                     * If $checkmail isn't 0, then there is already someone with 
                     * that email registered
                     */

                    echo "This email is already registered! Please type another email...";
                } else {
                    if ($count != 0) {
                        /*
                         * If $count isn't 0, then there is someone on the database
                         * registered with the same name
                         */

                        echo "This name is already registered! Please type another name";
                    } else {
                        if (($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/bmp")) {
                            /*
                             * If the uploaded file is in the right format
                             */
                            $dir = "profiles/$name/images/";
                            /*
                             * Sets the directory of the User
                             */
                            mkdir($dir, 0777, true);
                            /*
                             * Creates the directory with permissions to root,
                             * groups and user to read, write and execute.
                             * Check numeric notation:
                             * http://en.wikipedia.org/wiki/Filesystem_permissions
                             */
                            move_uploaded_file($temp, "profiles/$name/images/$mypic");
                            /*
                             * Stores the uploaded file in the directory of the User
                             */
                            echo "This will be you profile picture!<p><img border='1' width='50' height='50' src='profiles/$name/images/$mypic'><p>";
                            /*
                             * Shows the picture to the user
                             */
                            $passwordmd5 = md5($password);
                            /*
                             * Encrypts the password
                             */
                            mysql_query("INSERT INTO users(name,email,password) VALUES('$name','$email','$passwordmd5')");
                            /*
                             * Queries the database to insert the new user with
                             * all of the info given in the form on the previous 
                             * page
                             */
                            echo "You have succefully registered!<a href='home.php'>Login now!</a>";
                            /*
                             * Warns the User that everything worked and creates a 
                             * link to home.php Page
                             */
                        } else {
                            /*
                             * If the file is not on the right format
                             */
                            echo "Please load a valid jpeg, jpg or bmp! And size must be less than 10k!";
                        }
                    }
                }
            } else {
                echo "Your passwords don't match!";
            }
        } else {

            echo "Your password is too short! You need to type a password between 4 and 15 charachters!";
        }
    } else {
        echo "Please type a valid email!";
    }
} else {
    echo "you have to complete the form!";
}
