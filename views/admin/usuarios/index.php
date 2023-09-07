<h2 class="dashboard__heading"> <?php echo $titulo; ?> </h2>

<div class="formulario__campo">
    <label for="clientes" class="formulario__label">Usuarios</label>
    <input 
        type="text" 
        class="formulario__input"
        id="clientes"
        placeholder="Buscar Clientes"
    >
    <ul id="listado-proveedores" class="listado-proveedores"></ul>

    <input type="hidden" name="usuario_id" value="">
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($usuarios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Apellido</th>
                    <th scope="col" class="table__th">Teléfono</th>
                    <th scope="col" class="table__th">Email</th>
                    <th scope="col" class="table__th">Admin</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($usuarios as $usuario) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $usuario->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $usuario->apellido; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $usuario->telefono; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $usuario->email; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $usuario->admin; ?>
                        </td>
                        

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/usuarios/editar?id=<?php echo $usuario->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>

                <!--ELIMINAR-->
                            <form method="POST" action="/admin/usuarios/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
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
        <p class="text-center">No hay Usuarios Registrados.</p>
    <?php } ?>
</div>

<?php
    echo $paginacion;
?>
