<h2 class="dashboard__heading"> <?php echo $titulo; ?> </h2>

<div class="container">
        <h1>Nueva Venta</h1>
        <label for="nit">NIT del Cliente:</label>
        <input type="text" id="nit" placeholder="Buscar NIT del Cliente">

        <label for="fecha">Fecha Actual:</label>
        <input type="date" id="fecha" value="<?php echo date('Y-m-d'); ?>" disabled>

        <label for="detalle">Detalle de la Venta:</label>
        <input type="text" id="detalle" placeholder="Buscar Productos">

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre del Producto</th>
                    <th scope="col" class="table__th">Código del Producto</th>
                    <th scope="col" class="table__th">Precio Unidad</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los productos seleccionados -->
            </tbody>
        </table>

        <p id="total">Total: $0.00</p>

        <button id="guardar">Guardar</button>
    </div>