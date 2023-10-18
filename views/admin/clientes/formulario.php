<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Proveedores</legend>

    <div class="formulario__campo">
        <label for="nit" class="formulario__label">Nit</label>
        <input 
            type="number" 
            class="formulario__input"
            id="nit"
            name="nit"
            placeholder="Precio publico del Producto"
            value="<?php echo $cliente->nit ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s/]/g, '')"
            type="text" 
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Producto"
            value="<?php echo $cliente->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s/]/g, '')"
            type="text" 
            class="formulario__input"
            id="apellido"
            name="apellido"
            placeholder="Nombre del Producto"
            value="<?php echo $cliente->apellido ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="segundoApellido" class="formulario__label">Segundo Apellido</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ\s/]/g, '')"
            type="text" 
            class="formulario__input"
            id="segundoApellido"
            name="segundoApellido"
            placeholder="Nombre del Producto"
            value="<?php echo $cliente->segundoApellido ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="telefono" class="formulario__label">Precio Público</label>
        <input 
            type="number" 
            class="formulario__input"
            id="telefono"
            name="telefono"
            placeholder="Precio publico del Producto"
            value="<?php echo $cliente->telefono ?? ''; ?>"
        >
    </div>

   