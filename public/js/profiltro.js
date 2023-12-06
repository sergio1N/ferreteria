$('#btnBuscar').click(function () {
    var categoria = $('#categorias').val();
    var marca = $('#marcas').val();
    var precio = $('#precio').val();
    var url = $(this).data('url'); // Obtener la URL del atributo data

    $.ajax({
        type: 'POST',
        url: url, // Utilizar la URL obtenida del atributo data
        data: { categorias: categoria, marcas: marca, precio: precio, _token: '{{ csrf_token() }}' },
        success: function (response) {
            displayResults(response);
        },
        error: function (xhr, status, error) {
            console.log('Error:', xhr.responseText);
        }
    });
});


function displayResults(products) {
    var container = $('#resultadobusqueda');
    container.empty();

    if (products.length > 0) {
        $.each(products, function (index, producto) {
            var productHTML = `
                <div class="box">
                    <h2>${producto.nombre}</h2>
                    <p>Precio: $${producto.precio}</p>
                </div>`;
            container.append(productHTML);
        });
    } else {
        container.html('<p>No se encontraron resultados.</p>');
    }
}
