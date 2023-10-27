<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Producto</legend>

    <div class="formulario__campo">
        <label for="codigoBarra" class="formulario__label">Codigo de Barra</label>
        <input 
            type="number" 
            class="formulario__input"
            id="codigoBarra"
            name="codigoBarra"
            placeholder="Código de Barra del Producto"
            value="<?php echo $almacen->codigoBarra ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,' ')" 
            type="text" 
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Producto"
            value="<?php echo $almacen->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="detalles" class="formulario__label">Detalles</label>
        <input 
            type="text" 
            class="formulario__input"
            id="detalles"
            name="detalles"
            placeholder="Detalle del Producto"
            value="<?php echo $almacen->detalles ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="precioPublico" class="formulario__label">Precio Público</label>
        <input 
            type="number" 
            class="formulario__input"
            id="precioPublico"
            name="precioPublico"
            placeholder="Precio publico del Producto"
            value="<?php echo $almacen->precioPublico ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="precioMUno" class="formulario__label">Mayor 1</label>
        <input 
            type="number" 
            class="formulario__input"
            id="precioMUno"
            name="precioMUno"
            placeholder="Precio mayor 1 del Producto"
            value="<?php echo $almacen->precioMUno ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="precioMDos" class="formulario__label">Mayor 2</label>
        <input 
            type="number" 
            class="formulario__input"
            id="precioMDos"
            name="precioMDos"
            placeholder="Precio mayor 2 del Producto"
            value="<?php echo $almacen->precioMDos ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="precioMTres" class="formulario__label">Mayor 3</label>
        <input 
            type="number" 
            class="formulario__input"
            id="precioMTres"
            name="precioMTres"
            placeholder="Precio mayor 3 del Producto"
            value="<?php echo $almacen->precioMTres ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="precioMCuatro" class="formulario__label">Mayor 4</label>
        <input 
            type="number" 
            class="formulario__input"
            id="precioMCuatro"
            name="precioMCuatro"
            placeholder="Precio mayor 4 del Producto"
            value="<?php echo $almacen->precioMCuatro ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input 
            type="file" 
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen"
            required
        >
    </div> 

    <?php if(isset($almacen->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $venta->imagen; ?>.webp" type="webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $venta->imagen; ?>.png" type="png">
                <img src="<?php echo $_ENV['HOST'] . '/img/productos/' . $venta->imagen; ?>.png" alt="Imagen del Producto">
            </picture>
            
        </div>

    <?php } ?>

</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Marca del Producto</label>
        <input 
            type="text" 
            class="formulario__input"
            id="tags_input"
            placeholder="Ej. IMOU, COMMAX, SAMSUNG"
        >

        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $almacen->tags ?? ''; ?>"
        >
    </div>
</fieldset> 

<div class="formulario__campo" >
        <label for="precioMCuatro" class="formulario__label" type="hidden"></label>
        <input 
            type="hidden" 
            class="formulario__input"
            id="precioMCinco"
            name="precioMCinco"
            placeholder="Precio mayor 4 del Producto"
            value="<?php echo $almacen->precioMCinco ?? ''; ?>"
        >
    </div>