<!-- PetAdoption -->
<?php
    ob_start();
    session_start();
    require_once '../../dbconnect.php';

    //if session is not set this will redirect to login page:
    if(!isset($_SESSION['user'])) {
        header("Location: ../../index.php");
        exit;
    }
    //select logged-in users details:
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<?php
    $connect = mysqli_connect("127.0.0.1", "root", "", "cr11_bodenwinkler_petadoption");

    $search = $_POST["search"];

    $sql = "SELECT * FROM animals WHERE animalName LIKE '$search%'";

    $result = mysqli_query($connect, $sql);



    if($result->num_rows == 0){
        echo "No result!";
    } else if ($result->num_rows == 1 ) {
        $row = $result->fetch_assoc();
        echo "<div class='card mb-3 p-4' style='width:50%; text-align:center'>
                <img src=". $row['animalImage'] ." class='card-img-top p-3' style='width:100%;' alt='..'>
                <h4 class='my-3'>" . $row["animalName"] . "</h4> <hr>
                <p style='text-align:left'> <b>Description: </b>" . $row["animalDescription"] . "</p>
                <p style='text-align:left'> <b>Hobbies: </b>" . $row["animalHobbies"] . "</p>
                <p style='text-align:left'> <b>Location: </b>" . $row["animalLocation"] . "</p>
                <p style='text-align:left'> <b>Age: </b>" . $row["animalAge"] . "</p>
                <p style='text-align:left'> <b>Size: </b>" . $row["animalSize"] . "</p>
                </div>";

    } else {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach($rows as $row) {
            echo "<div class='card mb-3 col-6 p-4' style='width:50%; text-align:center'>
                <img src=". $row['animalImage'] ." class='card-img-top p-3' style='width:100%;' alt='..'>
                <h4 class='my-3'>" . $row["animalName"] . "</h4> <hr>
                <p style='text-align:left'> <b>Description: </b>" . $row["animalDescription"] . "</p>
                <p style='text-align:left'> <b>Hobbies: </b>" . $row["animalHobbies"] . "</p>
                <p style='text-align:left'> <b>Location: </b>" . $row["animalLocation"] . "</p>
                <p style='text-align:left'> <b>Age: </b>" . $row["animalAge"] . "</p>
                <p style='text-align:left'> <b>Size: </b>" . $row["animalSize"] . "</p>
                </div>";
        }
}
?>