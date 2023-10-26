(function() {
    //console.log('Ventas.js: ');
    const procesarVentaBtn = document.querySelector('#procesarVentaBtn');
    const codigoBarrasInput = document.querySelector('#codigoBarras');
    const productoInput = document.querySelector('#producto');
    const precioInput = document.querySelector('#precio');
    const datosClienteInput = document.querySelector('#datosCliente');
    const totalPagarInput = document.querySelector('#totalPagar');
    const tablaRegistroVentas = document.querySelector('#tablaRegistroVentas');

    var itemsAgregados = [];
    var precioTotal = 0;

    codigoBarrasInput.addEventListener("keyup", obtenerItem);
    tablaRegistroVentas.addEventListener("click", borrarItem);
    procesarVentaBtn.addEventListener("click", procesarVenta);

    datosClienteInput.addEventListener("keyup", obtenerClientePorNIT);
    document.querySelector('#borrarClienteBtn').addEventListener("click", borrarCliente);
    document.querySelector('#anularVentaBtn').addEventListener("click", anularVenta);

    async function obtenerItem(e)
    {
        var codigo = e.target.value;
        
        if (codigo.length >= 3) {
            const url = `/api/ventas/obtener-producto`;
            axios.post(url, {
                codigo: codigo
            })
            .then(function (res) {
                if (res.data != null) {
                    insertItemHTML(res.data);
                }
            })
            .catch(function (err) {
                console.log(err);
            });
        }
    }

    function insertItemHTML(item)
    {
        ctrl = false;
        if (itemsAgregados.length > 0) {
            itemsAgregados.forEach(element => {
                if (item.id == element) {
                    ctrl = true;
                }
            });
        }
        if (!ctrl) {
            itemsAgregados.push(item.id);
            tbodyRef = tablaRegistroVentas.querySelector('tbody');
            var row = `
            <tr class="table__tr">
                <td hidden="true">` + item.id + `</td>
                <td class="table__td">` + item.nombre + `</td>
                <td class="table__td">` + item.precioPublico + `</td>
                <td class="table__td">` + item.precioPublico + `</td>
                <td class="table__td"><button class="borrarBtn">Borrar</button></td>
            </tr>
            `;
            tbodyRef.innerHTML += row;
            precioTotal += parseInt(item.precioPublico);
            totalPagarInput.value = precioTotal;
            codigoBarrasInput.value = '';
            codigoBarrasInput.focus();
            codigoBarrasInput.select();
        }        
    }

    function borrarItem(e)
    {
        if (!e.target.classList.contains("borrarBtn")) {
            return;
        }
        const btn = e.target;
        var itemID = btn.closest("tr").children[0].textContent;
        var itemPrecio = btn.closest("tr").children[2].textContent;
        for (let i=0; i<itemsAgregados.length; i++) {
            if (itemsAgregados[i] == itemID) {
                itemsAgregados.splice(i, 1);
            }
        }
        btn.closest("tr").remove();
        precioTotal -= parseInt(itemPrecio);
        totalPagarInput.value = precioTotal;
        codigoBarrasInput.value = '';
        codigoBarrasInput.focus();
        codigoBarrasInput.select();
    }

    async function procesarVenta()
    {
        if (validarForm()) {
            var idCliente = document.querySelector('#idCliente').value;
            var fecha = document.querySelector('#fecha').value;
            const url = `/api/ventas/procesar-venta`;
            axios.post(url, {
                productos: itemsAgregados,
                id_cliente: idCliente,
                fecha: fecha,
                monto_total: precioTotal
            })
            .then(function (res) {
                if (res.data != null) {
                    //console.log('procesarVenta: ', res.data);
                    if (res.data.status == "success") {
                        alert(res.data.message);
                        limpiarFormulario();
                    } else {
                        alert(res.data.message);
                    }
                }
            })
            .catch(function (err) {
                console.log(err);
            });
        }
    }

    function validarForm()
    {
        if(itemsAgregados.length == 0)
        {
            alert('Debe añadir al menos un producto');
            return false;
        }
        var idCliente = document.querySelector('#idCliente').value;
        if (idCliente == '') {
            alert('Indique un cliente');
            return false;
        }
        return true;
    }

    async function anularVenta()
    {
        limpiarFormulario();
    }

    async function obtenerClientePorNIT(e)
    {
        var nit = e.target.value;
        
        if (nit.length >= 5) {
            const url = `/api/clientes/ver-por?nit=` + nit;
            axios.get(url)
            .then(function (res) {
                if (res.data != null) {
                    //console.log('obtenerClientePorNIT', res.data);
                    insertCustomerHTML(res.data);
                }
            })
            .catch(function (err) {
                console.log(err);
            });
        }
    }

    function insertCustomerHTML(cust)
    {
        document.querySelector('#idCliente').value = cust.id;
        document.querySelector('#nombreCliente').value = cust.nombre + ' ' + cust.apellido + ' ' + cust.segundoApellido;
        document.querySelector('#emailCliente').value = cust.telefono;
        document.querySelector('#nombreClienteBlock').style.display = 'block';
        document.querySelector('#emailClienteBlock').style.display = 'block';
    }

    function borrarCliente()
    {
        document.querySelector('#datosCliente').value = '';
        document.querySelector('#idCliente').value = '';
        document.querySelector('#nombreCliente').value = '';
        document.querySelector('#emailCliente').value = '';
        document.querySelector('#nombreClienteBlock').style.display = 'none';
        document.querySelector('#emailClienteBlock').style.display = 'none';
        document.querySelector('#datosCliente').focus();
        document.querySelector('#datosCliente').select();
    }

    function limpiarFormulario()
    {
        codigoBarrasInput.value = '';
        tablaRegistroVentas.querySelector('tbody').innerHTML = '';
        borrarCliente();
        precioTotal = 0;
        totalPagarInput.value = precioTotal;
        itemsAgregados = [];
        codigoBarrasInput.focus();
        codigoBarrasInput.select();
    }
}) ();