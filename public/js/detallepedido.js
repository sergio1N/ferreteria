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
        <button type="button" onclick="editarProducto(${contadorProductos})">Editar Producto</button>
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

function editarProducto(numeroProducto) {
    // Obtener el elemento del producto a editar
    let productoAEditar = document.getElementById(`producto-${numeroProducto}`);

    // Obtener los valores actuales del producto
    let idProductoActual = productoAEditar.querySelector('p[Cantidad]') ? productoAEditar.querySelector('p[Cantidad]').innerText.split(":")[1].trim() : '';
    let cantidadActual = productoAEditar.querySelector('p[Cantidad]') ? productoAEditar.querySelector('p[Cantidad]').innerText.split(":")[1].trim() : '';
    let precioUnitarioActual = productoAEditar.querySelector('p[Precio]') ? productoAEditar.querySelector('p[Precio]').innerText.split(":")[1].trim() : '';
    let detalleActual = productoAEditar.querySelector('p[Detalle]') ? productoAEditar.querySelector('p[Detalle]').innerText.split(":")[1].trim() : '';

    // Preparar un formulario de edición
    let formularioEdicion = `
        <label for="idproducto">Producto:</label>
        <input type="text" id="idproducto-${numeroProducto}" value="${idProductoActual}" required>

        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad-${numeroProducto}" value="${cantidadActual}" required>

        <label for="preciounitario">Precio Unitario:</label>
        <input type="text" id="preciounitario-${numeroProducto}" value="${precioUnitarioActual}" required>

        <label for="detalle">Detalle:</label>
        <input type="text" id="detalle-${numeroProducto}" value="${detalleActual}" required>

        <button type="button" onclick="guardarEdicion(${numeroProducto})">Guardar Edición</button>
    `;

    // Reemplazar el contenido actual con el formulario de edición
    productoAEditar.innerHTML = formularioEdicion;
}

function guardarEdicion(numeroProducto) {
    // Obtener los valores editados
    let idProductoEditado = document.getElementById(`idproducto-${numeroProducto}`).value;
    let cantidadEditada = document.getElementById(`cantidad-${numeroProducto}`).value;
    let precioUnitarioEditado = document.getElementById(`preciounitario-${numeroProducto}`).value;
    let detalleEditado = document.getElementById(`detalle-${numeroProducto}`).value;

    // Calcular el nuevo valor total del producto editado
    let valorTotalEditado = cantidadEditada * precioUnitarioEditado;

    // Actualizar el contenido del producto con los valores editados
    let productoAEditar = document.getElementById(`producto-${numeroProducto}`);
    productoAEditar.innerHTML = `
        <hr>
        <p>Producto: ${idProductoEditado}</p>
        <p>Cantidad: ${cantidadEditada}</p>
        <p>Precio Unitario: ${precioUnitarioEditado}</p>
        <p>Detalle: ${detalleEditado}</p>
        <p>Valor Total: ${valorTotalEditado}</p>
        <button type="button" onclick="editarProducto(${numeroProducto})">Editar Producto</button>
        <button type="button" onclick="eliminarProducto(${numeroProducto})">Eliminar Producto</button>
    `;

    // Calcular el nuevo valor total
    calcularNuevoValorTotal();
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
    // Obtener información de todos los productos
    let productos = document.getElementsByClassName('producto');
    let detalles = [];

    for (let i = 0; i < productos.length; i++) {
        let producto = productos[i];
        
        // Verificar si el elemento y sus propiedades existen antes de acceder a ellas
        let cantidadElement = producto.querySelector('p[Cantidad]');
        let precioElement = producto.querySelector('p[Precio]');

        if (cantidadElement && precioElement) {
            let cantidad = parseInt(cantidadElement.innerText.split(":")[1].trim());
            let precioUnitario = parseFloat(precioElement.innerText.split(":")[1].trim());

            let detalleProducto = {
                idproducto: producto.id, // Ajusta según tu estructura HTML
                cantidad: cantidad,
                preciounitario: precioUnitario
                // Agrega más campos si es necesario
            };
            detalles.push(detalleProducto);
        } else {
            console.error('Error: No se pudo acceder a las propiedades de cantidadElement o precioElement.');
        }
    }

    // Crear un objeto con los detalles del pedido
    let datosPedido = {
        detalles: detalles,
        // Otros datos del pedido, si los hay
    };

    // Enviar una solicitud AJAX para guardar el detalle del pedido
    fetch('/detallepedido/store', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify(datosPedido),
    })
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta si es necesario
        console.log(data);
        // Cerrar el modal o realizar otras acciones según sea necesario
        cerrarModal();
        // Puedes agregar más lógica aquí...
        // Redirigir o realizar otras acciones después de finalizar el pedido
        alert('Pedido finalizado con éxito');
        window.location.href = proveedoresIndexRoute;
    })
    .catch(error => {
        console.error('Error al enviar la solicitud AJAX:', error);
    });
}

function cerrarModal() {
    // Lógica para cerrar el modal
}
