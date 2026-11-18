<?php
include("conexion.php");
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $email = $conexion->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

    if ($conexion->query($sql) === TRUE) {
        $mensaje = "<p style='color: #00ff00;'>¡Usuario registrado con éxito en la BD!</p>";
    } else {
        $mensaje = "<p style='color: #ff4444;'>Error en SQL: " . $conexion->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

    <div class="box">
        <h2>Registro </h2>
        <?php echo $mensaje; ?>
        <form method="POST" action="registro.php">
            <input type="text" name="nombre" placeholder="Nombre completo" required><br>
            <input type="email" name="email" placeholder="Correo electrónico" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit">Guardar en BD</button>
        </form>

    </div>

</body>
</html>