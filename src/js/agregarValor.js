function agregarValor() {
    // Obtener el valor ingresado por el usuario
    var nuevoValor = document.getElementById("nuevoValor").value;
  
    // Obtener el ComboBox
    var comboBox = document.getElementById("miComboBox");
  
    // Crear una nueva opción
    var opcionNueva = document.createElement("option");
    opcionNueva.text = nuevoValor;
    opcionNueva.value = nuevoValor;
  
    // Agregar la nueva opción al ComboBox
    comboBox.appendChild(opcionNueva);
  
    // Limpiar el campo de entrada
    document.getElementById("nuevoValor").value = "";
  }