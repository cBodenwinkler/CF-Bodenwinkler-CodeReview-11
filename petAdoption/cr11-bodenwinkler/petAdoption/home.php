<!-- PetAdoption -->
<?php
    // ob_start();
    // session_start();
    // require_once '../dbconnect.php';

    // //if session is not set this will redirect to login page:
    // if(!isset($_SESSION['user'])) {
    //     header("Location: ../index.php");
    //     exit;
    // }
    // //select logged-in users details:
    // $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    // $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<?php require_once 'actions/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>

    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
    </style>
</head>
<body>
    <div style="border:solid black 1px;border-radius:50px;padding:50px;margin:50px 150px 150px 150px;text-align:center;background-color:lightgray">
        <!-- <a href="create.php">
            <button style="width:300px;height:50px;color:white;background-color:gray;font-size:2em;border-radius:50px;margin:0 0 20px 0" type="button"> Add Meal </button>
        </a> -->
        <table style="background-color:white">
            <thead style="background-color:gray; color:white">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Ingredients</th>
                    <th>Allergens</th>
                    <!-- <th>Edit Entries</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM meals WHERE active = 0";
                    $result = $connect->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo    "<tr>
                                        <td><img src=".$row['meal_image']."> </td>
                                        <td>" .$row['meal_name']. "</td>
                                        <td>" .$row['meal_price']. "</td>
                                        <td>" .$row['meal_ingredients']. "</td>
                                        <td>" .$row['meal_allergens']. "</td>
                                        <!-- <td>
                                            <a href='update.php?id=" .$row['id']."'><button class='btn btn-secondary' type='button'>Edit</button></a>
                                            <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger' type='button'>Delete</button></a>
                                        </td> -->
                                    </tr>";
                        } 
                    } else {
                        echo "<tr><td>NO DATA AVAILABLE</td></tr>";
                    }


                ?>
            </tbody>
        </table>

        <a href="../home.php"> <button class="btn btn-block btn-danger mt-5" type="submit">Logout</button> </a>
    </div>
</body>
</html>