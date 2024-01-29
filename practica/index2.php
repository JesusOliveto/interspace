<?php
    include 'database.php';

    session_start();
    define ("KEY_TOKEN","APR.wqc-354*");
    $db = new Database();
    $con = $db->conectar();
    $sql = $con->prepare("SELECT * FROM paquetes WHERE destacado = 0");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC); 
    $sql = $con->prepare("SELECT * FROM paquetes WHERE destacado = 1");
    $sql->execute();
    $resultadodestac = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inter Space</title>
    <!--Font-awesome Iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Css-->
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" type="image/png" href="Imagenes\logo4m.png"> <!--Logo en el navegador-->
</head>
<body>


    <header class="header">
        <!-- Logo -->
        <a href="" class="logo">
            <img src="Imagenes\Logo4m.png" alt="Logo de Inter Space">

        </a>
        <!-- Navegación -->
        <nav class="navbar">
            <a href="#home">Inicio</a>
            <a href="#about">Nosotros</a>
            <a href="#menu">Destinos</a>
            <a href="#products">Destacados</a>
            <a href="#review">Comentarios</a>
            <a href="#contact">Contacto</a>
            
        </nav>
        <!-- Iconos -->
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
        <!--Inicio de sesion-->
        <ul id="menu-container">
            <li>
              <img src="Imagenes/usuario2.png" id="usuario" alt="Usuario" class="user-image">
              <ul class="ul-second">
    
                <!--Modificando-->
                
                <!--*******************************************************-->
                
                <!--<li><a href="Login.html" class="compras u-full-width">Iniciar Sesion</a></li>
                <li><a href="registro.html" class="compras u-full-width">Registrarse</a></li>
                <li><a href="logout.html" class="compras u-full-width">Cerrar Sesion</a></li>-->


                <?php
                // Después de establecer la variable de sesión
                echo "Usuario sesión: " . $_SESSION['email'];
                echo "Usuario sesión: " . $_SESSION['usuario'];
                echo "Permiso sesión: " . $_SESSION['permisos'];

                // Verifica si el usuario ha iniciado sesión y tiene los permisos necesarios (por ejemplo, permisos 0 para usuarios normales)
                if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_SESSION['permisos'])) {
                    // El usuario ha iniciado sesión
                    if ($_SESSION['permisos'] == 0) {
                        // Usuario normal
                        echo '<li><a href="paneluser.php" class="compras u-full-width">Panel de Usuario</a></li>';
                        echo '<li><a href="MisCompras.html" class="compras u-full-width">Mis compras</a></li>';
                        echo '<li><a href="MisPlan.html" class="compras u-full-width">Mi Plan de viaje</a></li>';
                        echo '<li><a href="logout.php" class="compras u-full-width">Cerrar Sesión</a></li>';
                    } elseif ($_SESSION['permisos'] == 1) {
                        // Administrador
                        echo '<li><a href="paneladm.php" class="compras u-full-width">Panel de Administrador</a></li>';
                        echo '<li><a href="logout.php" class="compras u-full-width">Cerrar Sesión</a></li>';
                    }
                } else {
                    // El usuario no ha iniciado sesión
                    echo '<li><a href="Login.html" class="compras u-full-width">Iniciar Sesión</a></li>';
                    echo '<li><a href="registro.html" class="compras u-full-width">Registrarse</a></li>';
                }
                ?>
                


                <!--*******************************************************-->
              </ul>
            </li>
        </ul>
          
          
        <!-- Carrito de Compras -->
        <ul>
               <li class="submenu">
                    <img src="Imagenes\cart.png" id="cart-btn">
                        <div id="carrito">   
                            <table id="lista-carrito" class="u-full-width">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th id="nombre" class="input" type="text" placeholder="Nombre" name="nombre">Nombre</th>
                                        <th id="precio" name="precio" class="input" type="number" placeholder="Precio">Precio</th>
                                        <th id="pasaj" name="pasaj" class="input" type="number">Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            
                            <p id="preciototal" name="preciototal" class="input" type="number" placeholder="preciototal">Precio Total: $0</p>
                            <a href="Login.html" class="comprar u-full-width">Comprar</a>
                            <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                       </div>
               </li>
        </ul>
    </header>    

    <!--Inicio-->
    <section class="home" id="home">
        <div class="content">
            <h3>Inter space </h3>
            <p>Donde la verdadera <br>
                aventura comienza
            </p>
        </div>
    </section>

    <!--Nosotros-->
    <section class="about" id="about">
        <h1 class="heading">sobre <span>nosotros</span> </h1>

        <div class="row">


            <div class="image">
                <img src="Imagenes\QSM2.jpeg" alt="">
            </div>

            <div class="content">
                <h3>¿Por qué elegir Inter Space?</h3>
                <p>
                    Tu agencia de viajes intergaláctica en Latinoamérica. <br>
                    Experiencia, destinos imperdibles y servicio excepcional. <br>
                    ¡Explora el universo con nosotros!<br>
                </p>
            </div>

        </div>

    </section>

    
