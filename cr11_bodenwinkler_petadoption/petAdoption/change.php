<?php
    ob_start();
    session_start();
    require_once '../dbconnect.php';

    if(!isset($_SESSION['superAdmin']) && !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
        header("Location: ../index.php");
        exit;
    }
    if(isset($_SESSION['user'])){
        header("Location: ../home.php");
        exit;
    }
    if(isset($_SESSION['admin'])){
        header("Location: ../admin.php");
        exit;
    }

    //select logged-in users details:
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['superAdmin']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<?php
    require_once 'actions/db_connect.php';

    if($_GET['id']){
        $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE userId = {$id}";
    $result = $connect->query($sql);

    $data = $result->fetch_assoc();

    $connect->close();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Admin - PetAdoption</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    img {
        width: 100px;
    }

    table,
    td,
    th {
        /* text-align: center; */
    }

    td {
        height: 50px;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <!-- HEADER NAVBAR----------------------------------------------------------------------------------------------------------------------------------------- -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="superAdminPanel.php">SuperAdminPanel</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../superAdmin.php">Sign out</a>
            </li>
        </ul>
    </nav>

    <!-- SIDEBAR-------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="superAdminPanel.php">
                                <span data-feather="layers"></span>
                                Change User State
                            </a>
                        </li>

                </div>
            </nav>

            <!-- MAIN CONTENT ------------------------------------------------------------------------------------------------------------------------------------------- -->
            <h3 class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-3">Edit Entry</h3>
            <p class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-3">Set Status to <b>user</b> or <b>admin</b> </p>
            <div class="table-responsive d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <form action="actions/a_change.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <h5>User Status:</h5>
                            </td>
                            <td><input value="<?php echo $data['status'] ?>" size="50" type="text" name="status" placeholder="user, admin, superAdmin"></td>
                        </tr>
                    </table>

                    <input type="hidden" name="userId" value="<?php echo $data['userId'] ?>" />
                    <h5 style="margin-top:50px">Change Entry:</h5>
                    <button type="submit" class="btn btn-block btn-primary mt-1">Submit Change</button>
                    <a href="superAdminPanel.php"> <button type="button"
                            class="btn btn-block btn-secondary mt-1">BACK</button> </a>
                </form>



            </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>

<?php
    }
?>