<?php
require 'config/database.php';
?>

<?php
$message = '';
if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['sexo']) && !empty($_POST['correo']) && !empty($_POST['poblacion'])) {
    $sql = "INSERT INTO Usuarios (nombre, apellido, sexo, correo, poblacion) VALUES (:nombre, :apellido, :sexo, :correo, :poblacion)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':poblacion', $_POST['poblacion']);
    if ($stmt->execute()) {
        echo '

        <script language="Javascript">
        alert("Cuenta creada con exito, por favor inicie sesion");
        location.href="login.php";
        
        </script>';
    } else {
        $message = '';
    }
}
?>