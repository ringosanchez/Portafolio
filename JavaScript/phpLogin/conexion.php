<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "SC7-2"; // <-- ERROR 1: Missing semicolon (;) here

// crear conexion
$conn = new mysqli($servername, $username, $password, $bd);

if ($conn->connect_error){
    // ERROR 2: The "die" function handles both output and script termination, but it's good practice to close the PHP tag for readability or ensure no accidental trailing spaces.
    die("Conexion fallida: " . $conn->connect_error);
}

// ERROR 3: Missing semicolon (;) here
echo "Conexion con exito";
?>