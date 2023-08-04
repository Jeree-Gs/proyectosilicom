(function() { //se ejecuta inmediatamente

    const tagsInput = document.querySelector('#tags_input'); // id
    
    if(tagsInput) {

        const tagsDiv = document.querySelector('#tags'); //seleccionar el elemento con el id 'tags' y se van instertando en tags
        const tagsInputHidden = document.querySelector('[name="tags"]'); //name

        let tags = [];

        // Recuperar del input oculto
        if(tagsInputHidden.value !== '') {
            tags = tagsInputHidden.value.split(',');
            mostrarTags();
        }

        // Escuchar los cambio en el input
        tagsInput.addEventListener('keypress', guardarTag); //cada cosa que se coloca se guarda

        function guardarTag(e) {
            if(e.keyCode === 44) { //44 es la coma que hace la separacion

                if(e.target.value.trim() === '' || e.target.value < 1) { //controla que no deje espacio en blanco
                    return;
                }
                e.preventDefault();
                tags = [...tags, e.target.value.trim()]; // '...tags' copia las etiquetas actuales y trim para borrar espacios en blanco
                tagsInput.value = '';
                mostrarTags();
            }
        }

        function mostrarTags() {
            tagsDiv.textContent = '';
            tags.forEach(tag => {
                const etiqueta = document.createElement('LI'); // creamos un elemento li osea el punto
                etiqueta.classList.add('formulario__tag') //se agrega las etiquetas con la clase formulario__tag
                etiqueta.textContent = tag;
                etiqueta.ondblclick = eliminarTag; //doble click elimina
                tagsDiv.appendChild(etiqueta); //agregando
            })
            actualizarInputHidden();
        }

        function eliminarTag(e) { // 'e' selecciona evento
            e.target.remove();
            tags = tags.filter(tag => tag !== e.target.textContent); //trae a todos los tags que no sea al que no le di click y el filter retarna un nuevo arreglo
            actualizarInputHidden();
        }

        function actualizarInputHidden() { //agregamos funcion para agregar o quitar etiquetas del array
            tagsInputHidden.value = tags.toString(); //converitr el arreglo dentro de un string
        }
    }

})(); //'()' llama a la funcion