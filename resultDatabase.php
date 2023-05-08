<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database Table</title>
        <link rel="stylesheet" href="styleTable.css?v=<?php echo time(); ?>">
    </head>


    <body>

        <!--Search bar-->
        <form action="resultDatabase.php" method="post">
            <label for="search-bar">
                <input type="text" name="search" id="search" placeholder="Search here...">
                <button type="submit" name="filter" id="search-btn">Search</button>
            </label>
        </form>


        <?php

            // filter
            if(isset($_POST['search'])){

                // filter the table according to search
                $value_to_search = $_POST['search'];
                $sql_table = "SELECT * FROM `userrecords` WHERE CONCAT(`id`, `name`, `email`, `password`, `phone number`, `gender`, `language`, `zip code`, `About`) LIKE '%".$value_to_search."%'";
                $result_table =filter($sql_table);

            } else{

                // fetch the entire table
                $sql_table = "SELECT * from `userrecords`";
                $result_table =filter($sql_table);
                
            }

            // filter function
            function filter($table){

                // connecting to the database
                include 'connect.php';

                $filter =mysqli_query($connect, $table);
                return $filter;
            }

        ?>


        <!--Table to be displayed from mySQL database-->
        <h1>ALL RECORDS</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone number</th>
                <th>Gender</th>
                <th>Language</th>
                <th>Zip code</th>
                <th>About User</th>
            </tr>

            <tr>
                
                <?php

                    // connecting to the database
                    include 'connect.php';

                    if(mysqli_num_rows($result_table) > 0){
                            while ($rows = mysqli_fetch_array($result_table)){
                                echo "<tr><td>" . $rows['id'] . "</td> <td>" . $rows['name'] . "</td> <td>" . $rows['email'] . "</td> <td>" . $rows['password'] . "</td> <td>" . $rows['phone number'] . "</td> <td>" . $rows['gender'] . "</td> <td>" . $rows['language'] . "</td> <td>" . $rows['zip code'] . "</td> <td>" . $rows['About'];
                            }
                            
                    }
                    else{
                        echo "<h2>No result found.<h2><br>";
                    }

                        // close the database connection
                    mysqli_close($connect);

                ?>
            </tr>

        </table>

    </body>

</html>