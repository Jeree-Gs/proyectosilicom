<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Producto</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            type="text" 
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Producto"
            value="<?php echo $tienda->nombre ?? ''; ?>"
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
            value="<?php echo $tienda->detalles ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="precio" class="formulario__label">Precio</label>
        <input 
            type="number" 
            class="formulario__input"
            id="precio"
            name="precio"
            placeholder="Precio publico del Producto"
            value="<?php echo $tienda->precio ?? ''; ?>"
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

    <?php if(isset($tienda->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/tiendas/' . $tienda->imagen; ?>.webp" type="webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/tiendas/' . $tienda->imagen; ?>.png" type="png">
                <img src="<?php echo $_ENV['HOST'] . '/img/tiendas/' . $tienda->imagen; ?>.png" alt="Imagen del Producto">
            </picture>
            
        </div>

    <?php } ?>

</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Marca</label>
        <input 
            type="text" 
            class="formulario__input"
            id="tags_input"
            placeholder="Ej. IMOU, COMMAX, SAMSUNG"
        >

        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $tienda->tags ?? ''; ?>"
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
            value="<?php echo $tienda->precioMCinco ?? ''; ?>"
        >
    </div>