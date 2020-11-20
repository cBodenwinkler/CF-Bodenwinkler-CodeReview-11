<?php
    ob_start();
    session_start();
    require_once 'dbconnect.php';

    //if session is not set this will redirect to login page:
    if(!isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
        header("Location: index.php");
        exit;
    }
    if(isset($_SESSION['user'])){
        header("Location: home.php");
        exit;
    }

    //select logged-in users details:
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>

    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div style="border:solid lightgray 3px; text-align:center; margin:20px 100px 0 100px;">
        <h4 class="p-3"> Hi <?php echo $userRow['userEmail']; ?></h4>
        <a href="petAdoption/adminPanel.php"><button type="submit" class="btn btn-block btn-secondary">Go To Admin Panel</button></a>
        <a href="logout.php?logout"><button type="submit" class="btn btn-block btn-primary">Logout</button></a>
    </div>
</body>
</html>