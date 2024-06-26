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

/*================MODAL DE AREAS============================== */

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

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const nombrearea = button.dataset.nombre;
                nombreInput.value = nombrearea;
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
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});
/*=========================================================================================================== */



/*================MODAL DE CARGPOS============================== */

document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.editar-btn-cargos');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modal__close');
    const idAreaInput = document.querySelector('#idCargo');
    const nombreInput = document.querySelector('#Nombre-modal-cargo');
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
    const openModalButtons = document.querySelectorAll('.eliminar-btn-cargos');
    const modal = document.querySelector('.modal-eliminar');
    const closeModaleliminar = document.querySelector('.modal__close__eliminar');
    const idAreaInput = document.querySelector('#idCargoEliminar');
    const nombreInput = document.querySelector('#NombreCargoEliminar');
    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModaleliminar) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN ELIMINAR");

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const nombrearea = button.dataset.nombre;
                nombreInput.value = nombrearea;
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

// Obtener el elemento de la alerta
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});

/**===================================================================================== */


/*================MODAL DE CONDICION LABORAL============================== */

document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.editar-btn-condicionlaboral');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modal__close');
    const idAreaInput = document.querySelector('#idCondicionLaboral');
    const nombreInput = document.querySelector('#Nombre-modal-condicionlaboral');
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
    const openModalButtons = document.querySelectorAll('.eliminar-btn-condicionlaboral');
    const modal = document.querySelector('.modal-eliminar');
    const closeModaleliminar = document.querySelector('.modal__close__eliminar');
    const idAreaInput = document.querySelector('#idCondicionLaboralEliminar');
    const nombreInput = document.querySelector('#DescripcionCondicionLaboralEliminar');
    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModaleliminar) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN ELIMINAR");

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const nombrearea = button.dataset.nombre;
                nombreInput.value = nombrearea;
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

// Obtener el elemento de la alerta
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});

/**===================================================================================== */




/*================MODAL DE TIPO MOVIMIENTO============================== */

document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.editar-btn-tipomovimiento');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modal__close');
    const idAreaInput = document.querySelector('#idTipoMov');
    const nombreInput = document.querySelector('#Nombre-modal-tipomovimiento');
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
    const openModalButtons = document.querySelectorAll('.eliminar-btn-tipomovimiento');
    const modal = document.querySelector('.modal-eliminar');
    const closeModaleliminar = document.querySelector('.modal__close__eliminar');
    const idAreaInput = document.querySelector('#idTipoMovimientoEliminar');
    const nombreInput = document.querySelector('#DescripcionTipoMovimientoEliminar');
    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModaleliminar) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN ELIMINAR");

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const nombrearea = button.dataset.nombre;
                nombreInput.value = nombrearea;
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

// Obtener el elemento de la alerta
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});

/**===================================================================================== */


/*================MODAL DE TIPO DOCUMENTO============================== */

document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.editar-btn-tipodocumento');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modal__close');
    const idAreaInput = document.querySelector('#idTipoDoc');
    const nombreInput = document.querySelector('#Nombre-modal-tipodocumento');
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
    const openModalButtons = document.querySelectorAll('.eliminar-btn-tipodocumento');
    const modal = document.querySelector('.modal-eliminar');
    const closeModaleliminar = document.querySelector('.modal__close__eliminar');
    const idAreaInput = document.querySelector('#idTipoDocumentoEliminar');
    const nombreInput = document.querySelector('#DescripcionTipoDocumentoEliminar');
    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModaleliminar) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN ELIMINAR");

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const nombrearea = button.dataset.nombre;
                nombreInput.value = nombrearea;
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

// Obtener el elemento de la alerta
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});

/**===================================================================================== */



/*================MODAL DE NIVEL DE ESTUDIO============================== */

document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.editar-btn-nivelestudio');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modal__close');
    const idAreaInput = document.querySelector('#idNivelEstudio');
    const nombreInput = document.querySelector('#Nombre-modal-nivelestudio');
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
    const openModalButtons = document.querySelectorAll('.eliminar-btn-nivelestudio');
    const modal = document.querySelector('.modal-eliminar');
    const closeModaleliminar = document.querySelector('.modal__close__eliminar');
    const idAreaInput = document.querySelector('#idNivelEstudioEliminar');
    const nombreInput = document.querySelector('#DescripcionNivelEstudioEliminar');
    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModaleliminar) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN ELIMINAR");

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const nombrearea = button.dataset.nombre;
                nombreInput.value = nombrearea;
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

// Obtener el elemento de la alerta
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});

/**===================================================================================== */


/*================MODAL DE INSTITUCION============================== */

document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.editar-btn-institucion');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modal__close');
    const idAreaInput = document.querySelector('#idInstitucion');
    const nombreInput = document.querySelector('#Nombre-modal-institucion');
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
    const openModalButtons = document.querySelectorAll('.eliminar-btn-institucion');
    const modal = document.querySelector('.modal-eliminar');
    const closeModaleliminar = document.querySelector('.modal__close__eliminar');
    const idAreaInput = document.querySelector('#idInstitucionEliminar');
    const nombreInput = document.querySelector('#NombreInstitucionEliminar');
    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModaleliminar) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN ELIMINAR");

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const nombrearea = button.dataset.nombre;
                nombreInput.value = nombrearea;
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

