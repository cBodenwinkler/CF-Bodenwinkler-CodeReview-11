<?php
    // ob_start();
    // session_start();
    // require_once '../../dbconnect.php';

    // //if session is not set this will redirect to login page:
    // if(!isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
    //     header("Location: ../../index.php");
    //     exit;
    // }
    // if(isset($_SESSION['user'])){
    //     header("Location: ../../home.php");
    //     exit;
    // }

    // //select logged-in users details:
    // $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
    // $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<?php 
    require_once 'db_connect.php';

    if($_POST){
        $aImage = $_POST['animalImage'];
        $aName = $_POST['animalName'];
        $aLocation = $_POST['animalLocation'];
        $aDescription = $_POST['animalDescription'];
        $aHobbies = $_POST['animalHobbies'];
        $aAge = $_POST['animalAge'];
        $aSize = $_POST['animalSize'];

        //Assigning id from DB to variable:
        $id = $_POST['id'];

    $sql = "UPDATE animals SET animalImage='$aImage', animalName='$aName', animalLocation='$aLocation', animalDescription='$aDescription', animalHobbies='$aHobbies', animalAge='$aAge', animalSize='$aSize' WHERE id={$id}";

    if($connect->query($sql) === TRUE) {
        echo "<p>Successfully Updated</p>";
        echo "<a href='../update.php?id=" .$id."'><button type='button'>Back</button></a>";
        echo "<a href='../adminPanel.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error while updating record : ". $connect->error;
    }

    $connect->close();
    
}


?>