document.addEventListener("DOMContentLoaded", function() {
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
});
