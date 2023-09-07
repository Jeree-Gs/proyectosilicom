<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Proveedores</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" 
            type="text" 
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Producto"
            value="<?php echo $proveedor->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="telefono" class="formulario__label">Teléfono</label>
        <input 
            type="number" 
            class="formulario__input"
            id="telefono"
            name="telefono"
            placeholder="Precio publico del Producto"
            value="<?php echo $proveedor->telefono ?? ''; ?>"
        >
    </div>
