<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Usuario</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" 
            type="text" 
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Producto"
            value="<?php echo $usuario->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" 
            type="text" 
            class="formulario__input"
            id="apellido"
            name="apellido"
            placeholder="Nombre del Producto"
            value="<?php echo $usuario->apellido ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="direccion" class="formulario__label">Dirección</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" 
            type="text" 
            class="formulario__input"
            id="direccion"
            name="direccion"
            placeholder="Precio publico del Producto"
            value="<?php echo $usuario->direccion ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="telefono" class="formulario__label">Teléfono</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" 
            type="number" 
            class="formulario__input"
            id="telefono"
            name="telefono"
            placeholder="Precio publico del Producto"
            value="<?php echo $usuario->telefono ?? ''; ?>"
        >
    </div>

   

    <div class="formulario__campo">
    <label for="admin">Selecciona el Rol del usuario:</label>
        <select 
            name="admin" 
            id="admin"
            class="formulario__select"
        >
            <option value="">- Seleccionar -</option>
            <option value="1" <?php if (isset($usuario->admin) && $usuario->admin == 1); ?>>Admin</option>
            <option value="0" <?php if (isset($usuario->admin) && $usuario->admin == 0); ?>>Usuario</option>
        </select>

    </div>