<?php 
    ob_start();
    session_start();
    require_once 'dbconnect.php';

    
    if(isset($_SESSION['user'])!="") {
        header("Location: index.php");
        exit;
    }

    $error = false;

    if(isset($_POST['btn-login'])) {

        //prevent sql injections / clear user invalid inputs
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

        if(empty($email)){
            $error = true;
            $emailError = "Please enter your email address.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $passError = "Please enter valid email address.";
        }

        if(empty($pass)) {
            $error = true;
            $passError = "Please enter your password.";
        }

        // If there is no error continue to login:
        if(!$error){
            $password = hash('sha256', $pass); //hashing PW
            
            $res = mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'"); //REMOVED: userId, userName, userPass
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $count = mysqli_num_rows($res); // if username/pass is correct it returns must be 1 row

            if($count == 1 && $row['userPass']==$password ) {
                if($row['status'] == 'superAdmin') {
                    $_SESSION["superAdmin"] = $row['userId'];
                    header("Location: superAdmin.php");
                } elseif($row['status'] == 'admin') {
                    $_SESSION["admin"] = $row['userId'];
                    header("Location: admin.php");
                } else {
                    $_SESSION['user'] = $row['userId'];
                    header("Location: home.php");
                }
            } else {
                $errMSG = "Incorrect Credentials, Try again ...";
            }
        }
    }
?>

<!-- HTML PART OF LOGIN FORM ------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>

    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
        table, td, th, tr {
            border: solid black 1px;
        }
    </style>
</head>
<body>
    <header>
        <ul class="nav justify-content-center bg-dark">
            <li class="nav-item">
                <a class="nav-link active" href="register.php" style="color:white">Registration</a>
            </li>
        </ul>
    </header>



    <div style="border:solid lightgray 3px; text-align:center; margin:20px 100px 0 100px;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2>Sign In:</h2>
            <hr>
            <table class="ml-5">
                <tr>
                    <th class="py-3 px-5">User / Admin / superAdmin</th>
                    <th class="py-3 px-5">Passwords</th>
                </tr>
                <tr>
                    <td>test@user.com</td>
                    <td>test123</td>
                </tr>
                <tr>
                    <td>test@admin.com</td>
                    <td>test123</td>
                </tr>
                <tr>
                    <td>test@superadmin.com</td>
                    <td>test123</td>
                </tr>
            </table>

            <?php 
                if (isset($errMSG)) {
                    echo $errMSG; ?>
                    
            <?php
                }
            ?>

            <!-- INPUT FORM FOR LOGIN FUNCTION -->
            <div style="margin:20px 50px 20px 50px">
                <input type="email" name="email" class="form-control" placeholder="Your Email" maxlength="50" value="<?php echo $email ?>" />
                <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="20" value="<?php echo $name ?>" />
            </div>

            <!-- SUBMIT BUTTON FOR LOGIN FORM -->
            <div style="margin:20px 50px 20px 50px">
                <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            <!-- Redirect to Registration Form -->
            <div style="margin:20px 150px 20px 150px">
                <a href="register.php"><button type="button" class="btn btn-block btn-secondary"> Registration Form </button></a>
            </div>

            <!-- Output Error MSG when input wasn't sufficient -->
            <h4 class="text-danger"> <?php echo $emailError; ?> </h4>
            <h4 class="text-danger"> <?php echo $passError; ?> </h4>

        
        </form>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>