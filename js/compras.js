fetch("js/productos.json")
  .then((response) => response.json())
  .then((data) => cargarProductos(data))
  .catch((error) => console.log("Error al cargar los productos:", error));

const contenedorProductos = document.getElementById("cart-content");

function cargarProductos(productos) {
  productos.forEach((producto) => {
    console.log(producto);
    const cartBox = document.createElement("div");
    cartBox.classList = "shop-box";
    cartBox.innerHTML = `
    <img class="shop-img" src="${producto.img}"
      class="card-img-top" alt="${producto.titulo}">
     <div class="detail-box">
      <h5 class="shop-product">${producto.titulo}</h5>
      <span class="shop-price">$${producto.precio}</span>
       Cantidad
      <input type="number" value="1" placeholder="1" class="cart-quantity">
     </div>
       <i class="fa-solid fa-trash cart-remove"></i>
    </div>
    `;

    contenedorProductos.appendChild(cartBox);
  });
}

cargarProductos;