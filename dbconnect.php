<?php
$severname = "localhost";
$username = "root";
$pass = "";
$dbname = "carBook";


// connection a la base de donne

$connect = mysqli_connect($severname,$username,$pass,$dbname);

if (!$connect) {
    die("connexion failed :" . mysqli_connect_error());
}

// echo "connexion reussie";



?>