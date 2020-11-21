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
        $id = $_POST['id'];

        $sql = "DELETE FROM animals WHERE id={$id}";

        if($connect->query($sql) === TRUE) {
            echo "<p>Successfully deleted!</p>";
            echo "<a href='../adminPanel.php'><button type='button'>Back</button></a>";
        } else {
            echo "Error deleting Meal: " . $connect->error;
        }

        $connect->close();
    }

?>