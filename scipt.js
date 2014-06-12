
            function register() {
                /*
                 * Defines the function register () that it is called later on the form
                 */

                var x = new Array(); // Defines a new array with the name "x"
                x[0] = document.getElementById('name').value;
                x[1] = document.getElementById('lname').value;
                x[2] = document.getElementById('email').value;
                x[3] = document.getElementById('password').value;
                x[4] = document.getElementById('cpassword').value;
                /*
                 * These lines define the array with the values given in the form
                 */


                var h = new Array(); // Defines a new array with the name "h"
                h[0] = "<span style='color:red'>Please type your name!</span>";
                h[1] = "<span style='color:red'>Please type your last name!</span>";
                h[2] = "<span style='color:red'>Please type your email!</span>";
                h[3] = "<span style='color:red'>Please type your password!</span>";
                h[4] = "<span style='color:red'>Please confirm your password!</span>";
                /*
                 * These lines define the array with strings colored red
                 */


                var divs = new Array("mname", "mlname", "memail", "mpassword", "mcpassword");
                /*
                 * Defines a new array called "divs" with the strings "mname", etc
                 * Same as:
                 * var divs = new Array();
                 * divs[0] = "mname";
                 * divs[1] = "mlname";
                 * , etc...
                 */


                for (i in x) {
                    /*
                     * Defines a for cycle, that will iterate the values of "x"
                     */

                    var error = h[i];
                    /*
                     * Defines error as the correct message for the field
                     * Example: If the error is in Name field, then 
                     * error = "<span style='color:red'>Please type your name!</span>";
                     */

                    var div = divs[i];
                    /*
                     * Does the same as the variable error but with the divisions
                     */

                    if (x[i] == "") {
                        // If the field is blank
                        document.getElementById(div).innerHTML = error;
                        // Define the value of div as the message error
                    } else {
                        // If the field is not blank
                        document.getElementById(div).innerHTML = "OK!";
                        // Define the value of div as "OK!"
                    }

                } // End of for

            } // End of function register ()


            function pass() {
                /*
                 * Defines the function pass() that will be called in the form.
                 * This function will check the Password and Confirm Password fields
                 * If they are equal, then you can proceed
                 * Otherwise, it will warn the user that the passwords don't match
                 */

                var first = document.getElementById('password').value;
                // Defines first as the value of the field password
                var second = document.getElementById('cpassword').value;
                // Defines second as the value of the field cpassword

                if (second == first) {
                    // If the passwords match
                    document.getElementById('mcpassword').innerHTML = "OK!";
                    // Warns the user that the passwords are fine
                } else {
                    // If the passwords don't match
                    document.getElementById('mcpassword').innerHTML = "<span style='color: red'>Your passwords don't match!</span>";
                    // Warns the user that they don't match and should change them
                }

            }
