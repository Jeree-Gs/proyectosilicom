<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Proveedores</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            type="text" 
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Producto"
            value="<?php echo $proveedor->nombre ?? ''; ?>"
        >
    </div>

 <!--   <div class="formulario__campo">
        <label for="direccion" class="formulario__label">Dirección</label>
        <input 
            type="text" 
            class="formulario__input"
            id="direccion"
            name="direccion"
            placeholder="Dirección"
            value="<?php echo $proveedor->direccion ?? ''; ?>"
        >
    </div> -->

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
