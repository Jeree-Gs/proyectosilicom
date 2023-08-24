<h2 class="dashboard__heading"> <?php echo $titulo; ?> </h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/tiendas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Producto
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($tiendas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Detalles</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Marca</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($tiendas as $tienda) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $tienda->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $tienda->detalles; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $tienda->precio; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $tienda->tags; ?>
                        </td>
                        

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/tiendas/editar?id=<?php echo $tienda->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                <!--ELIMINAR-->
                            <form method="POST" action="/admin/tiendas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $tienda->id; ?>">
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