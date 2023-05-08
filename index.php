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

        <div class="container">

            <!--My passport-->
            <img src="./img/20200726_111051-removebg-preview.png" alt="My Passport" id="my-logo">
            <br><br>

            <h1>Register</h1>

            <p id="error-message"></p>

            <!--Form-->
            <form action="process.php" method="post" id="form" onsubmit = "return validate()">

                <label id="n-label">Name:
                    <input name="name" type="text" placeholder="your name" id="name">
                </label>
                <br>

                <label id="e-label">Email:
                    <input name="email" type="email" placeholder="your email" id="email">
                </label>
                <br>

                <label id="p-label">Password:
                    <input name="password" type="password" id="password" id="password">
                </label>
                <br>

                <label id="p-no-label">Phone Number:
                    <input name="phone-no" type="number" id="phone-no">
                </label>
                <br>

                <!--Pick only one-->
                <div class="gender">
                    <label>Gender:</label>
                    <label for="male" id="male-label">Male:
                        <input name="gender" type="radio" value="male" class="btns" id="male">
                    </label>
                    <label for="female">Female:
                        <input name="gender" type="radio" value="female" class="btns" id="female">
                    </label>
                    <label for="other">Other:
                        <input name="gender" type="radio" value="other" class="btns" id="others">
                    </label>
                </div>
                <br>

                <!--Select dropdown from mysql database, langauges table-->
                <label for="language" id="lang-label">Language:
                    <select name="language" id="lang">
                        <option value="select-lang">Select Language</option>
                        <?php
                            include 'connect.php';
                            $fetch_langs = mysqli_query($connect, "SELECT * from `languages`");
                                while($row = mysqli_fetch_array($fetch_langs)){
                        ?>

                                <option>
                                    <?php echo $row['Languages']; ?>
                                </option>

                                <?php }
                                    // close the database connection
                                    mysqli_close($connect);
                                ?>
                    </select>
                </label>
                <br>


                <label id="c-label">Zip Code:
                    <input name="zip-code" type="number" id="zip-code">
                </label>
                <br>

                <label id="a-label">About:
                    <input name="about-yourself" type="text" placeholder="write about yourself..." id="about">
                </label>
                <br>

                <button type="submit" id="submit-btn" onclick="validate()">Register</button>

            </form>
        </div>

        
    <script src="script.js"></script>
    </body>

</html>