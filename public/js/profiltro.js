document.addEventListener('DOMContentLoaded', function () {
    const btnBuscar = document.getElementById('btnBuscar');
    btnBuscar.addEventListener('click', async function () {
        // Obtener valores de los filtros
        const busqueda = document.getElementById('buscador').value;
        const categoria = document.getElementById('categorias').value;
        const orden = document.getElementById('orden').value;

        // Crear objeto con los filtros
        const filtros = {
            busqueda: busqueda,
            categoria: categoria,
            orden: orden
        };

        try {
            const response = await fetch('/ruta/hacia/backend', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(filtros)
            });

            if (!response.ok) {
                throw new Error('Error al obtener los productos');
            }

            const productosFiltrados = await response.json();

            // Mostrar los productos filtrados en el contenedor
            mostrarProductos(productosFiltrados);
        } catch (error) {
            console.error('Error:', error);
        }
    });

    // Función para mostrar los productos en el contenedor
    function mostrarProductos(productos) {
        const contenedor = document.getElementById('productosContainer');
        contenedor.innerHTML = '';

        productos.forEach(producto => {
            const divProducto = document.createElement('div');
            divProducto.classList.add('box');

            // Crea la estructura HTML de cada producto (imagen, nombre, precio, etc.)
            // Y adjunta cada producto al contenedor
            divProducto.innerHTML = `
                <a href="/ruta/hacia/detalles/${producto.idproducto}">
                    <img src="${producto.imagen}" alt="${producto.nombre}">
                </a>
                <span>productos disponibles</span>
                <h2>${producto.nombre}</h2>
                <h3 class="price">$${producto.precio} <span>${producto.unidadmedida}</span></h3>
                <i class='bx bx-cart-alt' data-toggle="modal" data-target="#productoModal"
                    data-imagen="${producto.imagen}" data-nombre="${producto.nombre}"
                    data-descripcion="${producto.descripcion}" data-precio="${producto.precio}"></i>
                <i class='bx bx-heart'></i>
                <span class="discount">-25%</span>
            `;

            contenedor.appendChild(divProducto);
        });
    }
});
