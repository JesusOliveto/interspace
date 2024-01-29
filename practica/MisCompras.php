<?php
include 'database.php';
session_start();
define ("KEY_TOKEN","APR.wqc-354*");
$db = new Database();
$con = $db->conectar();

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Obtener los datos del formulario
    $nombre = $_POST['nombrepaquete'];
    $precio = $_POST['precio'];
    $pasajeros = $_POST['pasaj'];
    $preciototal = $_POST['preciototal'];

    // Conecta a la base de datos (reemplaza con tus propias credenciales)
    $host = "localhost";
    $dbname = "test";
    $username = "root";
    $password = "";
    $charset = "utf8";

    $conexion = new mysqli($host, $username, $password, $dbname);
    if ($conexion->connect_error) {
        die('Error en la conexión: ' . $conexion->connect_error);
    }

    
    // Obtén el ID de usuario desde la sesión (reemplaza con tu lógica de autenticación)
    $idUsuario = $_SESSION["id_usuario"];



    $sql = "SELECT * FROM paquetes WHERE nombre = '$nombre'";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        $userp = $result->fetch_assoc();
        // La información de inicio de sesión es correcta, establecer una variable de sesión

        
        $permisos = isset($user['permisos']) ? $user['permisos'] : 0;
        $_SESSION["id_paquete"] = isset($userp['id']) ;

        }
    // Itera sobre los elementos del carrito y guarda en la base de datos

    $idPaquete = $item["id"];
    $costo = $item["precio"];
    $cantidad = $item["cantidad"];

    // Inserta el registro en la tabla de la base de datos (reemplaza con tu propia consulta)
    $sql = "INSERT INTO tu_tabla (id_paquete, id_usuario, costo, cantidad) VALUES ('$idPaquete', '$idUsuario', '$precio', '$cantidad')";

    if ($conexion->query($sql) !== TRUE) {
        echo "Error al insertar en la base de datos: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();

    // Redirige a la página de compras realizadas o donde prefieras
    header("Location: MisCompras.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Compras</title>
    <link href="MisCompras.css" rel="stylesheet" type="text/css"><!--Conexion con css-->
    <link rel="icon" type="image/png" href="Imagenes\logo4m.png">
</head>
<body>
    <img src="Imagenes\MisCompras.png" alt="Logo de Mis compras"><!--Logo--> <br><br><br><br>
    <div class="separador"></div><!--La linea que separa-->

    <form method="post" action="MisCompras.php">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
    </form>

    <h1>Compras</h1>
    <h2> - Paquetes</h2>
    <ul>
        <li>Paquete 1 - $50.000 - Frecuencia de compra: <span id="frecuencia1"></span></li>
        <li>Paquete 2 - $80.000 - Frecuencia de compra: <span id="frecuencia2"></span></li>
        <li>Paquete 3 - $100.000 - Frecuencia de compra: <span id="frecuencia3"></span></li>
        <li>Paquete 4 - $120.000 - Frecuencia de compra: <span id="frecuencia4"></span></li>
        <li>Paquete 5 - $140.000 - Frecuencia de compra: <span id="frecuencia5"></span></li>
        <li>Paquete 6 - $160.000 - Frecuencia de compra: <span id="frecuencia6"></span></li>
        <li>Paquete 7 - $180.000 - Frecuencia de compra: <span id="frecuencia7"></span></li>
        <li>Paquete 8 - $200.000 - Frecuencia de compra: <span id="frecuencia8"></span></li>
    </ul>
    
    <h2> - Destacados</h2>
    <ul> 
        <li>Destacado 1 - $100.000 - Frecuencia de compra:</li>
        <li>Destacado 2 - $150.000 - Frecuencia de compra:</li>
        <li>Destacado 3 - $200.000 - Frecuencia de compra:</li>
    </ul>

        <!--El boton "Volver" vuelve al index-->
        <a href="Index.php" style="text-decoration: none;">
            <button>
               <span>Volver</span>
            </button>
        </a> 
        <a href="https://forms.gle/4BeVDo457iXrmuCf6" class="opinion-link">Dejanos tu opinión</a>
        <a href="logout.php">Cerrar Sesión</a>
</body>
</html>