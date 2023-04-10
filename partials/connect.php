<?php
    $servername="localhost";
    $username_db="u890919305_deepak";
    $password="Deepaksingh123";
    $database="u890919305_housingadda"; //only for vds branch change here before merging to main :)
    // $database="housingadda";

    $conn= mysqli_connect($servername,$username_db,$password,$database);
    
    if (! $conn ) {
        die('Sorry we failed to connect!');
    }
    global $conn;


?>