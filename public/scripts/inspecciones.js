console.log('Iniciando inspecciones.js');

base_url = 'http://127.0.0.1:8000/';

//datos usuario
let id_user = JSON.parse($('#id_user').val());

 //datos select
 let parques = JSON.parse($('#parques').val());
 let enterprises = JSON.parse($('#enterprises').val());
 let subestaciones = JSON.parse($('#subestaciones').val());
 let tecnicos = JSON.parse($('#tecnicos').val());

 //nombre de la seccion
 let section = $('#section').val();
 document.querySelector('#page-title').innerHTML = `GNC - ${section}`;

 //Validando data en JSON
//  console.log('parques', parques);
//  console.log('empresas', enterprises);
//  console.log('subestaciones', subestaciones);
//  console.log('tecnicos', tecnicos);

//selects
const select_enterpises = document.querySelector('#select-enterprise');
const select_parque = document.querySelector('#select-parque');
const select_subestacion = document.querySelector('#select-subestacion');
const select_tecnico = document.querySelector('#select-tecnico');

//event submit
const submit = document.querySelector('#modal-form')

$(function() {
    submit.addEventListener("submit", function(e) {
        e.preventDefault()
        // const validate = handleErrors()
        // if (validate === false) return false
        const type = document.querySelector('#btn-submit').getAttribute('data-modal')
        let body = new FormData(document.getElementById("modal-form"))
        body.append('enterprise_id', select_enterpises.value)
        body.append('parque_id', select_parque.value)
        body.append('subestacion_id', select_subestacion.value)
        body.append('tecnico_responsable', select_tecnico.value)
        body.append('fecha_inicio', fecha_ini.value)
        body.append('asignado_por', id_user)
        //CREAR inspeccion  
        const url = base_url + 'admin/inspecciones/store';
        axios.post(url, body)
        .then(res => {
            console.log(res.data)
            console.log(res.data.response)

            if (res.data.response === true) {
                const message = 3
                const route = route('message');
                axios.post(route, {
                        'message': message
                    })
                    .then(res => {
                        console.log(res.data)
                        window.location.href = route('inspeccion.home');
                    })
                    .catch(err => {
                        console.log(err)
                    })
            } else {
                const errors = res.data.errors

                const {
                    subestacion_id: subestacion_id_mensaje,
                    enterprise_id: enterprise_id_mensaje,
                    parque_id: parque_id_mensaje,
                    tecnico_id: tecnico_mensaje,
                    fecha_inicio: fecha_mensaje,
                } = errors
                if (subestacion_id_mensaje) {
                    subestacion_id_error.textContent = subestacion_id_mensaje
                } else {
                    subestacion_id_error.textContent = ''
                }
                if (enterprise_id_mensaje) {
                    enterprise_id_error.textContent = enterprise_id_mensaje
                } else {
                    enterprise_id_error.textContent = ''
                }
                if (parque_id_mensaje) {
                    parque_id_error.textContent = parque_id_mensaje
                } else {
                    parque_id_error.textContent = ''
                }
                if (tecnico_mensaje) {
                    tecnico_id_error.textContent = tecnico_mensaje
                } else {
                    tecnico_id_error.textContent = ''
                }
                if (fecha_mensaje) {
                    fecha_ini_error.textContent = fecha_mensaje
                    fecha_ini_error.classList.remove('input-validated')
                } else {
                    fecha_ini_error.textContent = ''
                    fecha_ini_error.classList.add('input-validated')
                }
            }
        })
        .catch(err => {
            message('Hubo un problema con la petición');
        })
    });
})

//funcion btn-abre-modal
const handleCreate = () => {
    console.trace('handleCreate')
    document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
    
    //titulo modal
    document.querySelector('#modal-title').innerHTML = 'Requerimiento de inspección'

    //select enterpises
    if (select_enterpises.length === 1) {
        console.trace('select_enterprises -> ', 'Select llena campos una sola vez')
        enterprises.forEach(e => {
            const option = document.createElement('option')
            option.value = e.id
            //colocar nombre columna de db
            option.textContent = e.enterprise
            select_enterpises.appendChild(option)
        });
    }

    //select parques
    if (select_parque.length === 1) {
        console.trace('select_parques -> ', 'Select llena campos una sola vez')
        parques.forEach(e => {
            const option = document.createElement('option')
            option.value = e.id
            //colocar nombre columna de db
            option.textContent = e.parque
            select_parque.appendChild(option)
        });
    }

    //select subestaciones
    if (select_subestacion.length === 1) {
        console.trace('select_subestaciones -> ', 'Select llena campos una sola vez')
        subestaciones.forEach(e => {
            const option = document.createElement('option')
            option.value = e.id
            //colocar nombre columna de db
            option.textContent = e.subestacion
            select_subestacion.appendChild(option)
        });
    }

    //select tecnicos
    if (select_tecnico.length === 1) {
        console.trace('select_tecnicos -> ', 'Select llena campos una sola vez')
        tecnicos.forEach(e => {
            const option = document.createElement('option')
            option.value = e.id
            //colocar nombre columna de db
            option.textContent = e.name
            select_tecnico.appendChild(option)
        });
    }
}

select_enterpises.addEventListener('change', () => {
    select_parque.options[0].selected = 'selected';
    console.trace('select_enterprises on change');
    getParques();
})

function getParques() {
}
