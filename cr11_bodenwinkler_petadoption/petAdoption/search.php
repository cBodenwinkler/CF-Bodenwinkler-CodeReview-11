<!-- PetAdoption -->
<?php
    ob_start();
    session_start();
    require_once '../dbconnect.php';

    //if session is not set this will redirect to login page:
    if(!isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit;
    }
    //select logged-in users details:
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<?php require_once 'actions/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Store | Search</title>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <header>
        <ul class="nav justify-content-center bg-dark">
            <li class="nav-item">
                <a class="nav-link active" href="home.php" style="color:white;font-size:1.5rem">All Animals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="general.php" style="color:white;font-size:1.5rem">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="senior.php" style="color:white;font-size:1.5rem">Senior</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="search.php" style="color:white;font-size:1.5rem">Search</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" style="color:red" href="../home.php"><button type="submit" class="btn btn-block btn-danger">Sign out</button></a>
            </li>
        </ul>
    </header>



    <form class="container mt-5" style="text-align:center">
        <h5>Search For Animal Name</h5>
        <input id="search" name="search" type="text" size="70">

        <!-- <input type="submit" value="Send"/> -->
    </form>
    <div class="container">
        <p class="container mt-5 row" id="result"></p>
    </div>

    <script>
    var request; 

    $("#search").keyup(function(event){
        event.preventDefault();

        if(request) {
            request.abort();
        }

        var $form = $(this);

        var $inputs = $form.find ("input, select, button, textarea");

        var serializedData = $form.serialize();

        $inputs.prop("disabled", true);

        request = $.ajax({
            url: "actions/a_search.php",
            type: "POST",
            data: serializedData
        });

        request.done(function(response, textStatus, jqXHR){
            document.getElementById("result").innerHTML = response;
        });

        request.fail(function(jqXHR, textStatus, errorThrown){
            console.error(
                "The following error occurred: "+textStatus, errorThrown
            );
        });

        request.always(function() {
            $inputs.prop("disabled", false);
        });
    })
</script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>