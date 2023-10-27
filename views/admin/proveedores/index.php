<h2 class="dashboard__heading"> <?php echo $titulo; ?> </h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/proveedores/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Proveedor
    </a>
</div>

<div class="formulario__campo">
    <label for="proveedores" class="formulario__label">Proveedores</label>
    <input 
        type="text" 
        class="formulario__input"
        id="proveedores"
        placeholder="Buscar Proveedores"
    >
    <ul id="listado-proveedores" class="listado-proveedores"></ul>

    <input type="hidden" name="proveedor_id" value="">
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($proveedores)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                 <!--   <th scope="col" class="table__th">Dirección</th>  -->
                    <th scope="col" class="table__th">Teléfono</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($proveedores as $proveedor) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $proveedor->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $proveedor->telefono; ?>
                        </td>
                        

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/proveedores/editar?id=<?php echo $proveedor->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                <!--ELIMINAR-->
                            <form method="POST" action="/admin/proveedores/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $proveedor->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>

        </table>
    <?php } else { ?>
        <p class="text-center">No hay Proveedores Registrados.</p>
    <?php } ?>
</div>

<?php
    echo $paginacion;
?>