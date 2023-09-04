window.addEventListener("DOMContentLoaded", function () {
  var precioInput = document.getElementById("precio");

  precioInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
    if (this.value.length > 7) {
      this.value = this.value.slice(0, 7);
    }
  });

  var medidaInput = document.getElementById("unidadm");

  medidaInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, "");
  });

  var cantidadMedidaInput = document.getElementById("medida");

  cantidadMedidaInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
  });
  //modal maraca
  const selectMarca = document.getElementById('marca');

  selectMarca.addEventListener('change', function() {
      if (selectMarca.value === 'nueva') {
          $('#exampleModal').modal('show');
      }
  });
  ///modal categoria
  const selectCategoria = document.getElementById('categoria');

  selectCategoria.addEventListener('change', function() {
      if (selectCategoria.value === 'nuevaC') {
          $('#exampleModalCategoria').modal('show');
      }
  });
});
//marca submit
document.addEventListener('DOMContentLoaded', function() {
  const btnCrearMarca = document.getElementById('btnCrearMarca');
  const nuevaMarcaForm = document.getElementById('nuevaMarcaForm');
  const inputMarcanom = document.getElementById('marcanom');

  btnCrearMarca.addEventListener('click', function() {
      if (inputMarcanom.value.trim() === '') {
          alert('Por favor, completa el nombre de la marca.');
          return;
      }

      nuevaMarcaForm.submit();
  });
});
//categoria submit
document.addEventListener('DOMContentLoaded', function() {
  const btnCrearCategoria = document.getElementById('btnCrearCategoria');
  const nuevaCategoriaForm = document.getElementById('nuevaCategoriaForm');
  const inputcategorianom = document.getElementById('categorianom');

  btnCrearCategoria.addEventListener('click', function() {
      if (inputcategorianom.value.trim() === '') {
          alert('Por favor, completa el nombre de la categoria.');
          return;
      }

      nuevaCategoriaForm.submit();
  });
});
//mensaje de creacion
// Mostrar el mensaje al cargar la página
document.addEventListener('DOMContentLoaded', function () {
  const successMessage = document.getElementById('success-message');
  if (successMessage) {
      successMessage.style.display = 'block';
  }
});

// Ocultar el mensaje después de 3 segundos
setTimeout(function () {
  const successMessage = document.getElementById('success-message');
  if (successMessage) {
      successMessage.style.display = 'none';
  }
}, 3000);

//cambio de color imagen
document.addEventListener('DOMContentLoaded', function () {
  const inputElement = document.getElementById('imagen');
  
  inputElement.addEventListener('change', function () {
    if (inputElement.files.length > 0) {
      inputElement.classList.add('file-selected');
    } else {
      inputElement.classList.remove('file-selected');
    }
  });
});
//ocultar el input de null
function mostrarOcultarCantidad() {
    var unidadmInput = document.getElementById("unidadm");
    var medidaInput = document.getElementById("medida");

    if (unidadmInput.value.trim() !== "") {
        medidaInput.style.display = "inline-block";
    } else {
        medidaInput.style.display = "none";
    }
}
