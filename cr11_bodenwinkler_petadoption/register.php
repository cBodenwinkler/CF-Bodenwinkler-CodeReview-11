<!-- LOGIN FUNCTIONALITY -->
<?php
    //ob_start(); -> Start remembering everything that would be outputted, but don't quite do anything yet.
    ob_start();
    //session_start(); -> Starts the session for a user and can, in combination with DB remember what user did:
    //can start a new session or continue a previous session:
    session_start();

    // if (isset($_SESSION['user'])!="") {
    //     header("Location: index.php"); //redirects to home.php
    // }

    include_once 'dbconnect.php';
    $error = false;
    if(isset($_POST['btn-signup'])) {
        //----------SANITIZE USER INPUT TO PREVENT SQL INJECTION----------
        //trim() removes whitespace from string
        //strip_tags() removes strips string off HTML code
        //htmlspecialchars() converts special html code to entity number like & becomes &amp;, " becomes %quot;

        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

        //basic name validation:
        if(empty($name)) {
            $error = true;
            $nameError = "Please enter your full name.";
        } else if (strlen($name) < 3) {
            $error = true;
            $nameError = "Name must contain alphabets and space.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) { //!preg_match() -> if it does NOT match the set it will throw error
            $error = true;
            $nameError = "Name must contain alphabets and space.";
        }

        //basic email validation:
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Please enter valid email address.";
        } else {
            //checks if email exists or not
            $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            if($count!=0){
                $error = true;
                $emailError = "Provided Email is already in use.";
            }
        }

        //password validation:
        if(empty($pass)){
            $error = true;
            $passError = "Please enter password.";
        } else if(strlen($pass) < 6) {
            $error = true;
            $passError = "Password must have at least 6 Characters.";
        }

        //password hashing for security:
        $password = hash('sha256', $pass);


        //CONTINUE to sign up when there is no Error:
        if(!$error) {
            $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
            $res = mysqli_query($conn,$query);
            
            if($res) {
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                unset($name);
                unset($email);
                unset($pass);
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again";
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
</head>
<body>
    <header>
        <ul class="nav justify-content-center bg-dark">
            <li class="nav-item">
                <a class="nav-link active" href="index.php" style="color:white">LOG - IN</a>
            </li>
        </ul>
    </header>


    <div style="border:solid lightgray 3px; text-align:center; margin:50px 100px 0 100px;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2 class="pt-3">Registration Form</h2>

            <?php 
                if (isset($errMSG)) {
            ?>
                    <div class="alert alert-<?php echo $errTyp ?>" >
                        <?php echo $errMSG; ?>
                    </div>
            <?php
                }
            ?>

            <!-- INPUT FORM FOR LOGIN FUNCTION -->
            <div style="margin:20px 50px 20px 50px">
                <input type="text" name="name" class="form-control" placeholder="Enter Full Name" maxlength="50" value="<?php echo $name ?>" />
                <input type="email" name="email" class="form-control mt-2" placeholder="Enter Your Email" maxlength="50" value="<?php echo $email ?>" />
                <input type="password" name="pass" class="form-control mt-2" placeholder="Enter Password" maxlength="20" value="<?php echo $name ?>" />
            </div>

            <!-- SUBMIT BUTTON FOR LOGIN FORM -->
            <div style="margin:20px 50px 20px 50px">
                <button type="submit" class="btn btn-block  btn-outline-primary" name="btn-signup">Register New User</button>
            </div>
            <!-- Redirect to Homepage -->
            <div style="margin:20px 150px 20px 150px">
                <a href="index.php"><button type="button" class="btn btn-block btn-secondary"> Sign In Here... </button></a>
            </div>

            <!-- Output Error MSG when input wasn't sufficient -->
            <h4 class="text-danger"> <?php echo $nameError; ?> </h4>
            <h4 class="text-danger"> <?php echo $emailError; ?> </h4>
            <h4 class="text-danger"> <?php echo $passError; ?> </h4>

        
        </form>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>