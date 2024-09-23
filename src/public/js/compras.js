fetch(`/src/public/js/productos.json?v=${new Date().getTime()}`)
  .then((response) => response.json())
  .then((data) => cargarProductos(data))
  .catch((error) => console.log("Error al cargar los productos:", error));


  const contenedorProductos = document.getElementById("cart-content");

  function cargarProductos(productos) {
    contenedorProductos.innerHTML = ""; // Limpia el contenedor antes de cargar nuevos productos
  
    productos.forEach((producto) => {
      const cartBox = document.createElement("div");
      cartBox.classList.add("shop-box");
      cartBox.innerHTML = `
        <img class="shop-img" src="${producto.img}" alt="${producto.titulo}">
        <div class="detail-box">
          <h5 class="shop-product">${producto.titulo}</h5>
          <span class="shop-price">US $${producto.precio}</span>
          <label for="cantidad-${producto.id}">Cantidad</label>
          <input type="number" id="cantidad-${producto.id}" value="1" min="1" class="cart-quantity">
        </div>
        <i class="fa-solid fa-trash cart-remove"></i>
      `;
    
      contenedorProductos.appendChild(cartBox);
  
      // Evento para eliminar un producto individual
      const removeBtn = cartBox.querySelector(".cart-remove");
      removeBtn.addEventListener("click", function () {
        console.log("Producto eliminado:", producto.titulo);
        cartBox.remove();
        actualizarTotal();
      });
  
      // Evento para actualizar el total cuando cambia la cantidad
      const quantityInput = cartBox.querySelector(".cart-quantity");
      quantityInput.addEventListener("change", actualizarTotal);
    });
  
    // Evento para vaciar todo el carrito
    const vaciarCarritoBtn = document.getElementById("cart-vaciar");
    vaciarCarritoBtn.addEventListener("click", function () {
      console.log("Carrito vaciado");
      contenedorProductos.innerHTML = "";
      actualizarTotal();
    });
  }
  
  function actualizarTotal() {
    let total = 0;
    const productosEnCarrito = contenedorProductos.querySelectorAll(".shop-box");
    productosEnCarrito.forEach((producto) => {
      const precio = parseFloat(producto.querySelector(".shop-price").textContent.replace("US $", ""));
      const cantidad = parseInt(producto.querySelector(".cart-quantity").value);
      total += precio * cantidad;
    });
    console.log("Total actualizado: $" + total.toFixed(2));
    // Aquí puedes actualizar el total en tu interfaz de usuario
  }
  

cargarProductos();