// Obtener el elemento de la alerta
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});

/**===================================================================================== */

/*================MODAL DE TRABAJADOR============================== */

document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.editar-btn-trabajador');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.modal__close');
    const idAreaInput = document.querySelector('#idTrabajador');
    const nombreInput = document.querySelector('#Nombres-modal-trabajador');
    const paternoInput = document.querySelector('#Paterno-modal-trabajador');
    const maternoInput = document.querySelector('#Materno-modal-trabajador');
    const dniInput = document.querySelector('#Dni-modal-trabajador');
    const sexoInput=document.querySelector('#Sexo-modal-trabajador');
    const fechaNacimientoInput=document.querySelector('#FechaNacimiento-modal-trabajador');
    const condicionlaboralInput=document.querySelector('#idCondicionLaboral-modal-trabajador');
    const opcionesSelect = condicionlaboralInput.querySelectorAll('#option-descripcion-condicion');

    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModal) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN EDITAR");

                // Obtener el ID del área y otros datos para rellenar el modal de la tabla
                const areaId = button.dataset.id;
                const paterno = button.dataset.paterno;
                const materno = button.dataset.materno;
                const nombres = button.dataset.nombres;
                const dni = button.dataset.dni;
                const sexo=button.dataset.sexo;
                const fechanacimiento=button.dataset.fechanacimiento;
                const condicionlaboral=button.dataset.condicionlaboralid;
                
                // Rellenar los campos del modal con los datos del área
                idAreaInput.value = areaId;
                nombreInput.value = nombres;
                paternoInput.value = paterno;
                maternoInput.value = materno;
                dniInput.value = dni;
                sexoInput.value=sexo;
                fechaNacimientoInput.value=fechanacimiento;
                // condicionlaboralInput.value=condicionlaboral;
                
                console.log("============VALORES DEL SELECT DEL MODAL==============");
                opcionesSelect.forEach(opcion=>{
                    
                    if(condicionlaboral===opcion.value){
                        console.log("==================IGUALESSS");
                        opcion.selected=true;
                    }
                    
                });

                // opcionesSelect.forEach(opcion => {
                //   if(opcion==="PRUEBA1-CONDICIONLAB"){
                //     opcion.selected=true;
                //   }  
                //     // if (condicionlaboralInput.value ===opcion.value ) {
                //     //   opcion.selected = true;
                //     // }
                //   }
                // )
                // ;
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
    const openModalButtons = document.querySelectorAll('.eliminar-btn-trabajador');
    const modal = document.querySelector('.modal-eliminar');
    const closeModaleliminar = document.querySelector('.modal__close__eliminar');
    const idAreaInput = document.querySelector('#idTrabajadorEliminar');
    const nombreInput = document.querySelector('#NombreTrabajadorEliminar');
    //const editform = document.querySelector('#editform');

    if (openModalButtons.length > 0 && modal && closeModaleliminar) {
        openModalButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                modal.classList.add('modal--show');
                console.log("DISTE CLICK EN ELIMINAR");

                const idareaget = button.dataset.id;
                idAreaInput.value = idareaget;
                const trabajador = button.dataset.apellidos+", "+button.dataset.nombres;
                nombreInput.value = trabajador;
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

// Obtener el elemento de la alerta
document.addEventListener('DOMContentLoaded', function () {
    var alert = document.querySelector('.alert');

    if (alert) {
        // Agregar clase de desvanecimiento después de un cierto tiempo
        setTimeout(function () {
            alert.classList.add('fade-out');
        }, 850); // Cambia este valor (en milisegundos) según la duración que desees

        // Eliminar la alerta del DOM después de que termine la animación de desvanecimiento
        alert.addEventListener('transitionend', function () {
            alert.remove();
        });
    }
});



/**===================================================================================== */

// $(document).ready(function() {
//     $('#search-form-estudio').on('submit', function(event) {
//         event.preventDefault();
        
//         // let searchQuery = $('#search').val();
//         var formData = $(this).serialize();
//         $.ajax({
//             url: $(this).attr('action'),
//             method: 'GET',
//             data: formData,
//             success: function(response) {
//                 if(response.idTrabajador) {
//                     $('#idTrabajador').val(response.idTrabajador);
//                     $('#Nombres').val(response.Nombres);
//                     $('#Apellidos').val(response.Apellidos);
//                 } else {
//                     alert('Trabajador no encontrado');
//                 }
//             },
//             error: function(response) {
//                 alert('Error al buscar el trabajador');
//             }
//         });
//     });
// });



$(document).ready(function() {
    $('#search-form-estudio').submit(function(event) {
        event.preventDefault(); // Evita el envío del formulario

        var formData = $(this).serialize(); // Serializa los datos del formulario

        $.ajax({
            type: 'GET',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            success: function(response) {
                $('.idTrabajador').val(response.idTrabajador);
                $('#Nombres').val(response.Nombres);
                $('#Apellidos').val(response.Apellidos);
                $('#idTrabajadorEstudio').val(response.idTrabajador);
                                
            },error: function(response) {
                alert('El Trabajador No Existe');
            }
        });
    });
});

/* ENVIO DE DATOS A EDITAR EN MODULO ESTUDIOS */
// editarEstudio.js

// function editarEstudio(idEstudio, descripcion, idNivelEstudios, idInstitucion, idTrabajador, nombres, apellidos) {
//     // Asigna los valores a los campos del formulario
//     console.log("Valores recibidos:");
//     console.log("idEstudio:", idEstudio);
//     document.getElementById('idEstudio').value = idEstudio;
//     document.getElementById('Descripcion').value = descripcion;
//     document.getElementById('idTrabajador').value = idTrabajador;
//     document.getElementById('idNivelEstudios').value = idNivelEstudios;
//     document.getElementById('idInstitucion').value = idInstitucion;

//     // Seleccionar opciones en los selects
//     document.getElementById('idNivelEstudios').value = idNivelEstudios;
//     document.getElementById('idInstitucion').value = idInstitucion;

//     // Otro ejemplo para mostrar nombres y apellidos
//     document.getElementById('Nombres').value = nombres;
//     document.getElementById('Apellidos').value = apellidos;
// }

// editarEstudio.js
// editarEstudio.js

// document.addEventListener('DOMContentLoaded', ()=> {
    //function editarEstudio(idEstudio, descripcion, idNivelEstudios, idInstitucion, idTrabajador, nombres, apellidos) {
        // Verifica que los elementos existan antes de manipularlos
        // let idEstudioInput = document.querySelector('#idEstudio');
        // e.preventDefault();
        // let descripcionInput = document.getElementById('Descripcion');
        // let idTrabajadorInput = document.getElementById('idTrabajador');
        // let idNivelEstudiosSelect = document.getElementById('idNivelEstudios');
        // let idInstitucionSelect = document.getElementById('idInstitucion');
        // let nombresInput = document.getElementById('Nombres');
        // let apellidosInput = document.getElementById('Apellidos');
        // console.log(idEstudioInput);

        // if (idEstudioInput && descripcionInput && idTrabajadorInput && idNivelEstudiosSelect && idInstitucionSelect && nombresInput && apellidosInput) {
        //     // Asigna los valores a los campos del formulario
        //     idEstudioInput.value = idEstudio;
        //     descripcionInput.value = descripcion;
        //     idTrabajadorInput.value = idTrabajador;
        //     idNivelEstudiosSelect.value = idNivelEstudios;
        //     idInstitucionSelect.value = idInstitucion;
        //     nombresInput.value = nombres;
        //     apellidosInput.value = apellidos;
        // } else {
        //     console.error('No se encontraron todos los elementos necesarios para editar el estudio.');
        // }
    //}
// });

    function editarEstudio(elemento) {
        // Verifica que los elementos existan antes de manipularlos
        let fila=elemento.parentNode.parentNode;
        let idEstudioTabla = fila.cells[0].innerText;
        let idTrabajadorTabla=fila.cells[1].innerText;
        let apellidosTrabajadorTabla=fila.cells[2].innerText;
        let nombresTrabajadorTabla=fila.cells[3].innerText;
        let descripcionEstudioTabla=fila.cells[5].innerText;
        let idInstitucionTabla=fila.cells[8].innerText;
        let idNivelEstudiosTabla=fila.cells[6].innerText;
        document.getElementById('idEstudio').value=idEstudioTabla;
        document.getElementById('idTrabajador').value=idTrabajadorTabla;
        document.getElementById('Apellidos').value=apellidosTrabajadorTabla;
        document.getElementById('Nombres').value=nombresTrabajadorTabla;
        document.getElementById('Descripcion').value=descripcionEstudioTabla;
        document.getElementById('idInstitucion').value=idInstitucionTabla;
        document.getElementById('idNivelEstudios').value=idNivelEstudiosTabla;
        document.getElementById('btn-guardar-estudio').value='Actualizar';
        // let descripcionInput = document.getElementById('Descripcion');
        // let idTrabajadorInput = document.getElementById('idTrabajador');
        // let idNivelEstudiosSelect = document.getElementById('idNivelEstudios');
        // let idInstitucionSelect = document.getElementById('idInstitucion');
        // let nombresInput = document.getElementById('Nombres');
        // let apellidosInput = document.getElementById('Apellidos');
        
        // if (idEstudioInput && descripcionInput && idTrabajadorInput && idNivelEstudiosSelect && idInstitucionSelect && nombresInput && apellidosInput) {
        //     // Asigna los valores a los campos del formulario
        //     idEstudioInput.value = idEstudio;
        //     descripcionInput.value = descripcion;
        //     idTrabajadorInput.value = idTrabajador;
        //     idNivelEstudiosSelect.value = idNivelEstudios;
        //     idInstitucionSelect.value = idInstitucion;
        //     nombresInput.value = nombres;
        //     apellidosInput.value = apellidos;
        // } else {
        //     console.error('No se encontraron todos los elementos necesarios para editar el estudio.');
        // }
    }
