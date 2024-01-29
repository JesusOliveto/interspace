<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $edad = $_POST['edad'];
    $codpostal =$_POST['codpostal'];
    $localidad = $_POST['localidad'];
    $numtel =$_POST['numtel'];
    $contrasena = $_POST['contrasena'];
    $genero =$_POST['genero'];
    

    //Datos para la conexion con la base de datos
    
    //local
    $host = "localhost";
    $dbname = "test";
    $username = "root";
    $password = "";
    $charset = "utf8";

    //online
    /*
    $host = 'ns1.hostingmax.net'; 
    $dbname = 'interspace_pagina_web'; 
    $username = 'interspace_interspace';
    $password = 'Charly10072023';
    */
    // Conectar a la base de datos utilizando mysqli
    $conexion = new mysqli($host, $username, $password, $dbname);
    if ($conexion->connect_error) {
        die('Error en la conexión: ' . $conexion->connect_error);
    }

    // Validar si el usuario ya existe en la base de datos
    $sql = "SELECT * FROM Usuarios WHERE correo = '$correo'";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        // Usuario ya registrado, mostrar SweetAlert
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
        <script>
            window.addEventListener("DOMContentLoaded", () => {
                Swal.fire({
                    title: "Error",
                    text: "Usuario ya registrado",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Volver al registro"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirigir al usuario a la página de registro
                        window.location.href = "registro.html";
                    }
                });
            });
        </script>
        <?php
    } else {
        // El usuario no existe, proceder con el registro
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT); // Hash de la contraseña

        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO Usuarios (correo, nombre, dni, edad, codpostal, localidad, numtel, contrasena, genero) VALUES ('$correo', '$nombre', '$dni', '$edad', '$codpostal', '$localidad', '$numtel', '$hashed_password', '$genero')";
        if ($conexion->query($sql) === TRUE) {
            // Registro exitoso, mostrar SweetAlert
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
            <script>
                window.addEventListener("DOMContentLoaded", () => {
                    Swal.fire({
                        title: "Registro exitoso",
                        text: "Usuario registrado correctamente",
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Iniciar Sesion"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir al usuario a la página de inicio de sesión
                            window.location.href = "Login.html";
                        }
                    });
                });
            </script>
            <?php
        } else {
            // Mostrar error en el registro
            echo "Error en el registro: " . $conexion->error;
        }
    }
    // Cerrar la conexión
    $conexion->close();
}
?>

