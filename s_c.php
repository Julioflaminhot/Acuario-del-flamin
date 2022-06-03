<?php
require 'config/database.php';
?>

<?php
$message = 'error, contacte al administrador';
if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['sexo']) && !empty($_POST['correo']) && !empty($_POST['poblacion'])) {
    $sql = "INSERT INTO Contacto (nombre, apellido, sexo, correo, descripcion, poblacion) VALUES (:nombre, :apellido, :sexo, :correo, :descripcion, :poblacion)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);
    $stmt->bindParam(':poblacion', $_POST['poblacion']);
    if ($stmt->execute()) {
        echo '
        <script language="Javascript">
        alert("Enviaste un correo, pronto nos pondremos en contacto!");
        location.href="index.html";
        
        </script>';
    } else {
        echo $message = '';
    }
}
?>