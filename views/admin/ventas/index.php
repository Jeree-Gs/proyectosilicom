<h2 class="dashboard__heading"> <?php echo $titulo; ?> </h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ventas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Producto
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($ventas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Detalles</th>
                    <th scope="col" class="table__th">Precio Público</th>
                    <th scope="col" class="table__th">Mayor 1 </th>
                    <th scope="col" class="table__th">Mayor 2</th>
                    <th scope="col" class="table__th">Mayor 3</th>
                    <th scope="col" class="table__th">Mayor 4</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($ventas as $venta) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $venta->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $venta->detalles; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $venta->precioPublico; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $venta->precioMUno; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $venta->precioMDos; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $venta->precioMTres; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $venta->precioMCuatro; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/ventas/editar?id=<?php echo $venta->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                <!--ELIMINAR-->
                            <form method="POST" action="/admin/ventas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $venta->id; ?>">
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
        <p class="text-center">No hay Productos Guardados.</p>
    <?php } ?>
</div>

<?php
    echo $paginacion;
?>