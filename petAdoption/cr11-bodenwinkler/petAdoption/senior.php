<?php require_once 'actions/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Senior Animals</title>
</head>

<body>
    <header>
        <ul class="nav justify-content-center bg-dark">
            <li class="nav-item">
                <a class="nav-link active" href="home.php" style="color:white">All Animals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="general.php" style="color:white">Animal Sizes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="senior.php" style="color:white">Senior Animals</a>
            </li>
        </ul>
    </header>


    <div class="container my-5">
        <div class="row">
                <?php 
                    $sql = "SELECT * FROM animals WHERE animalSize = 'senior'";

                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            echo    "<div class='card col-4 mt-3' style='width: 18rem;'>
                                        <img src=". $row['animalImage'] ." class='card-img-top p-3' alt='..'>
                                        <div class='card-body' style='text-align:center;'>
                                            <h3 class='card-title'>". $row['animalName']."</h3>
                                            <p class='card-text'>".$row['animalDescription']."</p>
                                        </div>
                                        <ul class='list-group list-group-flush'>
                                            <li class='list-group-item'><h5>Hobbies: </h5>".$row['animalHobbies']."</li>
                                            <li class='list-group-item'><h5>Location: </h5>".$row['animalLocation']."</li>
                                            <li class='list-group-item'><h5>Age: </h5>".$row['animalAge']."</li>
                                            <li class='list-group-item'><h5>Size: </h5>".$row['animalSize']."</li>
                                        </ul>
                                    </div>";

                        }
                    } else {
                        echo "<p>No Data Available";
                    }
                ?>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>