<?php
session_start();

// -----------------------------------------------------
// 1. CONFIGURACIÓN DE LA BASE DE DATOS
// -----------------------------------------------------

$servername = "localhost";
$username = "root";
$password = "";
$bd = "SC7-2"; // Tu base de datos

// 2. CONEXIÓN A LA BASE DE DATOS
$conn = new mysqli($servername, $username, $password, $bd);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// -----------------------------------------------------
// 3. PROCESAMIENTO DEL FORMULARIO
// -----------------------------------------------------

// Obtener datos del formulario (Asumimos que el input del correo es name="usuario")
$input_correo = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$contrasena_input = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

// 4. PREPARAR LA CONSULTA (Busca al usuario solo por la columna 'Correo')
// Se seleccionan las columnas id, Nombre, y Contraseña de la tabla 'registro'
$stmt = $conn->prepare("SELECT id, Nombre, Correo, Contraseña FROM registro WHERE Correo = ?");
$stmt->bind_param("s", $input_correo); 
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    // Si se encuentra el correo, obtenemos los resultados
    $stmt->bind_result($id, $db_nombre, $db_correo, $hashed_password);
    $stmt->fetch();
    
    // 5. VERIFICAR LA CONTRASEÑA CIFRADA (La columna es 'Contraseña')
    // **IMPORTANTE: La columna 'Contraseña' DEBE contener el hash de la contraseña.**
    if (password_verify($contrasena_input, $hashed_password)) {
        
        // La contraseña es correcta: INICIO DE SESIÓN EXITOSO
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $db_nombre; // Guardamos el nombre del usuario
        
        // Redirigir al usuario a la página principal
        header('Location: index.php');
        exit;
        
    } else {
        // Contraseña incorrecta
        $error_message = "Correo o contraseña incorrectos.";
        header('Location: index2.php?login_error=' . urlencode($error_message));
        exit;
    }
} else {
    // Correo no encontrado
    $error_message = "Correo o contraseña incorrectos.";
    header('Location: index2.php?login_error=' . urlencode($error_message));
    exit;
}

// Cerrar la consulta y la conexión
$stmt->close();
$conn->close();

?>