<!--**********************************************************************************************************-->
<!--***************************************************APIS***************************************************-->
<!--**********************************************************************************************************-->  
   <!--Menu section-->
   <section class="menu" id="menu">

<h1 class="heading"> Des<span>tinos</span></h1>

<div class="box-container">
    <div class="box">
        <img id="Luna" src="" alt="">
        <h3>Luna</h3>
        <p> ¡Prepárate para un increíble viaje a la Luna, donde descubrirás los secretos de nuestro satélite más cercano!</p>
        <div class="price">$100.000</div>
        <a href="#" class="agregar-carrito" data-id="1">Agregar</a>
    </div>

    <div class="box">
        <img id="Marte" src="" alt="">
        <h3>Marte</h3>
        <p>¡Embárcate en un épico viaje a Marte y descubre un mundo rojo lleno de misterios por revelar!</p>
        <div class="price">$120.000 </div>
        <a href="#" class="agregar-carrito" data-id="2">Agregar</a>
    </div>


    <div class="box">
        <img id="Jupiter" src="" alt="">
        <h3>Jupiter</h3>
        <p>¡Viaja a Júpiter y sumérgete en la grandeza de este gigante gaseoso, donde los misterios del cosmos te esperan!</p>
        <div class="price">$140.000</div>
        <a href="#" class="agregar-carrito" data-id="3">Agregar</a>
    </div>

    <div class="box">
        <img id="Saturno" src="" alt="">
        <h3>Saturno</h3>
        <p>¡Descubre los misterios de Saturno en un emocionante viaje espacial, donde sus enigmáticos anillos y su majestuosidad te dejarán sin aliento!</p>
        <div class="price">$160.000</div>
        <a href="#" class="agregar-carrito" data-id="4">Agregar</a>
    </div>

    <div class="box">
        <img id="Urano" src="" alt="">
        <h3>Urano</h3>
        <p>¡Zarpa hacia Urano y adéntrate en un viaje cósmico único, explorando un mundo helado y fascinante en los confines del sistema solar!</p>
        <div class="price">$180.000</div>
        <a href="#" class="agregar-carrito" data-id="5">Agregar</a>
    </div>

    <div class="box">
        <img id="Neptuno" src="" alt="">
        <h3>Neptuno</h3>
        <p>¡Embarca en un emocionante viaje a Neptuno y sumérgete en las profundidades azules de este planeta distante, donde secretos cósmicos te esperan!</p>
        <div class="price">$180.000</div>
        <a href="#" class="agregar-carrito" data-id="6">Agregar</a>
    </div>


    
    <div class="box">
        <div id="multimedia"></div>
        <h3>¡OFERTA DE HOY!</h3>
        <h3 id="titulo"></h3>
        <p>Un oasis celestial inexplorado, donde los cielos nocturnos brillan con mil colores y la gravedad cero promete aventuras únicas</p>
        <div class="price">$20.000</div>
        <a href="#" class="agregar-carrito" data-id="7">Agregar</a>
</div>

</section>
<!--Destacados-->

<section class="products" id="products">
<div class="container">  
    <h1 class="heading"> Desta<span>cados</span></h1>
    <div class="products-container">
        <div class="product" data-name="p-1">
            <img src="Imagenes\Planeta1.jpeg" alt="">
            <h3>Planeta Estelaris</h3>
            <div class="price">$200.000</div>
        </div>

        <div class="product" data-name="p-2">
            <img src="Imagenes\Planeta2.jpeg" alt="">
            <h3>Planeta Aurorion</h3>
            <div class="price">$200.000</div>
        </div>

        <div class="product" data-name="p-3">
            <img src="Imagenes\Planeta3.jpeg" alt="">
            <h3>Planeta Crimsona</h3>
            <div class="price">$200.000</div>
        </div>
    </div>
</div>

