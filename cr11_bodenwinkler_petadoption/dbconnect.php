<?php
    //this will avoid mysql_connect() deprecatiton error:
    error_reporting(~E_DEPRECATED & ~E_NOTICE);

    //OTHER WAY OF CREATING A VARIABLE IN PHP: 1. VALUE IS VARNAME, 2. VALUE IS THE VALUE TO BE STORED IN VARNAME.
    //When creating a var with the define function you need NO $ to call the variable:
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', 'cr11_bodenwinkler_petadoption');

    //Assigning Connection Keys to Variable $conn:
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    //die() echos a message and exits the script:
    if(!$conn) {
        die("Connection failed: " . mysqli_connect());
    } else {
        // echo "Success";
    }

?>