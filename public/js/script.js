document.getElementById('votingForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío por defecto

    // Validación del campo "Nombre y Apellido" (No debe quedar en Blanco.)
    const nombre = document.getElementById('nombre').value;
    if (nombre.trim() === '') {
        alert('El campo Nombre y Apellido no puede estar vacío.');
        return;
    }

    // Validación del campo "Alias" (Validar que la cantidad de caracteres sea mayor a 5 y que contenga letras y números.)
    const alias = document.getElementById('alias').value;
    if (alias.length <= 5 || !/\d/.test(alias) || !/[a-zA-Z]/.test(alias)) {
        alert('El alias debe tener más de 5 caracteres y contener letras y números.');
        return;
    }

    // Validación del RUT (Deberá Validar el RUT (Formato Chile).)
    const rut = document.getElementById('rut').value;
    if (!validarRUT(rut)) {
        alert('El RUT no es válido.');
        return;
    }

    // Validación del Email (Deberá validar el correo según estándar.) 
    const email = document.getElementById('email').value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('El email no es válido.');
        return;
    }

    // Validación del Combo Box Región y Comuna (Los Combo Box Región y Comuna deben cargar los datos desde Base de Datos. No deberán quedar en blanco y entre los combos debe existir relación Región->Comuna. )
    const region = document.getElementById('region').value;
    const comuna = document.getElementById('comuna').value;
    if (region === '') {
        alert('Debe seleccionar una región.');
        return;
    }
    if (comuna === '') {
        alert('Debe seleccionar una comuna.');
        return;
    }

    // Validación del Combo Box "Candidato" (El Combo Box Candidato debe cargar los datos desde Base de Datos. )
    const candidato = document.getElementById('candidato').value;
    if (candidato === '') {
        alert('Debe seleccionar un candidato.');
        return;
    }

    // Validación de checkbox "Cómo se enteró de nosotros" (Checkbox “Como se enteró de Nosotros”: Debe elegir al menos dos opciones. )
    const checkboxes = document.querySelectorAll('input[name="enterado[]"]:checked');
    if (checkboxes.length < 2) {
        alert('Debes seleccionar al menos dos opciones en "Cómo se enteró de nosotros".');
        return;
    }

    // Lógica para verificar la duplicación de votos por RUT
    const formData = new FormData(document.getElementById('votingForm'));
    fetch('process.php?action=checkRUT', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.exists) {
            alert('El RUT ingresado ya ha votado. Porfavor ingrese otro RUT');
        } else {
            // Si el RUT no existe, se envia el formulario y guardamos el voto.
            fetch('process.php?action=submitVote', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Voto registrado con éxito.');
                    document.getElementById('votingForm').reset();
                } else {
                    alert('Error al registrar el voto.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al registrar el voto.');
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al verificar el RUT.');
    });
});

//Lógica de validación del formato RUT
function validarRUT(rut) {
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
