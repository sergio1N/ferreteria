var swiper = new Swiper(".home", {
  spaceBetween: 30,
  centeredSlides: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

let menu = document.querySelector('#menu-icon');
let navbarr = document.querySelector('.navbarr');

menu.onclick = () => {
  menu.classList.toggle('bx-x');
  navbarr.classList.toggle('active');
}

window.onscroll = () => {
  menu.classList.remove('bx-x');
  navbarr.classList.remove('active');
}

// modal carrito productos

$(document).ready(function () {


  $('.bx-cart-alt').click(function () {
    var imagen = $(this).data('imagen');
    var nombre = $(this).data('nombre');
    var descripcion = $(this).data('descripcion');
    var precio = $(this).data('precio');

    $('#productoImagen').attr('src', imagen);
    $('#productoNombre').text(nombre);
    $('#productoDescripcion').text(descripcion);
    $('#productoPrecio').text(precio); // Establecer el precio
    $('#productoUnidadMedida').text('Unidad'); // Cambiar 'Unidad' por el valor correspondiente

    var cantidad = 0;

    function actualizarTotal(cantidad) {
      var total = precio * cantidad;
      $('#productoTotal').text(total);
    }

    $('#restarCantidad').click(function () {
      if (cantidad > 0) {
        cantidad--;
        $('#cantidad').val(cantidad);
        actualizarTotal(cantidad);
      }
    });

    $('#sumarCantidad').click(function () {
      cantidad++;
      $('#cantidad').val(cantidad);
      actualizarTotal(cantidad);
    });

    $('#agregarCarrito').click(function () {
      // Aquí puedes agregar la lógica para agregar el producto al carrito con la cantidad seleccionada
      // Por ejemplo: una llamada a una función para agregar al carrito con AJAX
      // ... Tu lógica aquí
      console.log('Producto agregado al carrito con cantidad: ' + cantidad);
    });

    $('#masDetalles').click(function () {
      // Agregar lógica para mostrar más detalles del producto si es necesario
      // Por ejemplo: abrir otro modal, redirigir a otra página, etc.
      // ... Tu lógica aquí
      console.log('Mostrar más detalles del producto');
    });

    $('#productoModal').modal('show');

    function actualizarTotal(cantidad) {
      var total = (precio * cantidad).toFixed(2); // Limitar a 2 decimales
      $('#productoTotal').text(total);
    }

    // Restablecer el modal al cerrar
    $('#productoModal').on('hidden.bs.modal', function () {
      $('#cantidad').val('0');
      $('#productoTotal').text('0');

    });
  });
});

