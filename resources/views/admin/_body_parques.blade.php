<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between">
                    <p class="text-xl p-0 m-0 text-center self-center">
                        Listado de parques
                    </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-parques"
                        class="text-decoration-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white"
                        data-modal='crear' onclick="handleCreate(this)">
                        <span
                            class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                        <span class="relative font-semibold tracking-wider">
                            <i class="fa-solid fa-plus"></i>
                            Nuevo
                        </span>
                    </a>
                </div>
                <hr>
                <table class="table table-striped table-sm">
                    <thead class="table-dark text-white">
                        <tr>
                            <th class="text-white">Id</th>
                            <th class="text-white">Nombre</th>
                            <th class="text-white">Calle</th>
                            <th class="text-white">Municipio</th>
                            <th class="text-white">Código</th>
                            <th class="text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($parques as $parque)
                            <tr id="row_{{ $parque->id }}">
                                <td scope="row" id="id_{{ $parque->id }}"> {{ $parque->id }}</td>
                                <td scope="row" id="parque_{{ $parque->id }}"> {{ $parque->parque }}</td>
                                <td scope="row" id="calle_{{ $parque->id }}"> {{ $parque->calle }}</td>
                                <td scope="row" id="municipio_{{ $parque->id }}"> {{ $parque->municipio }}</td>
                                <td scope="row" id="codigo_{{ $parque->id }}"> {{ $parque->codigo }}</td>
                                <td scope="row">
                                    <div class="flex justify-start">
                                        <button data-bs-toggle="modal"
                                            data-bs-target="#modal-parques"onclick="handleEdit({{ $parque->id }})"
                                            type="button"class="text-lime-600 border-none bg-transparent mr-5 hover:text-lime-500"
                                            data-modal="edit"><i class="fa-solid fa-pen-fancy"></i>
                                            Editar</button>
                                        <button
                                            onclick="document.getElementById('delete-id').value = {{ $parque->id }}"
                                            type="button"
                                            class="modal-open text-red-600 border-none bg-transparent  hover:text-red-500"
                                            data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                                class="fa-solid fa-trash-can"data-modal="delete"></i>
                                            Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <h1>No hay parques</h1>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $parques->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



