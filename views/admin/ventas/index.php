<h2 class="dashboard__heading"> <?php echo $titulo; ?> </h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ventas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Registrar Venta
    </a>
</div>
<?php
// echo "<pre>";
// var_dump($ventas);
// echo "</pre>";
?>
<div class="dashboard__contenedor">
    <?php if(!empty($ventas)) { ?>
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Id</th>
                <th scope="col" class="table__th">Cliente</th>
                <th scope="col" class="table__th">Total</th>
                <th scope="col" class="table__th">Fecha</th>
            <th scope="col" class="table__th">Accion</th>
            </tr>
        </thead>
        <tbody class="table__tbody">
        <?php foreach($ventas as $venta) { ?>
            <tr class="table__tr">
                <td class="table__td"><?php echo $venta->id; ?></td>
                <td class="table__td"><?php echo $venta->nombre_cliente; ?></td>
                <td class="table__td"><?php echo $venta->monto_total; ?></td>
                <td class="table__td"><?php echo $venta->created_at; ?></td>
                <td>
                <a href="<?php //echo base_url(); ?>Ventas/ver?id=<?php echo $venta->id; ?>&cliente=<?php echo $venta->id_cliente; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Ver</a>

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
            <p class="text-center">No hay Ventas Registradas.</p>
        <?php } ?>
</div>