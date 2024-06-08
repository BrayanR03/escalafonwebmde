/*document.addEventListener("DOMContentLoaded", function() {
    const defaultContent = `
        <div class="logo">
            LOGO MUNICIPALIDAD
            <br>
            SISTEMA DE GESTIÓN DE ESCALAFÓN
        </div>
    `;

    document.getElementById("content").innerHTML = defaultContent;

    document.getElementById("trabajadores-btn").addEventListener("click", function() {
        fetch('/trabajadores')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;

                // Add event listeners for checkboxes
                const sexoM = document.getElementById("sexo-m");
                const sexoF = document.getElementById("sexo-f");

                sexoM.addEventListener("change", function() {
                    if (sexoM.checked) {
                        sexoF.checked = false;
                    }
                });

                sexoF.addEventListener("change", function() {
                    if (sexoF.checked) {
                        sexoM.checked = false;
                    }
                });
            });
    });
    document.getElementById("institucion-btn").addEventListener("click", function() {
        fetch('/institucion')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;

            });
    });
    document.getElementById("cargos-btn").addEventListener("click", function() {
        fetch('/cargos')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;

            });
    });
    /*document.getElementById("areas-btn").addEventListener("click", function() {
        fetch('areas')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;

            });
    });*/
/*
    document.getElementById("areas-btn").addEventListener("click", function(event) {
        
        fetch('areas')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;
                history.pushState(null, '', 'areas'); // Cambia la URL sin recargar la página
                document.title = 'Áreas'; // Cambia el título de la página si es necesario
            });
    });
    
    


    document.getElementById("condicionlaboral-btn").addEventListener("click", function() {
        fetch('condicionlaboral')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;
                history.pushState(null, '', 'condicionlaboral'); // Cambia la URL sin recargar la página
                document.title = 'Condicion Laboral';
            });
    });
    document.getElementById("tipomovimiento-btn").addEventListener("click", function() {
        fetch('/tipomovimiento')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;

            });
    });
    document.getElementById("tipodocumento-btn").addEventListener("click", function() {
        fetch('/tipodocumento')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;

            });
    });
    document.getElementById("nivelestudios-btn").addEventListener("click", function() {
        fetch('/nivelestudios')
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;

            });
    });
    document.getElementById("home-btn").addEventListener("click", function() {
        document.getElementById("content").innerHTML = defaultContent;
    });
});*/


