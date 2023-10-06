<h2 class="dashboard__heading"> <?php echo $titulo; ?> </h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ventas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Registrar Venta
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($proveedores)) { ?>
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
                <tbody>
                <?php foreach($proveedores as $proveedor) { ?>
                        <tr>
                            <td><?php echo $lista['id']; ?></td>
                            <td><?php echo $lista['id_cliente']; ?></td>
                            <td><?php echo $lista['total']; ?></td>
                            <td><?php echo $lista['fecha']; ?></td>
                             <td>
                                <a href="<?php echo base_url(); ?>Ventas/ver?id=<?php echo $lista['id']; ?>&cliente=<?php echo $lista['id_cliente']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Ver</a>
                             </td>
                         </tr>
                         <?php } ?>
                 </tbody>
            </table>
                <?php } else { ?>
                    <p class="text-center">No hay Ventas Registradas.</p>
                <?php } ?>
        </div>