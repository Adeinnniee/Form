<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>

    <body>

        <?php

            // creating variable names for each field 
            $user_name = $_POST["name"];
            $user_email = $_POST["email"];
            $user_password = $_POST["password"];
            $user_phone_no = $_POST["phone-no"];
            $user_lang= $_POST["language"];
            $user_zipcode = $_POST["zip-code"];
            $about_user = $_POST["about-yourself"];


            // changing the required variables to integers
            $user_phone_no_int = intval($user_phone_no);
            $user_zipcode_int = intval($user_zipcode);


            // avoid error
            if(isset($_POST['gender'])){

                $user_gender = $_POST["gender"];

            }

            // validation
            if(empty($user_name) || empty($user_email) || empty($user_password) || empty($user_phone_no) || empty($user_gender) || $user_lang == "select-lang" || empty($user_zipcode) || empty($about_user)){

                // display error and  button to redirect the user back to the form page
                die("Error: It is required that you fill out all the fileds. Please try again.<br><br><button><a href='index.php'>Back to form</a></button>");
            }


            // special email, password combination, phone number  and zip code validation
            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){

                // display error and  button to redirect the user back to the form page
                die("Error: Invalid email format! Please try again.<br><br><button><a href='index.php'>Back to form</a></button>");
            } 

            else if(strlen($user_password) < 8 || strlen($user_name) > 20){

                // display error and  button to redirect the user back to the form page
                die("Error: Your password must be at least 8 characters long and no more than 20 characters long. Please try again.<br><br><button><a href='index.php'>Back to form</a></button>");
            }

            else if(strlen($user_phone_no) != 11){

                // display error and  button to redirect the user back to the form page
                die("Error: Your phone number should be 11 digits. Pls try again.<br><br><button><a href='index.php'>Back to form</a></button>");

            }

            else if(strlen($user_zipcode) != 6){

                // display error and  button to redirect the user back to the form page
                die("Error: Your Nigerian zip code should be 6 digits. Pls check and try again.<br><br><button><a href='index.php'>Back to form</a></button>");

            }

            else{
                // valid form
            }



            // connecting to the database
            include 'connect.php';

            // save records
            $sql = "INSERT INTO userrecords (name, email, password, `phone number`, gender, language, `zip code`, about)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?) ";

            $statement = mysqli_stmt_init($connect);

            // track error
            if(!mysqli_stmt_prepare($statement, $sql)){
                die(mysqli_error($connect));
            }

            // connect the values
            mysqli_stmt_bind_param($statement, "sssissis",
                                                    $user_name,
                                                    $user_email,
                                                    $user_password,
                                                    $user_phone_no_int,
                                                    $user_gender,
                                                    $user_lang,
                                                    $user_zipcode_int,
                                                    $about_user);

            // execute
            mysqli_stmt_execute($statement);

        ?>


        <!--a popup for registration successful-->
        <div class="pop">
            <img src="./imgs/images.png" alt="registration-successful-icon" id="success-img"><br>
            <h2>Registration completed successfully!</h2><br>  
            <button type="submit" id="ok-btn"><a href="resultDatabase.php">VIEW ALL RECORDS</a></button>
        </div> 

    </body>

</html>