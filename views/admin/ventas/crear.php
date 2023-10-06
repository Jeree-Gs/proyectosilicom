<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ventas">
        <i class="fa-solid fa-arrow-left"></i>
        Volver
    </a>
</div>

<div class="container">
    <h2>Registro de Ventas</h2>
    <form>
      <div class="row">
        <div>
          <label for="codigoBarras">Código de Barras:</label>
          <input type="text" id="codigoBarras" name="codigoBarras" required>
        </div>
        <div>
          <label for="producto">Producto:</label>
          <input disabled id="producto" name="producto" value="" placeholder="Nombre del Producto">
        </div>
        <div>
          <label for="precio">Precio: (Bs)</label>
          <input disabled id="precio" name="precio" value="" placeholder="00.00 Bs.">
        </div>
        <div>
            <label for="fecha">Fecha Actual:</label>
            <input type="date" id="fecha" value="<?php echo date('Y-m-d'); ?>" disabled>
        </div>
      </div>

      <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Producto</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Total</th>
                    <th scope="col" class="table__th">Accion</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los productos seleccionados -->
            </tbody>
        </table>

        <div class="two-columns">
        <div>
          <label for="datosCliente">Datos del Cliente:</label>
          <input type="text" id="datosCliente" name="datosCliente" placeholder="Nit" required>
        </div>
        <div class="dashboard__contenedor-boton">
            <a class="dashboard__boton" href="/admin/clientes/crear">
                <i class="fa-solid fa-circle-plus"></i>
                Añadir Cliente
            </a>
        </div>
        <div>
          <label for="totalPagar">Total a pagar: (Bs)</label>
          <input disabled id="totalPagar" name="totalPagar" value="">
        </div>
      </div>

      <div class="button-column">
        <button class="boton-procesar" type="button" onclick="procesarVenta()">Procesar Venta</button>
        <button class="boton-anular" type="button" onclick="anularVenta()">Anular Venta</button>
      </div>


    </form>
  </div>
