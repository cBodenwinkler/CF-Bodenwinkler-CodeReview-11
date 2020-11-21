<?php
    ob_start();
    session_start();
    require_once '../../dbconnect.php';

    if(!isset($_SESSION['superAdmin']) && !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
        header("Location: ../../index.php");
        exit;
    }
    if(isset($_SESSION['user'])){
        header("Location: ../../home.php");
        exit;
    }
    if(isset($_SESSION['admin'])){
        header("Location: ../../admin.php");
        exit;
    }

    //select logged-in users details:
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['superAdmin']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<?php 
    require_once 'db_connect.php';

    if($_POST){
        $uName = $_POST['userName'];
        $uEmail = $_POST['userEmail'];
        $uStatus = $_POST['status'];

        //Assigning id from DB to variable:
        $uId = $_POST['userId'];
    
    $sql = "UPDATE users SET status='$uStatus' WHERE userId={$uId}";
    
        
   
    if($connect->query($sql) === TRUE) {
        echo "<p>Successfully Updated</p>";
        echo "<a href='../change.php?id=" .$uId."'><button type='button'>Back</button></a>";
        echo "<a href='../superAdminPanel.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error while updating record : ". $connect->error;
    }

    $connect->close();
    
}


?>