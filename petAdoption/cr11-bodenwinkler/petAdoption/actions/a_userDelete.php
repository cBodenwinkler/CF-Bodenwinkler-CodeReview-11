<!-- Pet Adoption -->
<?php
    ob_start();
    session_start();
    require_once '../../dbconnect.php';

    if(!isset($_SESSION['superAdmin']) && !isset($_SESSION['admin']) && !isset($_SESSION['superAdmin']) ) {
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

    if($_POST) {
        $id = $_POST['userId'];

        $sql = "DELETE FROM users WHERE userId={$id}";

        if($connect->query($sql) === TRUE) {
            echo "<p>Successfully deleted!</p>";
            echo "<a href='../superAdminPanel.php'><button type='button'>Back</button></a>";
        } else {
            echo "Error deleting User: " . $connect->error;
        }

        $connect->close();
    }

?>