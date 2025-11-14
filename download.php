<?php
// 1. INICIAR LA SESIÓN
session_start();

// 2. VERIFICAR AUTENTICACIÓN
// Si el usuario NO ha iniciado sesión, detiene el script y redirige.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Es mejor redirigir al login o a la página de inicio
    header('Location: index2.php'); 
    exit;
}

// 3. PROCESAR LA DESCARGA (SOLO SI EL USUARIO ESTÁ AUTENTICADO)
if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']);
    
    // Ruta segura: Define el directorio donde están tus archivos. 
    $filepath = 'documentos/' . $fileName; 

    // Opcional: Define los tipos de archivo permitidos por seguridad
    $allowed_extensions = array('pdf', 'rar', 'zip');
    $file_extension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

    if (file_exists($filepath) && in_array($file_extension, $allowed_extensions)) {
        
        // Desactivar el almacenamiento en caché
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        
        // Limpiar buffer y enviar archivo
        ob_clean();
        flush();
        readfile($filepath);
        exit;
    } else {
        // Archivo no encontrado o tipo de archivo no permitido
        die("Error: El archivo solicitado no existe o no está permitido.");
    }
} else {
    // Si no se proporcionó el parámetro 'file'
    header('Location: index.php');
    exit;
}
?>