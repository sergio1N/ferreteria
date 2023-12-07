document.addEventListener('DOMContentLoaded', () => {
    // Incremento y decremento
    const btnIncrement = document.querySelector('#increment');
    const btnDecrement = document.querySelector('#decrement');
    let valueByDefault = 0;

    if (btnIncrement && btnDecrement) {
        btnIncrement.addEventListener('click', () => {
            valueByDefault += 1;
            console.log(valueByDefault); // Aquí puedes hacer lo que desees con el valor
        });

        btnDecrement.addEventListener('click', () => {
            if (valueByDefault === 0) {
                return;
            }
            valueByDefault -= 1;
            console.log(valueByDefault); // Aquí puedes hacer lo que desees con el valor
        });
    }

    // Toggle
    const toggleDescription = document.querySelector('.title-description');
    const toggleAdditionalInformation = document.querySelector('.title-additional-information');
    const toggleReviews = document.querySelector('.title-reviews');

    const contentDescription = document.querySelector('.text-description');
    const contentAdditionalInformation = document.querySelector('.text-additional-information');
    const contentReviews = document.querySelector('.text-reviews');

    if (toggleDescription && toggleAdditionalInformation && toggleReviews) {
        toggleDescription.addEventListener('click', () => {
            contentDescription.classList.toggle('hidden');
        });

        toggleAdditionalInformation.addEventListener('click', () => {
            contentAdditionalInformation.classList.toggle('hidden');
        });

        toggleReviews.addEventListener('click', () => {
            contentReviews.classList.toggle('hidden');
        });
    }



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
      
          var cantidad = 1;
      
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
            $('#cantidad').val('1');
            $('#productoTotal').text('1');
      
          });
        });
      });

});
