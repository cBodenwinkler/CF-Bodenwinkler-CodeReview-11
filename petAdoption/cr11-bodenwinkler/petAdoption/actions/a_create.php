<!-- RESTAURANT -->
<?php
    ob_start();
    session_start();
    require_once '../../dbconnect.php';

    //if session is not set this will redirect to login page:
    if(!isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
        header("Location: ../../index.php");
        exit;
    }
    if(isset($_SESSION['user'])){
        header("Location: ../../home.php");
        exit;
    }

    //select logged-in users details:
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<?php
    require_once 'db_connect.php';

    if($_POST) {
        //Fetching Values from create.php and assigning them to their respective VAR:
        $aImage = $_POST['animalImage'];
        $aName = $_POST['animalName'];
        $aLocation = $_POST['animalLocation'];
        $aDescription = $_POST['animalDescription'];
        $aHobbies = $_POST['animalHobbies'];
        $aAge = $_POST['animalAge'];
        $aSize = $_POST['animalSize'];

        //SQL-Query for inserting fetched Values into DB:
        $sql = "INSERT INTO animals (animalImage, animalName, animalLocation, animalDescription, animalHobbies, animalAge, animalSize) VALUES ('$aImage','$aName','$aLocation','$aDescription','$aHobbies','$aAge','$aSize')";
        
        if($connect->query($sql) === TRUE) {
            echo "<p>Created new Pet entry for $aName</p>";
            echo "<a href='../create.php'><button type='button'>Back</button></a>";
            echo "<a href='../adminPanel.php'><button type='button'>Home</button></a>";

        } else {
            echo "Error Creating Meal $mname" . sql . ' ' . $connect->connect_error;
        }

        $connect->close();
    }
    
?>