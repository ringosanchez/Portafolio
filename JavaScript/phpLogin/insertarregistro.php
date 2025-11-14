<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "SC7-2"; 


$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento']; // Change from 'Fecha de Nacimiento'
$genero = $_POST['genero'];
$Correo = $_POST['Correo'];
$Contraseña = $_POST['Contraseña'];


$Contraseña = password_hash($Contraseña, PASSWORD_DEFAULT);

// ----------------------------------------------------
// Conectar a la base de datos
// ----------------------------------------------------
$conn = new mysqli($servername, $username, $password, $dbname);

// revisar conexion
if ($conn->connect_error) {
    // si la conexion falla deten la ejecucion y muestra un mensaje de error
    die("Connection failed: " . $conn->connect_error);
}

// ----------------------------------------------------
// prepara y hace el inser a la bd 
// ----------------------------------------------------
$stmt = $conn->prepare("INSERT INTO Registro (Nombre, Apellido, fecha_nacimiento,genero, Correo, Contraseña) VALUES (?, ?, ?, ?, ?, ?)");

// "ssssss" indica los 6 parametros que se insertan
$stmt->bind_param("ssssss", $Nombre, $Apellido, $fecha_nacimiento, $genero, $Correo, $Contraseña);


if ($stmt->execute()) {
    echo "¡Registro exitoso! ¡Bienvenido, " . htmlspecialchars($Nombre) . "!";

} else {
    // revisa si el correo esta duplicado
    if ($conn->errno == 1062) {
        echo "Error: El correo electrónico ya está registrado.";
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }
}

// ----------------------------------------------------
// cierra la conexion
// ----------------------------------------------------
$stmt->close();
$conn->close();

?>