<div class="products-preview">
    <div class="preview" data-target="p-1">
        <i class="fas fa-times"></i>
        <img src="Imagenes\Planeta1.jpeg" alt="">
        <h3>Planeta Estelaris</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>
            Explora la Ciudad Estelar, experimenta la gravedad cero, 
            y relájate en las aguas termales.
        </p>
        <div class="price">$200.000</div>
        <div class="buttons">
            <a href="Login.html" class="buy">Comprar</a>
        </div>
    </div>

    <div class="preview" data-target="p-2">
        <i class="fas fa-times"></i>
        <img src="Imagenes\Planeta2.jpeg" alt="">
        <h3>Planeta Aurorion</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>
            Explora los campos de cristales luminosos, admira las auroras y sumérgete en la cultura.
        </p>
        <div class="price">$200.000</div>
        <div class="buttons">
            <a href="Login.html" class="buy">Comprar</a>
        </div>
    </div>

    <div class="preview" data-target="p-3">
        <i class="fas fa-times"></i>
        <img src="Imagenes\Planeta3.jpeg" alt="">
        <h3>Planeta Crimsona</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
        </div>
        <p>
            Explora los paisajes marcianos y descubre los secretos del misterioso planeta rojo.
        </p>
        <div class="price">$200.000</div>
        <div class="buttons">
            <a href="Login.html" class="buy">Comprar</a>
        </div>
    </div>
</div>
</section>





<!--Comentarios-->
<section class="review" id="review">
<h1 class="heading"> comentario <span>del cliente</span></h1>
<div class="box-container">

    <div class="box">
        <img src="#" alt="" class="quote">
        <p>¡Increíble experiencia con Interspace! Viajar a otro planeta fue un sueño hecho realidad. El equipo fue amable y profesional, y la aventura espacial fue inolvidable. ¡Volveré seguro!"</p>
        <img src="Imagenes\usuario.jpeg" alt="" class="user">
        <h3>pedro aimar</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>  
        </div>
    </div>

    <div class="box">
        <img src="#" alt="" class="quote">
        <p>Mi viaje con Interspace superó todas mis expectativas. Desde la emocionante despegue hasta la asombrosa vista de otro planeta, cada momento fue mágico. ¡Gracias por esta experiencia única en la vida!</p>
        <img src="Imagenes\usuario.jpeg" alt="" class="user">
        <h3>julio costa</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>  
        </div>
    </div>

</div>
</section>

<!--CONTACTENOS-->
<section class="contact" id="contact">
<h1 class="heading">  <span>Ubicación</h1>
<div class="row">

    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.626482202535!2d-58.41294568503611!3d-34.58831656418989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcaa69596f0796b77!2sDepartamento!5e0!3m2!1ses!2sar!4v1644918478998!5m2!1ses!2sar" allowfullscreen="" loading="lazy"></iframe>

    <form action="">

        <h3>¿Cómo comprar?</h3>
        <p>
            Accede a la plataforma, explora opciones y elige el paquete ideal. <br>
            Haz clic en "Comprar", inicia sesión o regístrate para acceder a beneficios exclusivos. 
            Visita la sucursal de Inter Space para realizar el pago y obtener el comprobante. <br>
        </p>

    </form>

</div>
</section>

<!--Blog-->
<section class="blogs" id="blogs">
<h1 class="heading"> nuestros <span>blogs</span> </h1>
<div class="box-container">
    <div class="box">
        <div class="image">
            <img src="Imagenes\usuario.jpeg" alt="">
        </div>
        
        <div class="content">
            <a href="#" class="title">Rocío Igarzábal</a>
            <span> 4 de Marzo, 2023</span>
            <p>¡Planificar un viaje a otros planetas nunca había sido tan emocionante y fácil gracias a esta página!</p>
        </div>

    </div>

    <div class="box">
        <div class="image">
            <img src="Imagenes\usuario.jpeg" alt="">
        </div>
        
        <div class="content">
            <a href="#" class="title">Nicolás Riera</a>
            <span> 24 de Agosto, 2023</span>
            <p>¡Hermosa experiencia!</p>
        </div>

    </div>

    <div class="box">
        <div class="image">
            <img src="Imagenes\usuario.jpeg" alt="">
        </div>
        
        <div class="content">
            <a href="#" class="title">Pablo Martínez</a>
            <span> 10 de Julio, 2023</span>
            <p>¡Esto es genial!</p>
        </div>

    </div>

</div>
</section>

<!--footer section-->
<section class="footer">
<div class="share">
    <a href="https://www.facebook.com/NASA?mibextid=ZbWKwL" class="fab fa-facebook-f"></a>
    <a href="https://instagram.com/nasa_es?igshid=MzRlODBiNWFlZA==" class="fab fa-instagram"></a>
    <a href="tel:+1234567890" class="fa fa-phone"></a>
    <a href="mailto:interspaceonline2023@gmail.com" class="fa fa-envelope"></a>
</div>
</section>
<script src="main.js"></script>
</body>
</html>
