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
const select_enterprises = document.querySelector('#select-enterprise');
const select_parque = document.querySelector('#select-parque');
const select_subestacion = document.querySelector('#select-subestacion');
const select_tecnico = document.querySelector('#select-tecnico');

//event submit
const submit = document.querySelector('#modal-form')

$(function() {
    //btn submit
    submit.addEventListener("submit", function(e) {
        e.preventDefault()
        let body = new FormData(document.getElementById("modal-form"))
        body.append('enterprise_id', select_enterprises.value)
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
                const route = base_url + 'message';
                axios.post(route, {
                        'message': message
                    })
                    .then(res => {
                        console.log(res.data)
                        window.location.reload();
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
                    tecnico_responsable: tecnico_mensaje,
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
            console.log(err)
            message('Hubo un problema con la petición');
        })
    });
})

//Borrar inspeccion
const handleDelete = () => {
    const id = document.getElementById('delete-id').value
    let url = base_url + 'admin/inspecciones/delete/' + id;
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
    }).done((json) => {
        if (json.response) {
            message('Eliminado correctamente')
            document.querySelector('#row_' + id).remove()
        } else {
            message('Hubo un problema con la petición')
        }
    }).fail((err) => {
        message('Hubo un problema con la petición')
    })
}

//Borra datos al cerrar modal
const clearModal = () => {

    select_enterprises.length = 1
    select_parque.length = 1
    select_subestacion.length = 1
    select_tecnico.length = 1

    //vaciado de selects
    select_enterprises.value = ''
    select_parque.value = ''
    select_subestacion.value = ''
    select_tecnico.value = ''

    document.querySelector('#fecha_ini').value = null
}

//funcion btn-abre-modal
const handleCreate = () => {
    console.trace('handleCreate')
    document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
    
    //titulo modal
    document.querySelector('#modal-title').innerHTML = 'Requerimiento de inspección'

    //select enterpises
    if (select_enterprises.length === 1) {
        console.trace('select_enterprises -> ', 'Select llena campos una sola vez')
        enterprises.forEach(e => {
            const option = document.createElement('option')
            option.value = e.id
            //colocar nombre columna de db
            option.textContent = e.enterprise
            select_enterprises.appendChild(option)
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

// Seleccionar empresa para obtener parques
select_enterprises.addEventListener('change', () => {
    select_parque.options[0].selected = 'selected';
    console.trace('select_enterprises on change');
    getParques();
})

// Seleccionar parque para obtener subestaciones
select_parque.addEventListener('change', () => {
    select_subestacion.options[0].selected = 'selected';
    console.trace('select_parque on change');
    getSubestaciones();
})

function getParques() {
    const enterprise = select_enterprises.options[select_enterprises.selectedIndex].textContent
    console.trace('select_enterprises on change -> nombre empresa', enterprise)
    const url = base_url + 'admin/inspecciones/getParques/';
    axios.post(url, {
        'enterprise': enterprise
    }).then(res => {
        console.log(res.data.response)

        select_parque.length = 1
        res.data.response.forEach(e => {
            const option = document.createElement('option')
            //colocar nombre columna de db
            option.value = e.parque_id
            option.textContent = e.parque
            select_parque.appendChild(option)
        })
    }).catch(err => {
        console.log(err)
    })
}

function getSubestaciones() {
    const enterprise_id = select_enterprises.value;
    const parque_id = select_parque.value;
    const url = base_url + 'admin/inspecciones/getSubestaciones/';
    axios.post(url, {
        'enterprise_id': enterprise_id,
        'parque_id': parque_id
    }).then(res => {
        console.log(res.data.response)

        select_subestacion.length = 1
        res.data.response.forEach(e => {
            const option = document.createElement('option')
            //colocar nombre columna de db
            option.value = e.id
            option.textContent = e.subestacion
            select_subestacion.appendChild(option)
        })
    }).catch(err => {
        console.log(err)
    })
}
