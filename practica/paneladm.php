<?php
include 'database.php';
session_start();
define ("KEY_TOKEN","APR.wqc-354*");
$db = new Database();
$con = $db->conectar();

// Procesar el formulario de edición de usuarios si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_usuario'])) {
    // Obtener el ID y los permisos del formulario de edición de usuarios
    $idUsuario = $_POST["id_usuario"];
    $nuevosPermisos = $_POST["permisos"];

    // Validar y actualizar los permisos en la base de datos para usuarios
    $sql = $con->prepare("UPDATE usuarios SET permisos = :permisos WHERE id = :id_usuario");
    $sql->bindParam(':permisos', $nuevosPermisos, PDO::PARAM_INT);
    $sql->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);

    if ($sql->execute()) {
        echo "Permisos de usuario actualizados correctamente.";
    } else {
        echo "Error al actualizar permisos de usuario: " . $sql->errorInfo()[2];
    }
}
/*
// Procesar el formulario de edición de productos si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_producto'])) {
    // Obtener el ID, precio, descuento y destacado del formulario de edición de productos
    $idProducto = $_POST["id_producto"];
    $nuevoNombre = $_POST["nombre"];
    $nuevoDescripcion = $_POST["descripcion"];
    $nuevoPrecio = $_POST["precio"];
    $nuevoDestacado = $_POST["destacado"];

    // Validar y actualizar la información en la base de datos para productos
    $sql = $con->prepare("UPDATE botines SET nombre = :nombre , descripcion = :descripcion , precio = :precio, descuento = :descuento, destacado = :destacado WHERE id = :id_producto");
    $sql->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
    $sql->bindParam(':descripcion', $nuevoDescripcion, PDO::PARAM_STR);
    $sql->bindParam(':precio', $nuevoPrecio, PDO::PARAM_STR);
    $sql->bindParam(':descuento', $nuevoDescuento, PDO::PARAM_INT);
    $sql->bindParam(':destacado', $nuevoDestacado, PDO::PARAM_INT);
    $sql->bindParam(':id_producto', $idProducto, PDO::PARAM_INT);

    if ($sql->execute()) {
        echo "Información del producto actualizada correctamente.";
    } else {
        echo "Error al actualizar información del producto: " . $sql->errorInfo()[2];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_producto'])) {
    // Obtener los datos del formulario de agregar producto
    $nombreProducto = $_POST["nombre_producto"];
    $descripcionProducto = $_POST["descripcion_producto"];
    $precioProducto = $_POST["precio_producto"];
    $descuentoProducto = $_POST["descuento_producto"];
    $destacadoProducto = $_POST["destacado_producto"];

    // Validar y agregar el producto a la base de datos
    $sql = $con->prepare("INSERT INTO botines (nombre,descripcion , precio, descuento, destacado) VALUES (:nombre, :descripcion,:precio, :descuento, :destacado)");
    $sql->bindParam(':nombre', $nombreProducto, PDO::PARAM_STR);
    $sql->bindParam(':descripcion', $descripcionProducto, PDO::PARAM_STR);
    $sql->bindParam(':precio', $precioProducto, PDO::PARAM_STR);
    $sql->bindParam(':descuento', $descuentoProducto, PDO::PARAM_INT);
    $sql->bindParam(':destacado', $destacadoProducto, PDO::PARAM_INT);

    if ($sql->execute()) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al agregar producto: " . $sql->errorInfo()[2];
    }
}
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paneladm.css">
    <title>Panel de Administración</title>
</head>
<body>
    <div class="titulo-container">
        <h1>Panel de administrador</h1>
    </div>

    <h2>Bienvenido: <?php echo $_SESSION['email']?></h2>
    <div class="container">
        <div class="usuario-edit">
            <header id="header">
              <h1>Editar Usuario</h1>
            </header>
            
            <table class="styled-table">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                </tr>
                <br>
                <?php
                // Obtener datos de usuarios
                $sqlUsuarios = $con->prepare("SELECT * FROM usuarios");
                $sqlUsuarios->execute();
                $usuarios = $sqlUsuarios->fetchAll(PDO::FETCH_ASSOC);

                foreach($usuarios as $usuario) {
                    echo '<tr>';
                    echo '<td>' . $usuario['ID'] . '</td>';
                    echo '<td>' . $usuario['correo'] . '</td>';
                    echo '<td>' . $usuario['permisos'] . '</td>';
                    echo '<td>';
                    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
                    echo '<input type="hidden" name="id_usuario" value="' . $usuario['ID'] . '">';
                    echo '<label>Nuevos Permisos (0 o 1): </label>';
                    echo '<input type="number" name="permisos" min="0" max="1" value="' . $usuario['permisos'] . '" class="permisos-input"><br>';
                    echo '<input type="submit" name="editar_usuario" value="Guardar" class="guardar-button">';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
            
        <header id="header">
          <h1>Ventas Dinamicas</h1>
        </header>
        <main>
        <div class="contenedor">
            <!-- Añadir -->
            <div class="añadir">
                <h2>Añadir</h2>
                <form>
                    <label>Nombre del producto</label>
                    <input type="text" id="productoAñadir" name="nombreDelProducto">

                    <label>Valor del producto</label>
                    <input type="number" id="valorAñadir">

                    <label>Existencia</label>
                    <input type="number" id="existenciaAñadir">

                    <label>Url Imagen</label>
                    <input type="text" id="ImagenAñadir">

                    <input class="button" type="button" id="botonAñadir" value="Añadir">
                </form>
            </div>
            <!-- Editar -->
            <div class="editar">
                <h2>Editar</h2>
                <form>
                    <label>Nombre del producto</label>
                    <select id="productoEditar">
                        <option value="">---</option>
                    </select>

                    <label>Atributo</label>
                    <select id="atributoEditar">
                        <option value="">---</option>
                    </select>

                    <label>Nuevo valor</label>
                    <input type="text" id="nuevoAtributo">

                    <input class="button" type="button" id="botonEditar" value="Editar">
                </form>
            </div>

            <!-- Eliminar -->
            <div class="eliminar">
                <h2>Eliminar</h2>

                <form>
                    <label>Nombre del producto</label>
                    <select id="productoEliminar">
                        <option value="">---</option>
                    </select>
                    <input class="button" type="button" id="botonEliminar" value="Eliminar">
                </form>
            </div>
        </div>

        <!-- Mostrar el mensaje -->
        <div class="contenedorMensaje">
            <div id="mensaje"></div>
        </div>

        <!-- Productos -->
        <div class="contenedorProductos">
            <h1>Productos</h1>
            <div class="mostrarProductos" id="mostrarProductos">
                
            </div>
        </div>
        </div>
    </main>

    <script src="admin.js"></script>
</body>
</html>