//VALE ESTE JS PARA ABRIR EL MODAL
/*
document.addEventListener('DOMContentLoaded', () => {
            const openModal = document.querySelector('.editar-btn-area');
            const modal = document.querySelector('.modal');
            const closeModal = document.querySelector('.modal__close');

            if (openModal && modal && closeModal) {
                openModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.classList.add('modal--show');
                    console.log("DISTE CLICK EN EDITAR");
                });

                closeModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.classList.remove('modal--show');
                });
            } else {
                console.error('No se encontraron todos los elementos necesarios en el DOM.');
            }
        });
*/        
       /*
        document.addEventListener('DOMContentLoaded', () => {
            const openModalButtons = document.querySelectorAll('.editar-btn-area');
            const modal = document.querySelector('.modal');
            const closeModal = document.querySelector('.modal__close');
        
            if (openModalButtons.length > 0 && modal && closeModal) {
                openModalButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        modal.classList.add('modal--show');
                        console.log("DISTE CLICK EN EDITAR");
        
                        // Obtener el ID del área y otros datos para rellenar el modal
                        const areaId = button.dataset.id;
                        const areaNombre = button.dataset.nombre;
                        // Rellenar los campos del modal con los datos del área
                        document.querySelector('#modal-area-id').value = areaId;
                        document.querySelector('#modal-area-nombre').value = areaNombre;
                    });
                });
        
                closeModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.classList.remove('modal--show');
                });
            } else {
                console.error('No se encontraron todos los elementos necesarios en el DOM.');
            }
        });*/


        
        document.addEventListener('DOMContentLoaded', () => {
            const openModalButtons = document.querySelectorAll('.editar-btn-area');
            const modal = document.querySelector('.modal');
            const closeModal = document.querySelector('.modal__close');
            const idAreaInput = document.querySelector('#idArea');
            const nombreInput = document.querySelector('#Nombre-modal');
            //const editform = document.querySelector('#editform');
        
            if (openModalButtons.length > 0 && modal && closeModal) {
                openModalButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        modal.classList.add('modal--show');
                        console.log("DISTE CLICK EN EDITAR");
        
                        // Obtener el ID del área y otros datos para rellenar el modal
                        const areaId = button.dataset.id;
                        const areaNombre = button.dataset.nombre;
                        // Rellenar los campos del modal con los datos del área
                        idAreaInput.value = areaId;
                        nombreInput.value = areaNombre;

                       // editform.action='/areas/${idArea}';
                    });
                });
        
                closeModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.classList.remove('modal--show');
                });
            } else {
                console.error('No se encontraron todos los elementos necesarios en el DOM.');
            }
        });
        
        document.addEventListener('DOMContentLoaded', () => {
            const openModalButtons = document.querySelectorAll('.eliminar-btn-area');
            const modal = document.querySelector('.modal-eliminar');
            const closeModaleliminar = document.querySelector('.modal__close__eliminar');
            const idAreaInput = document.querySelector('#idAreaEliminar');
            const nombreInput = document.querySelector('#NombreAreaEliminar');
            //const editform = document.querySelector('#editform');
        
            if (openModalButtons.length > 0 && modal && closeModaleliminar) {
                openModalButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        modal.classList.add('modal--show');
                        console.log("DISTE CLICK EN ELIMINAR");
        
                        const idareaget=button.dataset.id;
                        idAreaInput.value=idareaget;
                        const nombrearea = button.dataset.nombre;
                        nombreInput.value=nombrearea;
                       // editform.action='/areas/${idArea}';
                    });
                });
        
                closeModaleliminar.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.classList.remove('modal--show');
                });
            } else {
                console.error('No se encontraron todos los elementos necesarios en el DOM.');
            }
        });
       /*
        document.addEventListener('DOMContentLoaded', () => {
            const openModalButtons = document.querySelectorAll('.editar-btn-area');
            const modal = document.querySelector('.modal');
            const closeModal = document.querySelector('.modal__close');
            const idAreaInput = document.querySelector('#idArea');
            const nombreInput = document.querySelector('#Nombre-modal');
            const form = document.querySelector('#edit-area-form');
        
            if (openModalButtons.length > 0 && modal && closeModal) {
                openModalButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        modal.classList.add('modal--show');
                        console.log("DISTE CLICK EN EDITAR");
        
                        // Obtener el ID del área y otros datos para rellenar el modal
                        const areaId = button.dataset.id;
                        const areaNombre = button.dataset.nombre;
                        
                        // Rellenar los campos del modal con los datos del área
                        idAreaInput.value = areaId;
                        nombreInput.value = areaNombre;
                        
                        // Actualizar la acción del formulario con el ID del área
                        const action = form.getAttribute('data-action').replace(':id', areaId);
                        form.setAttribute('action', action);
                    });
                });
        
                closeModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.classList.remove('modal--show');
                });
            } else {
                console.error('No se encontraron todos los elementos necesarios en el DOM.');
            }
        });
        */

        // Obtener el elemento de la alerta
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.querySelector('.alert');
        
            if (alert) {
                // Agregar clase de desvanecimiento después de un cierto tiempo
                setTimeout(function() {
                    alert.classList.add('fade-out');
                }, 850); // Cambia este valor (en milisegundos) según la duración que desees
        
                // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
                alert.addEventListener('transitionend', function() {
                    alert.remove();
                });
            }
        });
        