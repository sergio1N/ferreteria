window.addEventListener("DOMContentLoaded", function () {
  var precioInput = document.getElementById("precio");

  precioInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
    if (this.value.length > 7) {
      this.value = this.value.slice(0, 7);
    }
  });
  
  // input unidad medida (corrección aquí)
  var medidaInput = document.getElementById("unidadm"); // Corrección en el ID
  
  medidaInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, ""); // Solo letras
  });
  

});
var cantidadMedidaInput = document.getElementById("medida");
  
  cantidadMedidaInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, ""); // Solo números
  });