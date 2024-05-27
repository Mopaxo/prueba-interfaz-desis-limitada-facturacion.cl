document.getElementById('votingForm').addEventListener('submit', function(event) {
    // Validación del campo Nombre y Apellido
    const nombre = document.getElementById('nombre').value;
    if (nombre.trim() === '') {
        alert('El campo Nombre y Apellido no puede estar vacío.');
        event.preventDefault();
        return;
    }

    // Validación del campo Alias
    const alias = document.getElementById('alias').value;
    if (alias.length <= 5 || !/\d/.test(alias) || !/[a-zA-Z]/.test(alias)) {
        alert('El alias debe tener más de 5 caracteres y contener letras y números.');
        event.preventDefault();
        return;
    }

    // Validación del RUT (aquí puedes agregar una función para validar el formato chileno)
    const rut = document.getElementById('rut').value;
    if (!validarRUT(rut)) {
        alert('El RUT no es válido.');
        event.preventDefault();
        return;
    }

    // Validación del Email
    const email = document.getElementById('email').value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('El email no es válido.');
        event.preventDefault();
        return;
    }

    // Validación del Combo Box Región y Comuna
    const region = document.getElementById('region').value;
    const comuna = document.getElementById('comuna').value;
    if (region === '') {
        alert('Debe seleccionar una región.');
        event.preventDefault();
        return;
    }
    if (comuna === '') {
        alert('Debe seleccionar una comuna.');
        event.preventDefault();
        return;
    }

    // Validación del Combo Box Candidato
    const candidato = document.getElementById('candidato').value;
    if (candidato === '') {
        alert('Debe seleccionar un candidato.');
        event.preventDefault();
        return;
    }

    // Validación de checkboxes "Cómo se enteró de nosotros"
    const checkboxes = document.querySelectorAll('input[name="enterado[]"]:checked');
    if (checkboxes.length < 2) {
        alert('Debes seleccionar al menos dos opciones en "Cómo se enteró de nosotros".');
        event.preventDefault();
        return;
    }

    // Aquí puedes agregar la lógica para verificar la duplicación de votos por RUT
    // Por ejemplo, puedes hacer una solicitud AJAX al servidor para verificarlo
});

function validarRUT(rut) {
    // Implementación de la lógica de validación del RUT
    rut = rut.replace(/\./g, '').replace(/-/g, '');
    if (rut.length < 8) return false;
    var body = rut.slice(0, -1);
    var dv = rut.slice(-1).toUpperCase();
    var sum = 0;
    var multiplier = 2;

    for (var i = 1; i <= body.length; i++) {
        sum += multiplier * body.charAt(body.length - i);
        multiplier = (multiplier < 7) ? multiplier + 1 : 2;
    }

    var expectedDv = 11 - (sum % 11);
    expectedDv = expectedDv === 11 ? '0' : expectedDv === 10 ? 'K' : expectedDv.toString();

    return dv === expectedDv;
}

// Cargar las regiones desde la base de datos
function cargarRegiones() {
    fetch('process.php?action=getRegions')
        .then(response => response.json())
        .then(data => {
            const regionSelect = document.getElementById('region');
            regionSelect.innerHTML = '<option value="">Seleccione una región</option>';
            data.forEach(region => {
                const option = document.createElement('option');
                option.value = region.id;
                option.textContent = region.nombre;
                regionSelect.appendChild(option);
            });
        });
}

// Cargar las comunas correspondientes a la región seleccionada desde la base de datos
function cargarComunas(regionId) {
    fetch(`process.php?action=getComunas&region_id=${regionId}`)
        .then(response => response.json())
        .then(data => {
            const comunaSelect = document.getElementById('comuna');
            comunaSelect.innerHTML = '<option value="">Seleccione una comuna</option>';
            data.forEach(comuna => {
                const option = document.createElement('option');
                option.value = comuna.id;
                option.textContent = comuna.nombre;
                comunaSelect.appendChild(option);
            });
        });
}

// Cargar los candidatos desde la base de datos
function cargarCandidatos() {
    fetch('process.php?action=getCandidatos')
        .then(response => response.json())
        .then(data => {
            const candidatoSelect = document.getElementById('candidato');
            candidatoSelect.innerHTML = '<option value="">Seleccione un candidato</option>';
            data.forEach(candidato => {
                const option = document.createElement('option');
                option.value = candidato.id;
                option.textContent = candidato.nombre;
                candidatoSelect.appendChild(option);
            });
        });
}

// Inicializar la carga de regiones y candidatos al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    cargarRegiones();
    cargarCandidatos();
});

// Cargar las comunas cuando se selecciona una región
document.getElementById('region').addEventListener('change', function() {
    cargarComunas(this.value);
});