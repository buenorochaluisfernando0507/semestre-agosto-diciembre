<?php
//  Datos para conectar con XAMPP
$servidor = "localhost";
$usuario  = "root";     // Usuario por defecto de XAMPP
$password = "";         // En XAMPP la contraseña va vacía
$bd       = "dior_db";  // Nombre de la base de datos

//  Crear la conexión
$conexion = mysqli_connect($servidor, $usuario, $password, $bd);

// Verificar si hay un error de conexión
if (!$conexion) {
    die("Error al conectar con MySQL: " . mysqli_connect_error());
}
//  Recibir los datos enviados por el formulario.html
$producto  = $_POST['producto'];
$nombre    = $_POST['nombre'];
$correo    = $_POST['correo'];
$direccion = $_POST['direccion'];
$metodo    = $_POST['metodo'];

//  Consulta SQL para guardar los datos en la tabla 'pedidos'
$sql = "INSERT INTO pedidos (producto, nombre, correo, direccion, metodo) 
        VALUES ('$producto', '$nombre', '$correo', '$direccion', '$metodo')";

//  Ejecutar la consulta y mostrar mensaje
if (mysqli_query($conexion, $sql)) {
    // Imprime la apertura de un contenedor HTML con diseño centrado
    echo "<div style='text-align:center; padding:30px; font-family:Arial;'>";
    // Muestra el título principal de confirmación en HTML
    echo "<h1>¡Registro Guardado con Éxito! 🎉</h1>"; 
    // Muestra el nombre del cliente limpiando el texto por seguridad
    echo "<p>Gracias por tu compra, <b>" . htmlspecialchars($nombre) . "</b>.</p>";
    // Muestra el nombre del perfume guardado en la base de datos
    echo "<p>Tu pedido de <b>" . htmlspecialchars($producto) . "</b> fue guardado en la base de datos.</p>";
    // Genera un botón en HTML con enlace para regresar a la tienda
    echo "<a href='perfumes.html' style='background:#000; color:#fff; padding:10px 20px; text-decoration:none;'>Volver a la Tienda</a>";
    // Cierra el contenedor HTML
    echo "</div>";
} else {
    // Si hubo un fallo en la base de datos, muestra el mensaje de error de MySQL
    echo "Error al guardar el registro: " . mysqli_error($conexion);
}

//  Cerrar la conexión
mysqli_close($conexion);
?>
