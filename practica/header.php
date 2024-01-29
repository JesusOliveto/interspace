<?php
    session_start();
    require '../config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style/style_header.css">
</head>
<body>
    <div class="head">
        <div class="logo">
            <a href="index.php"><img src="../imagen/logo.png" alt="Logo" height="70px" width="100%"></a>
        </div>

        <nav class="navbar">
            <a href="contacto.php">Contacto</a>
            <a href="catalogo.php">Catálogo</a>
            <?php
                // Verifica si el usuario ha iniciado sesión y tiene los permisos necesarios (por ejemplo, permisos 0 para usuarios normales)
                if (isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['permisos']) && $_SESSION['permisos'] == 0) {
                    // El usuario ha iniciado sesión como usuario normal
                    // Muestra un botón que lo lleve al panel de usuario
                    echo '<li><a href="paneluser.php"class="compras u-full-width">Panel de Usuario</a></li>';
                    echo '<li><a href="MisCompras.html" class="compras u-full-width">Mis compras</a></li>';
                    echo '<li><a href="MisPlan.html" class="compras u-full-width">Mi Plan de viaje</a></li>';
                    echo '<li><a href="logout.html" class="compras u-full-width">Cerrar Sesion</a></li>';
                } elseif (isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['permisos']) && $_SESSION['permisos'] == 1) {
                    // El usuario ha iniciado sesión como administrador
                    // Muestra un botón que lo lleve al panel de administrador
                    echo '<li><a href="paneladm.php" class="compras u-full-width">Panel de Administrador</a></li>';
                    echo '<li><a href="logout.html" class="compras u-full-width">Cerrar Sesion</a></li>';
                } else {
                    // El usuario no ha iniciado sesión
                    // Muestra los botones de registro e inicio de sesión
                    echo '<li><a href="Login.html" class="compras u-full-width">Iniciar Sesion</a></li>';
                    echo '<li><a href="registro.html" class="compras u-full-width">Registrarse</a></li>';
                }

                /*
                // Verifica si el usuario ha iniciado sesión y tiene los permisos necesarios (por ejemplo, permisos 0 para usuarios normales)
                if (isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['permisos']) && $_SESSION['permisos'] == 0) {
                    // El usuario ha iniciado sesión como usuario normal
                    // Muestra un botón que lo lleve al panel de usuario
                    echo '<a href="paneluser.php">Panel de Usuario</a>';
                    echo '<a href="logout.php">Cerrar sesion</a>';
                } elseif (isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['permisos']) && $_SESSION['permisos'] == 1) {
                    // El usuario ha iniciado sesión como administrador
                    // Muestra un botón que lo lleve al panel de administrador
                    echo '<a href="paneladm.php">Panel de Administrador</a>';
                    echo '<a href="logout.php">Cerrar sesion</a>';
                } else {
                    // El usuario no ha iniciado sesión
                    // Muestra los botones de registro e inicio de sesión
                    echo '<a href="login.php">Iniciar Sesión</a>';
                    echo '<a href="registro.php">Registro</a>';
                    
                } */
            ?>
            
            <i class='bx bx-cart'></i>
        </nav>
    </div>
    <div class="cart">
        <div class="card_products">

        </div>
        <div class="card_total">

        </div>
    </div>
    <script src="../js/carrito.js"></script>
</body>
</html>
