(function() {
    const proveedoresInput = document.querySelector('#proveedores');

    if(proveedoresInput) {
        let proveedores = [];
        let proveedoresFiltrados = [];

        const listadoProveedores = document.querySelector('#listado-proveedores')
        const proveedorHidden = document.querySelector('[name="proveedor_id"]')

        obtenerProveedores();
        proveedoresInput.addEventListener('input', buscarProveedores)

        if (proveedorHidden.value) {
            (async() => {
                const proveedor = await obtenerProveedor(proveedorHidden.value)
                const { nombre, telefono} = proveedor

                //Insertar en el HTML
                const proveedorDOM = document.createElement('LI')
                proveedorDOM.classList.add('listado-proveedores__proveedor', 'listado-proveedores__proveedor--seleccionado');
                proveedorDOM.textContent = `${nombre} ${telefono}`

                listadoProveedores.appendChild(proveedorDOM)
            })
        }

        async function obtenerProveedores() {
            const url = `/api/proveedores`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            formatearProveedores(resultado)
        }

        async function obtenerProveedor(id) {
            const url = `/api/proveedores?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            formatearProveedores(resultado);
        }

        function formatearProveedores(arrayProveedores = []) {
            proveedores = arrayProveedores.map( proveedor => {
                return {
                    nombre: `${proveedor.nombre.trim()} ${proveedor.telefono.trim()}`,
                    id: proveedor.id
                }
            })
        }

        function buscarProveedores(e) {
            const busqueda = e.target.value;

            if(busqueda.length > 3) {
                const expresion = new RegExp(busqueda, "i");
                proveedoresFiltrados = proveedores.filter(proveedor => {
                    if(proveedor.nombre.toLowerCase().search(expresion) != -1) {
                        return proveedor
                    }
                })
            } else {
                proveedoresFiltrados = []
            }

            mostrarProveedores();
        }
        
        function mostrarProveedores() {

            while(listadoProveedores.firstChild) {
                listadoProveedores.removeChild(listadoProveedores.firstChild) //limpia lo insertado
            }

            if(proveedoresFiltrados.length > 0) {
                proveedoresFiltrados.forEach(proveedor => {
                    const proveedorHTML = document.createElement('LI');
                    proveedorHTML.classList.add('listado-proveedores__proveedor')
                    proveedorHTML.textContent = proveedor.nombre;
                    proveedorHTML.dataset.proveedorId = proveedor.id
                    proveedorHTML.onclick = seleccionarProveedor
    
                    //añadir al DOM
                    listadoProveedores.appendChild(proveedorHTML)
                })
            } else {
                const noResultados = document.createElement('P')
                noResultados.classList.add('listado-proveedores__no-resultado')
                noResultados.textContent = 'No hay resultados para tu búsqueda'
                listadoProveedores.appendChild(noResultados)
            }         
        }

        function seleccionarProveedor(e) {
            const proveedor = e.target;

            //Remover la clase previa

            const proveedorPrevio = document.querySelector('.listado-proveedores__proveedor--seleccionado')
            if(proveedorPrevio) {
                proveedorPrevio.classList.remove('listado-proveedores__proveedor--seleccionado')
            }
            proveedor.classList.add('listado-proveedores__proveedor--seleccionado')

            proveedorHidden.value = proveedor.dataset.proveedorId
        }
    }

}) ();