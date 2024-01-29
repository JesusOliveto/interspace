let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    cartItem.classList.toggle('active');  
    navbar.classList.remove('active');
    searchForm.classList.remove('active');


}


window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});

//Carrito:

// Variables
const carrito = document.querySelector("#carrito");
const contenedorCarrito = document.querySelector("#lista-carrito tbody");
const vaciarCarritoBtn = document.querySelector("#vaciar-carrito");
const listaDestinos = document.querySelector(".box-container");

let destinosEnCarrito = [];

cargarEventListener();

function cargarEventListener() {
    // Cuando agregas un destino presionando "Agregar al Carrito"
    listaDestinos.addEventListener("click", agregarDestino);

    // Elimina destinos del carrito
    contenedorCarrito.addEventListener("click", eliminarDestino);

    // Vaciar el carrito
    vaciarCarritoBtn.addEventListener("click", vaciarCarrito);
}

function agregarDestino(e) {
    e.preventDefault();
    if (e.target.classList.contains("agregar-carrito")) {
        const destinoSeleccionado = e.target.parentElement;
        const infoDestino = obtenerDatosDestino(destinoSeleccionado);
        agregarAlCarrito(infoDestino);
    }
}

function obtenerDatosDestino(destino) {
    const imagen = destino.querySelector("img").src;
    const titulo = destino.querySelector("h3").textContent;
    const precio = destino.querySelector(".price").textContent;
    const id = destino.querySelector(".agregar-carrito").getAttribute("data-id");

    return { imagen, titulo, precio, id };
}

function agregarAlCarrito(infoDestino) {
    const existe = destinosEnCarrito.find(destino => destino.id === infoDestino.id);

    if (existe) {
        existe.cantidad++;
    } else {
        destinosEnCarrito.push({ ...infoDestino, cantidad: 1 });
    }

    carritoHTML();
}

function carritoHTML() {
    limpiarHTML();

    destinosEnCarrito.forEach(destino => {
        const { imagen, titulo, precio, cantidad, id } = destino;
        const row = document.createElement("tr");
        row.innerHTML = `
            <td><img src="${imagen}" width="100"></td>
            <td>${titulo}</td>
            <td>${precio}</td>
            <td>${cantidad}</td>
            <td><a href="#" class="borrar-destino" data-id="${id}">X</a></td>
        `;

        contenedorCarrito.appendChild(row);
    });

    // Calcular el precio total
    const precioTotal = destinosEnCarrito.reduce((total, destino) => total + (parseFloat(destino.precio.slice(1)) * destino.cantidad), 0);

    // Actualizar el elemento HTML con el precio total
    document.querySelector("#preciototal").textContent = `Precio Total: $${precioTotal.toFixed(2)}`;
}

//Me manda a comprar si tengo un total
const comprarBoton = document.querySelector(".comprar");

comprarBoton.addEventListener("click", function (e) {
    e.preventDefault(); // Evitar la redirección predeterminada

    const precioTotalElement = document.querySelector("#preciototal");
    const precioTotalText = precioTotalElement.textContent;
    const precioTotal = parseFloat(precioTotalText.replace("Precio Total: $", ""));

    if (precioTotal !== 0) {
        // Redirige al usuario a "Login.html"
        window.location.href = "MisCompras.php";
    } else {
        // Muestra un mensaje de que no hay productos en el carrito o algo similar
        alert("No hay productos en el carrito. Agrega productos antes de comprar.");
    }
});

