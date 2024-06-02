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
    document.getElementById("home-btn").addEventListener("click", function() {
        document.getElementById("content").innerHTML = defaultContent;
    });
});
