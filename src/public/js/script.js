//------- Scripts del buscador en el index.html // ---------

const libros = [
  { titulo: "1984", autor: "George Orwell", precio: 23.5 },
  { titulo: "El Asesinato de Platon", autor: "Kim Philby", precio: 21.96 },
  {
    titulo: "Las Mil Y Una Noche",
    autor: "Antes de las Mil Y Una Noches",
    precio: 21.96,
  },
  {
    titulo: "El gran libro de las emociones",
    autor: "Marco Jesús Gómez",
    precio: 21.96,
  },
  {
    titulo: "Roberto por el buen camino",
    autor: "Sonia Deschamps",
    precio: 23.1,
  },
  { titulo: "1984", autor: "George Orwell", precio: 23.5 },
];

function buscarLibro() {
  const busqueda = document.getElementById("buscador").value.toLowerCase();
  const resultado = document.getElementById("resultado");

  let texto =
    '<table border="1"><tr><th>Título</th><th>Autor</th><th>Precio</th></tr>';
  for (let i = 0; i < libros.length; i++) {
    let libro = libros[i];
    if (libro.titulo.toLowerCase().indexOf(busqueda) != -1) {
      texto +=
        '<tr style="background-color: #f2f2f2;"><td>' +
        libro.titulo +
        "</td><td>" +
        libro.autor +
        "</td><td>" +
        libro.precio +
        "</td></tr>";
    }
  }
  texto += "</table>";

  resultado.innerHTML = texto;
}



  fetch('/src/public/js/productos.json')
  .then(response => response.json())
  .then(data => mostrarProductosPorCategoria(data))
  .catch(error => console.log(error));
  

//---- Evento para cargar las card al index ---//

function mostrarProductosPorCategoria(productos) {
  productos.forEach(producto => {
    const productoElemento = document.createElement("div");
    productoElemento.classList.add("card");
    productoElemento.innerHTML = `
      <img src="${producto.img}"
      class="card-img-top" alt="${producto.titulo}">
      <div class="card-body">
        <h5 class="card-title">${producto.titulo}</h5>
        <span class="card-precio">$${producto.precio}</span>
        <button class="btn btn-primary card-btn-shop" id="${producto.id}">Añadir</button>
        <button class="btn btn-info card-btn-info">Detalle</button>
      </div>
    `;
    const categoria = producto.Categoria.toLowerCase();
    const contenedorCategoria = document.querySelector(`.lista-${categoria}`);
    contenedorCategoria.appendChild(productoElemento);

    // Evento para el botón de añadir al carrito
    const botonAñadir = productoElemento.querySelector(".card-btn-shop");
    botonAñadir.addEventListener("click", function () {
      console.log("Producto añadido al carrito:");
    });
  });
}
mostrarProductosPorCategoria();

//   botonAgregar = document.querySelectorAll(".card-btn-shop");