function limpiarHTML() {
    while (contenedorCarrito.firstChild) {
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
}

function eliminarDestino(e) {
    e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
    if (e.target.classList.contains("borrar-destino")) {
        const destinoId = e.target.getAttribute("data-id");
        const destino = destinosEnCarrito.find(destino => destino.id === destinoId);

        if (destino) {
            if (destino.cantidad > 1) {
                destino.cantidad--;
            } else {
                destinosEnCarrito = destinosEnCarrito.filter(destino => destino.id !== destinoId);
            }
            carritoHTML();
        }
    }
}
function vaciarCarrito(e) {
    e.preventDefault(); // Evitar el comportamiento predeterminado del enlace
    destinosEnCarrito = [];
    limpiarHTML();
    actualizarPrecioTotal(0); // Actualiza el precio total a cero cuando se vacía el carrito
}

function actualizarPrecioTotal(precio) {
    document.querySelector("#preciototal").textContent = `Precio Total: $${precio.toFixed(2)}`;
}

/* Menu desplegable */



//nasa APOD
// obtener datos de la API de la NASA
function obtenerDatos() {
    const Nasa_key = 'Qc44TfDa0sfpDadaIDL9IFC5nFvMx5pC5e2Uqyfq';
    //hoy
    //const url = `https://api.nasa.gov/planetary/apod?api_key=${Nasa_key}`;
    //fija
    const url = `https://api.nasa.gov/planetary/apod?api_key=${Nasa_key}&date=2023-10-03`;

    fetch(url)
    .then(response => response.json())
    .then(data => mostrarDatos(data))
    .catch(error => console.error('Error:', error));
}

// mostrar datos en el HTML
function mostrarDatos(data) {
    const titulo = document.getElementById('titulo');
    const multimedia = document.getElementById('multimedia');

    titulo.innerText = data.title;


    if (data.media_type === 'video') {
        multimedia.innerHTML = `<iframe src="${data.url}" frameborder="0" allowfullscreen></iframe>`;
    } else {
        multimedia.innerHTML = `<img src="${data.url}" alt="${data.title}">`;
    }
}

// ejecutar la función obtenerDatos()
window.addEventListener('load', obtenerDatos);


//imagenes de planetas


function obtenerImagenes() {
    const urlLuna = `https://images-api.nasa.gov/asset/GSFC_20171208_Archive_e001861`;

    fetch(urlLuna)
    .then(response => response.json())
    .then(luna => mostrarImagenLuna(luna))
    .catch(error => console.error('Error:', error));

    const urlMarte = `https://images-api.nasa.gov/asset/PIA04591`;

    fetch(urlMarte)
    .then(response => response.json())
    .then(marte => mostrarImagenMarte(marte))
    .catch(error => console.error('Error:', error));

    const urlJupiter = `https://images-api.nasa.gov/asset/hubble-captures-vivid-auroras-in-jupiters-atmosphere_28000029525_o`;

    fetch(urlJupiter)
    .then(response => response.json())
    .then(jupiter => mostrarImagenJupiter(jupiter))
    .catch(error => console.error('Error:', error));

    const urlSaturno = `https://images-api.nasa.gov/asset/PIA01482`;

    fetch(urlSaturno)
    .then(response => response.json())
    .then(saturno => mostrarImagenSaturno(saturno))
    .catch(error => console.error('Error:', error));

    const urlUrano = `https://images-api.nasa.gov/asset/PIA02963`;

    fetch(urlUrano)
    .then(response => response.json())
    .then(urano => mostrarImagenUrano(urano))
    .catch(error => console.error('Error:', error));

    const urlNeptuno = `https://images-api.nasa.gov/asset/PIA02210`;

    fetch(urlNeptuno)
    .then(response => response.json())
    .then(neptuno => mostrarImagenNeptuno(neptuno))
    .catch(error => console.error('Error:', error));

}

// mostrar datos en el HTML
function mostrarImagenLuna(luna) {

    // Obtener la URL de la imagen original (índice 0 en el array 'items')
    const lunaUrl = luna.collection.items[0].href;
    // Mostrar la imagen en el elemento con id "imagen"
    document.getElementById("Luna").src = lunaUrl;
}

function mostrarImagenMarte(marte) {
    const marteUrl = marte.collection.items[0].href;
    document.getElementById("Marte").src = marteUrl;
}

function mostrarImagenJupiter(jupiter) {
    const jupiterUrl = jupiter.collection.items[0].href;
    document.getElementById("Jupiter").src = jupiterUrl;
}

function mostrarImagenSaturno(saturno) {
    const saturnoUrl = saturno.collection.items[0].href;
    document.getElementById("Saturno").src = saturnoUrl;
}

function mostrarImagenUrano(urano) {
    const uranoUrl = urano.collection.items[0].href;
     document.getElementById("Urano").src = uranoUrl;
}   

function mostrarImagenNeptuno(neptuno) {
    const neptunoUrl = neptuno.collection.items[0].href;
    document.getElementById("Neptuno").src = neptunoUrl;
} 

// ejecutar la función obtenerImagenes()
window.addEventListener('load', obtenerImagenes);

//mostrar paquetes dinamicos 
