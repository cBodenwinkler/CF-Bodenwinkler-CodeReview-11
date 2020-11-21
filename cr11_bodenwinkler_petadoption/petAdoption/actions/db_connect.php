<!-- PetAdoption -->
<?php
    // Set Variables for DB Data:
    $localhost = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "cr11_bodenwinkler_petadoption";

    //create connection:
    $connect = new mysqli($localhost, $username, $password, $dbname);

    //check connection:
    if(!$connect){
        echo "Error";
    } else {
        // echo "Success";
    }

?>