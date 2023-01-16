console.log('Iniciando inspecciones.js');


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
        const url = route[0];

        axios.post(url, body)
        .then(res => {
            console.log(res.data)
            console.log(res.data.response)

            if (res.data.response === true) {
                const message = 7
                const url = route[4] ;
                axios.post(url , {
                        'message': message
                    })
                    .then(res => {
                        console.log(res.data)
                        clearModal()
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
    let url = route[1];

    url = url.replace(':id', id)
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
enterprise_id_error.textContent = ''

    parque_id_error.textContent = ''
    subestacion_id_error.textContent = ''
    tecnico_id_error.textContent = ''
    fecha_ini_error.textContent = ''
    
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
    console.log('AQUII')
    const enterprise = select_enterprises.options[select_enterprises.selectedIndex].textContent
    console.trace('select_enterprises on change -> nombre empresa', enterprise)
    const url = route[2];
    console.log(url)
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
    const url = route[3];
console.log(url)
    
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

function handleDetalle(id){
console.log(id)
const inspeccion =JSON.parse( $('#inspeccion_general_'+id).html())
const parque =JSON.parse( $('#inspeccion_parque_'+id).html())
const enterprise =JSON.parse( $('#inspeccion_enterprise_'+id).html())
const subestacion = JSON.parse( $('#inspeccion_subestacion_'+id).html())
const status = JSON.parse( $('#inspeccion_status_'+id).html())
console.log(inspeccion)
console.log(parque)
console.log(enterprise)
console.log(subestacion)
console.log(status)

$('#parque').text(parque.parque)
$('#empresa').text(enterprise.enterprise)
$('#subestacion').text(subestacion.subestacion)
if(status.id === 4){
    $('#status').text('POR COMENZAR')
    $('#resumen').text('Inspeccion asignada, el técnico no ha comenzado la inspeccion')
}
if(status.id === 5){
    $('#status').text('FINALIZADA')
    $('#resumen').text('Inspeccion finalizada')
}
if(status.id === 6){
    $('#status').text('EN PROCESO')
    $('#resumen').text('Esta inspeccion se encuentra en proceso de ejecución... ' + inspeccion.porcentaje + '%')
}
$('#asignada').text(inspeccion.fecha_inicio)
if(inspeccion.fecha_comienzo === null){
$('#iniciada').text('No iniciada') 
}else{
    $('#iniciada').text(inspeccion.fecha_comienzo )
}if(inspeccion.fecha_fin === null){
    $('#finalizada').text('...') 
    }else{
        $('#finalizada').text(inspeccion.fecha_fin) 
    }
}