<?php
    ob_start();
    session_start();
    require_once 'dbconnect.php';

    if(!isset($_SESSION['superAdmin']) && !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
        header("Location: index.php");
        exit;
    }
    if(isset($_SESSION['user'])){
        header("Location: home.php");
        exit;
    }
    if(isset($_SESSION['admin'])){
        header("Location: admin.php");
        exit;
    }

    //select logged-in users details:
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['superAdmin']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<?php require_once 'petAdoption/actions/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div style="border:solid lightgray 3px; text-align:center; margin:20px 100px 0 100px;">
        <h4 class="p-3"> Hi <?php echo $userRow['userEmail']; ?></h4>
        <a href="petAdoption/superAdminPanel.php"><button type="submit" class="btn btn-block btn-secondary">Go To superAdmin Panel</button></a>
        <a href="logout.php?logout"><button type="submit" class="btn btn-block btn-primary">Logout</button></a>
    </div>

</body>

</html>