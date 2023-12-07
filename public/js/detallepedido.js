let contadorProductos = 0; // Variable para llevar un conteo de productos
let csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

function agregarProducto() {
    // Obtener valores de producto
    let idProducto = document.getElementById('idproducto').value;
    let cantidad = document.getElementById('cantidad').value;
    let precioUnitario = document.getElementById('preciounitario').value;
    let detalle = document.getElementById('detalle').value;

    // Obtener el nombre del producto seleccionado
    let nombreProducto = document.getElementById('idproducto').options[document.getElementById('idproducto').selectedIndex].text;

    // Calcular el precio total del producto
    let precioTotal = cantidad * precioUnitario;

    // Crear un nuevo elemento de producto
    var nuevoProducto = document.createElement('div');
    nuevoProducto.className = 'producto';
    nuevoProducto.id = `producto-${contadorProductos}`; // Asignar un ID único

    // Agregar el contenido del producto
    nuevoProducto.innerHTML = `
        <hr>
        <p>Nombre: ${nombreProducto}</p>
        <p>Cantidad: ${cantidad}</p>
        <p>Precio: ${precioUnitario}</p>
        <p>Valor Total: ${precioTotal}</p>
        <p>Detalle: ${detalle}</p>
        <button type="button" onclick="eliminarProducto(${contadorProductos})">Eliminar Producto</button>
    `;

    // Agregar el nuevo producto al contenedor
    document.getElementById('productos-container').appendChild(nuevoProducto);

    // Limpiar los campos del producto
    document.getElementById('idproducto').value = '';
    document.getElementById('cantidad').value = '';
    document.getElementById('preciounitario').value = '';
    document.getElementById('detalle').value = '';

    // Calcular el nuevo valor total
    calcularNuevoValorTotal();
    contadorProductos++;
}
function eliminarProducto(numeroProducto) {
    // Agregar mensajes de consola para depuración
    console.log(`Intentando eliminar el producto con ID 'producto-${numeroProducto}'`);

    // Obtener el elemento del producto a eliminar
    let productoAEliminar = document.getElementById(`producto-${numeroProducto}`);
    console.log(productoAEliminar); // Agrega este mensaje de consola

    // Verificar si se encontró el elemento antes de intentar eliminarlo
    if (productoAEliminar) {
        productoAEliminar.remove();

        // Calcular el nuevo valor total
        calcularNuevoValorTotal();
    } else {
        console.error(`No se encontró el elemento con ID 'producto-${numeroProducto}'`);
    }
}
function calcularNuevoValorTotal() {
    // Calcular el valor total del último producto agregado y actualizar el campo correspondiente
    let productos = document.getElementsByClassName('producto');
    let ultimoProducto = productos[productos.length - 1];
    let nuevoValorTotal = 0;

    if (ultimoProducto) {
        let cantidad = ultimoProducto.querySelector('p[Cantidad]') ? parseInt(ultimoProducto.querySelector('p[Cantidad]').innerText.split(":")[1].trim()) : 0;
        let precioUnitario = ultimoProducto.querySelector('p[Precio]') ? parseFloat(ultimoProducto.querySelector('p[Precio]').innerText.split(":")[1].trim()) : 0;
        nuevoValorTotal = cantidad * precioUnitario;
    }

    document.getElementById('valortotal').value = nuevoValorTotal;
}

function finalizarPedido() {
    // ... (código existente para obtener detalles de productos)

    // Redirigir a la ruta deseada
    window.location.href = redireccionarRuta;
}

function cerrarModal() {
    // Lógica para cerrar el modal
}