<script defer async="false">
    $(function() {
        const codigo_error = document.querySelector('#codigo_error')
        const parque = document.querySelector('#parque')
        const calle = document.querySelector('#calle')
        const municipio = document.querySelector('#municipio')
        const codigio = document.querySelector('#codigo')
        const parque_error = document.querySelector('#parque_error')
        const calle_error = document.querySelector('#calle_error')
        const municipio_error = document.querySelector('#municipio_error')
        document.querySelector('#page-title').innerHTML = 'GNC - {{ $section_cute }}';

        const submit = document.getElementById("btn-submit")
        submit.addEventListener("click", function(e) {
            event.preventDefault()
            cleanErrors()
            const type = submit.getAttribute('data-modal')
            //CREAR PARQUE  
            if (type === 'create') {
                console.log('entro aqui')
                const route = '{{ route('parques.store') }}'
                console.log(route)

                let body = new FormData(document.getElementById("modal-form"))
                $.ajax({
                    url: route,
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: body,
                    dataType: 'json',
                }).done((json) => {
                    console.log(json)
                    if (json.response === true) {
                        const route = '{{ route('message', '1') }}'
                        const message = 1
                        $.ajax({
                            type: "post",
                            url: route,
                            data: {
                                message
                            },
                            success: function(response) {
                                console.log('message', response)
                                location.replace('{{ route('parques.home') }}');
                            },
                            error: function(err) {
                                message('Hubo un problema con la petición')
                            }
                        });
                        // window.location.href = '{{ route('parques.home', 'created') }}'
                    } else {
                        const errors = json.errors;
                        const {
                            parque: mensaje_parque,
                            calle: mensaje_calle,
                            municipio: mensaje_municipio,
                            codigo: mensaje_codigo,
                        } = errors

                        if (mensaje_parque) {
                            parque_error.innerHTML = mensaje_parque
                        }
                        if (mensaje_calle) {
                            calle_error.innerHTML = mensaje_calle
                        }
                        if (mensaje_municipio) {
                            municipio_error.innerHTML = mensaje_municipio
                        }
                        if (mensaje_codigo) {
                            codigo_error.innerHTML = mensaje_codigo
                        }
                    }
                }).fail((response) => {
                    message('Hubo un problema con la petición')
                })
            }
            if (type === 'edit') {
                const id = document.getElementById('edit-id').value
                const tmp = '{{ route('parques.actualizar', ':id') }}'
                const route = tmp.replace(':id', id)
                const body = new FormData(document.getElementById("modal-form"))
                $.ajax({
                    url: route,
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: body,
                    dataType: 'json',
                }).done((json) => {
                    if (json.response) {
                        message('Actualizado correctamente')
                        $('#button_close').click()
                        e = document.querySelector('#row_' + id)
                        document.querySelector('#parque_' + id).textContent = body.get('parque')
                        document.querySelector('#calle_' + id).textContent = body.get('calle')
                        document.querySelector('#municipio_' + id).textContent = body.get(
                            'municipio')
                        document.querySelector('#codigo_' + id).textContent = body.get('codigo')
                    } else {
                        const errors = json.errors;
                        const {
                            parque: mensaje_parque,
                            calle: mensaje_calle,
                            municipio: mensaje_municipio,
                            codigo: mensaje_codigo,
                        } = errors
                        if (mensaje_parque) {
                            parque_error.innerHTML = mensaje_parque
                        }
                        if (mensaje_calle) {
                            calle_error.innerHTML = mensaje_calle
                        }
                        if (mensaje_municipio) {
                            municipio_error.innerHTML = mensaje_municipio
                        }
                        if (mensaje_codigo) {
                            codigo_error.innerHTML = mensaje_codigo
                        }
                    }
                }).fail((response) => {
                    message('Hubo un problema con la petición')
                })
            }
        });

        $('#modal-parques').on('hidden.bs.modal', (e) => {
            clearModal()
        })


        @if (Session::has('message'))
            @if (Session::get('message') == 1)
                message('Parque creado con éxito')
            @endif
        @endif
    })

    function cleanErrors() {
        parque_error.textContent = ''
        calle_error.textContent = ''
        municipio_error.textContent = ''
        codigo_error.textContent = ''
    }
    //ELIMINAR 
    function handleDelete() {
        const id = document.getElementById('delete-id').value
        console.log('Eliminar', id)
        let url = '{{ route('parques.delete', ':id') }}';
        url = url.replace(':id', id)
        console.log(url)
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
        }).done((json) => {
            console.log(json)
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
    // CERRAR MODAL
    function clearModal(e) {
        parque.value = ''
        calle.value = ''
        municipio.value = ''
        codigo.value = ''
        parque_error.textContent = ''
        calle_error.textContent = ''
        municipio_error.textContent = ''
        codigo_error.textContent = ''
    }

    function handleCreate() {
        clearModal()
        document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
        document.querySelector('#modal-title').innerHTML = 'Crear parque'
        setTimeout(() => {
            // parque.focus()
        }, 500);
    }

    function handleEdit(id) {
        document.querySelector('#btn-submit').setAttribute('data-modal', 'edit')
        document.querySelector('#modal-title').innerHTML = 'Editar parque'
        document.getElementById('edit-id').value = id

        document.querySelector('.spinner-position').style.opacity = 1
        document.querySelector('.spinner-hide').style.opacity = 0

        url = '{{ route('parques.get', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            type: "get",
            url: url,
            dataType: "json"
        }).done((json) => {
            console.log()
            const {
                id: id_resuesta,
                parque: parque_respuesta,
                calle: calle_respuesta,
                municipio: municipio_respuesta,
                codigo: codigo_respuesta,
                response
            } = json
            if (response === false) {
                message('Hubo un problema...')
                clearModal()
                return false;
            }
            document.querySelector('#id').value = id_resuesta
            document.querySelector('#parque').value = parque_respuesta
            document.querySelector('#calle').value = calle_respuesta
            document.querySelector('#municipio').value = municipio_respuesta
            document.querySelector('#codigo').value = codigo_respuesta
            document.querySelector('#parque').focus()
            document.querySelector('.spinner-position').style.opacity = 0
            document.querySelector('.spinner-hide').style.opacity = 1
        }).fail((err) => {
            message('Hubo un problema con la petición')
        })
    }
</script>
