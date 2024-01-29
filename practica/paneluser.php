<?php
include 'database.php';
session_start();
define ("KEY_TOKEN","APR.wqc-354*");
$db = new Database();
$con = $db->conectar();

// Verificar si hay una sesión de usuario iniciada
if (isset($_SESSION['email']) && !empty($_SESSION['email']) && $_SESSION['permisos'] == 0) {
    $correo = $_SESSION['email'];

    // Preparar y ejecutar la consulta SQL
    $sql = $con->prepare("SELECT * FROM usuarios WHERE correo = :correo");
    $sql->bindParam(':correo', $correo, PDO::PARAM_STR);
    $sql->execute();

    // Obtener el resultado de la consulta
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    // Verificar si algún campo está NULL y mostrar el botón si es el caso
    if ($resultado) {
        $campos = ['nombre', 'apellido', 'dni','edad','codpostal','localidad','numtel']; // Lista de campos a verificar

        $mostrarBoton = false;
        foreach ($campos as $campo) {
            if ($resultado[$campo] === null) {
                $mostrarBoton = true;
                break;
            }
        }

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../style/style_panelusers.css">
            <title>Panel usuario</title>
        </head>

        <body>
            <div class="info">
                <h1>Panel de usuario</h1>
                <h2>Bienvenido: <?php echo $resultado['correo'] ?></h2>
                <p>Nombre: <?php echo $resultado['nombre'] ?></p>
                <p>Apellido: <?php echo $resultado['apellido'] ?></p>
                <p>DNI: <?php echo $resultado['dni'] ?></p>
                <p>edad: <?php echo $resultado['edad'] ?></p>
                <p>codpostal: <?php echo $resultado['codpostal'] ?></p>
                <p>localidad: <?php echo $resultado['localidad'] ?></p>
                <p>numtel: <?php echo $resultado['numtel'] ?></p>


                <?php
                // Mostrar el botón si algún campo está NULL
                if ($mostrarBoton) {
                    ?>
                    <a href="completar_informacion.php"><button>Completar Información Personal</button></a>
                    <?php
                }
                ?>
            </div>
            <div class="pedidos">
                <h1>PEDIDOS</h1>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Cantidad</th>
                    </tr>
                </table>
            </div>
        </body>

        </html>
        <?php
    } else {
        echo "No se encontró ningún usuario con este correo electrónico.";
    }
} else {
    echo '<br><br><br><br>Usted no ha iniciado sesión.';
    ?>
    <a class="volver" href="login.html"><button>Login</button></a>
    <?php
}
?>
