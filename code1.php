<?php

session_start();
/*
 * Starts the session if there is one
 */

if (isset($_POST['submit'])) {
    /*
     * If the variable "submit" is set, meaning that there was a valid form
     * submitted
     */

    $mypic = $_FILES['newupload']['name'];
    // Gets the name of the new file uploaded
    $temp = $_FILES['newupload']['tmp_name'];
    // Gets the temporary name of the new file uploaded
    $type = $_FILES['newupload']['type'];
    // Gets the type of the new file uploaded

    $id = $_REQUEST['id'];
    // Gets the User's id
    $newname = $_REQUEST['newname'];
    // Gets the new name of the User given in the form
    $newemail = $_REQUEST['newemail'];
    // Gets the new email of the User given in the form
    $newpassword = $_REQUEST['newpassword'];
    // Gets the new password of the User given in the form

    if ($newname && $newemail && $newpassword) {
        // If all this values are set and exist

        if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $newemail)) {
            // If the email string is within this format:
            // some_thing.123@somewhere.com

            if (strlen($newpassword) > 4) {
                // If the length of the password is more than 4

                mysql_connect("localhost", "root", "") or die("problem with connection...");                /*
                 * Connects to the localhost database with the user root and blank
                 * password, if it doesn't, stops the execution of the program 
                 * returning "Problems with connection!"
                 */

                mysql_select_db("testsite");
                /*
                 * After the connection is up, select the database to operate on
                 */

                mysql_query("UPDATE users SET name='$newname', email='$newemail' WHERE id='$id'");
                /*
                 * Sends a query to the database updating the User's name and email
                 */

                $md5 = md5($newpassword);
                /*
                 * Encrypts the password
                 */

                mysql_query("UPDATE users SET password='$md5' WHERE id='$id'");
                /*
                 * Queries the database updating the password as well
                 */

                if (($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/bmp")) {
                    /*
                     * If the type of the file uploaded is jpeg, jpg or bmp
                     */

                    $dir = "profiles/" . $_SESSION['name'] . "/images";
                    /*
                     * Defines $dir with a string of the path to the User's folder
                     */
                    $files = 0;
                    $handle = opendir($dir);
                    /*
                     * Opens the directory given ($dir), that returns a resource
                     * for that directory ($handle)
                     */

                    while (($file = readdir($handle)) != FALSE) {
                        /*
                         * Defines a while cycle, that while there is files/directories to 
                         * read in that directory, it continues, otherwise, readdir
                         * will return false
                         */

                        if ($file != "." && $file != ".." && $file != "Thumbs.db") {
                            /*
                             * If the file/directory isn't any of those
                             */
                            unlink($dir . "/" . $file);
                            /*
                             * Deletes the file
                             */
                            $files++;
                            /*
                             * Increases $files by one
                             */
                        } // End of if
                    } // End of while

                    closedir($handle);
                    /*
                     * Closes the resource for the directory ($handle)
                     */
                    sleep(1);
                    /*
                     * Delays the execution of the program by one second
                     */
                    rename("profiles/" . $_SESSION['name'] . "", "profiles/$newname");
                    /*
                     * Renames the directory to the new User's name
                     */
                    move_uploaded_file($temp, "profiles/$newname/images/$mypic");
                    /*
                     * Uploads the new file to the User's folder
                     */
                    echo "You values have been updated succesfully!";
                    /*
                     * Warns the user that everything runned smoothly
                     */
                    header("Refresh:2; url=logout.php");
                    /*
                     * Redirects after 2 seconds to logout.php Page
                     */
                } // End of if (File Type)
                else {
                    echo "The picture has to be a jpeg, jpg o bmp file and have less than 10kb!";
                }
            } // End of if (Password Length)
            else {
                echo "The password needs to be larger than 4 characters!";
            }
        } // End of if (Email format)
        else {
            echo "Please type a valid email!";
        }
    } // End of if (Valid form)
    else {
        echo "Please complete the form!";
    }
} // End of if (Submit wrong)
else {
    echo "Access not allowed!";
}
?>