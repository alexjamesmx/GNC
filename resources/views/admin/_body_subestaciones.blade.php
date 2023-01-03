<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            @if (count($subestaciones) !== 0)
                <div class="card-body">
                    <div class="flex justify-between">
                        <p class="text-xl p-0 m-0 text-center self-center">
                            Listado de subestaciones
                        </p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-subestaciones"
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
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th class="text-white"scope="col">Id</th>
                                    <th class="text-white"scope="col">Subestación</th>
                                    <th class="text-white"scope="col">Tipo</th>
                                    <th class="text-white"scope="col">Empresa</th>
                                    <th class="text-white"scope="col">Parque</th>
                                    <th class="text-white"scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($subestaciones as $subestacion)
                                    <tr id="row_{{ $subestacion->id }}">
                                        {{-- ID --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial">
                                            <p id="id_{{ $subestacion->id }}" class="m-0">
                                                {{ $subestacion->id }}
                                        </td>
                                        </p>
                                        {{-- SUBESTACION --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial ">
                                            <p id="subestacion_{{ $subestacion->id }}" class="m-0">
                                                {{ $subestacion->subestacion }}</p>
                                        </td>
                                        {{-- TIPO --}}
                                        <td scope="row"
                                            style="min-width:fit-content; white-space:initial "id="type_{{ $subestacion->id }}">
                                            {{ $subestacion->type->type }}
                                        </td>
                                        <input type="text" id="type_id_{{ $subestacion->id }}" hidden
                                            value="{{ $subestacion->type->id }}">
                                        {{-- EMPRESA A LA QUE PERTENECE --}}
                                        <td scope="row"
                                            style="min-width:fit-content; white-space:initial"id="enterprise_{{ $subestacion->id }}"
                                            data-id-enterprise="{{ $subestacion->enterprise->id }}"
                                            data-name-enterprise="{{ $subestacion->enterprise->enterprise }}">
                                            {{ $subestacion->enterprise->enterprise }}
                                        </td>
                                        <input type="text" id="enterprise_id_{{ $subestacion->id }}" hidden
                                            value="{{ $subestacion->enterprise->id }}">
                                        {{-- PARQUE AL QUE PERTENECE --}}
                                        <td scope="row"
                                            style="min-width:fit-content; white-space:initial"id="parque_{{ $subestacion->id }}"data-parqueid="{{ $subestacion->parque->id }}">
                                            {{ $subestacion->parque->parque }}

                                        </td>
                                        <input type="text" id="parque_id_{{ $subestacion->id }}" hidden
                                            value="{{ $subestacion->parque->id }}">
                                        {{-- ACCIONES --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial">
                                            <div class="flex justify-start">
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#modal-subestaciones"onclick="handleEdit({{ $subestacion->id }})"
                                                    type="button"class="text-lime-600 border-none bg-transparent mr-5 hover:text-lime-500"
                                                    data-modal="edit"><i class="fa-solid fa-pen-fancy"></i>
                                                    Editar</button>
                                                <button
                                                    onclick="document.getElementById('delete-id').value = {{ $subestacion->id }}"
                                                    type="button"
                                                    class="modal-open text-red-600 border-none bg-transparent  hover:text-red-500"
                                                    data-bs-toggle="modal" data-bs-target="#modal-delete"><i
                                                        class="fa-solid fa-trash-can"data-modal="delete"></i>
                                                    Eliminar</button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h1>No hay empresas</h1>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $subestaciones->links() }}
                    </div>
                </div>
            @else
                <div class="flex relative justify-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-subestaciones"
                        class="text-decoration-none rounded  inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white self-end absolute right-0 top-0"
                        data-modal='crear' onclick="handleCreate(this)">
                        <span
                            class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                        <span class="relative font-semibold tracking-wider">
                            <i class="fa-solid fa-plus"></i>
                            Nuevo
                        </span>
                    </a>
                    <p class="text-2xl text-center mt-5">No se encuentran subestaciones registradas</p>

                </div>
                <img class="self-center my-5"src="{{ asset('images/gnc/sad.svg') }}" width="80px" height="80px"
                    alt="">
            @endif
        </div>
    </div>
</div>
<script defer async="false">
    document.querySelector('#page-title').innerHTML = 'GNC - {{ $section_cute }}';
    const subestaciones = @json($subestaciones);
    const parques = @json($parques);
    const enterprises = @json($enterprises);
    const select_enterprises = @json($select_enterprises)

    const form_subestacion = document.querySelector('#subestacion')
    const form_subestacion_error = document.querySelector('#subestacion_error')

    const form_type_select = document.querySelector('#type_id')
    const form_type_select_error = document.querySelector('#type_id_error')

    const form_parque_select = document.querySelector('#parque_id')
    const form_parque_select_error = document.querySelector('#parque_id_error')

    const form_enterprise_select = document.querySelector('#enterprise_id')
    const form_enterprise_select_error = document.querySelector('#enterprise_id_error')

    const submit = document.querySelector('#modal-form')
    const form_clean = document.querySelector('#clean')

    $(function() {

        form_clean.addEventListener('click', () => {
            form_subestacion.value = ''
            form_type_select.value = 0
            form_enterprise_select.value = 0
            form_parque_select.value = 0
            form_subestacion_error.textContent = ''
            form_type_select_error.textContent = ''
            form_parque_select_error.textContent = ''
            form_enterprise_select_error.textContent = ''
            document.querySelector('#id').value = null
        })

        submit.addEventListener("submit", function(e) {
            e.preventDefault()
            const validate = handleErrors()
            if (validate === false) return false
            const type = document.querySelector('#btn-submit').getAttribute('data-modal')
            let body = new FormData(document.getElementById("modal-form"))
            body.append('type_id', type_id.value)
            body.append('parque_id', parque_id.value)
            body.append('enterprise_id', enterprise_id.value)
            //CREAR PARQUE  
            if (type === 'create') {

                const route = '{{ route('subestacion.store') }}'

                axios.post(route, body)
                    .then(res => {
                        console.log(res.data)
                        console.log(res.data.response)

                        if (res.data.response === true) {
                            const message = 3
                            const route = '{{ route('message') }}'
                            axios.post(route, {
                                    'message': message
                                })
                                .then(res => {
                                    console.log(res.data)
                                    window.location.href = '{{ route('subestacion.home') }}'
                                })
                                .catch(err => {
                                    console.log(err)
                                })
                        } else {
                            const errors = res.data.errors

                            const {
                                subestacion: subestacion_mensaje,
                                enterprise_id: enterprise_id_mensaje,
                                parque_id: parque_id_mensaje,
                                type_id: type_id_mensaje
                            } = errors
                            if (subestacion_mensaje) {
                                subestacion_error.textContent = subestacion_mensaje
                                subestacion.classList.remove('input-validated')
                            } else {
                                subestacion_error.textContent = ''
                                subestacion.classList.add('input-validated')
                            }
                            if (enterprise_id_mensaje) {
                                enterprise_id_error.textContent = enterprise_id_mensaje
                            } else {
                                enterprise_id_error.textContent = ''
                            }
                            if (parque_id_mensaje) {
                                parque_id_error.textContent = parque_id_mensaje
                            } else {
                                enterprise_id_error.textContent = ''
                            }
                            if (type_id_mensaje) {
                                type_id_error.textContent = type_id_mensaje
                            } else {
                                enterprise_id_error.textContent = ''
                            }
                        }
                    })
                    .catch(err => {
                        message('Hubo un problema con la petición');
                    })
            }
            if (type === 'edit') {
                const route = '{{ route('subestacion.update', ':id') }}'
                const url = route.replace(':id', document.querySelector('#id').value)

                axios.post(url, body)
                    .then(res => {
                        if (res.data.response === true) {
                            console.log('EDITA SUCCESS')

                            document.querySelector('#subestacion_' + body.get('id')).innerHTML =
                                body.get('subestacion')
                            document.querySelector('#type_' + body.get('id')).innerHTML = body.get(
                                'type_id') == 1 ? 'Compacta' : 'Pedestal'
                            document.querySelector('#type_id_' + body.get('id')).value = body.get(
                                'type_id')
                            document.querySelector('#parque_' + body.get('id')).innerHTML =
                                parque_id.options[parque_id.selectedIndex].text
                            document.querySelector('#parque_id_' + body.get('id')).value = body.get(
                                'parque_id')
                            document.querySelector('#parque_' + body.get('id')).innerHTML =
                                parque_id.options[parque_id.selectedIndex].text

                            document.querySelector('#enterprise_id_' + body.get('id')).value = body
                                .get('enterprise_id')
                            document.querySelector('#enterprise_' + body.get('id')).innerHTML =
                                enterprise_id.options[enterprise_id.selectedIndex].text

                            document.querySelector('#button_close').click()
                            message('Actualizado correctamente');
                        } else {
                            const errors = res.data.errors
                            const {
                                subestacion: subestacion_mensaje,
                                enterprise_id: enterprise_id_mensaje,
                                parque_id: parque_id_mensaje,
                                type_id: type_id_mensaje
                            } = errors
                            if (subestacion_mensaje) {
                                form_subestacion_error.textContent = subestacion_mensaje
                                form_subestacion.classList.remove('input-validated')
                            } else {
                                form_subestacion_error.textContent = ''
                                form_subestacion.classList.add('input-validated')
                            }
                            if (enterprise_id_mensaje) {
                                form_enterprise_select.textContent = enterprise_id_mensaje
                            } else {
                                form_enterprise_select_error.textContent = ''
                                form_enterprise_select.classList.add('input-validated')
                            }
                            if (parque_id_mensaje) {
                                form_parque_select.textContent = parque_id_mensaje
                            } else {
                                form_parque_select_error.textContent = ''
                                form_parque_select.classList.add('input-validated')
                            }
                            if (type_id_mensaje) {
                                form_type_select_error.textContent = type_id_mensaje
                            } else {
                                form_type_select_error.textContent = ''
                                form_type_select.classList.add('input-validated')
                            }
                        }
                    })
                    .catch(err => {
                        message('Hubo un problema con la petición');
                    })
            }
        });
        $('#modal-subestaciones').on('hidden.bs.modal', (e) => {
            form_subestacion.classList.remove('input-validated')
            form_type_select.classList.remove('input-validated')
            form_parque_select.classList.remove('input-validated')
            form_enterprise_select.classList.remove('input-validated')
        })
    })

    function handleErrors() {
        let x = 0
        if (subestacion.value === '') {
            form_subestacion_error.textContent = 'Este campo es requerido'
            form_subestacion.classList.remove('input-validated')
            x = 1
        } else {
            form_subestacion_error.textContent = ''
            form_subestacion.classList.add('input-validated')
        }

        if (form_type_select.value === "0") {
            form_type_select_error.textContent = 'Este campo es requerido'
            form_type_select.classList.remove('input-validated')
            x = 1
        } else {
            form_type_select_error.textContent = ''
            form_type_select.classList.add('input-validated')
        }
        if (form_parque_select.value === "0") {
            form_parque_select_error.textContent = 'Este campo es requerido'
            form_parque_select.classList.remove('input-validated')
            x = 1
        } else {
            form_parque_select_error.textContent = ''
            form_parque_select.classList.add('input-validated')
        }
        if (form_enterprise_select.value === "0") {
            form_enterprise_select_error.textContent = 'Este campo es requerido'
            form_enterprise_select.classList.remove('input-validated')
            x = 1
        } else {
            form_enterprise_select_error.textContent = ''
            form_enterprise_select.classList.add('input-validated')
        }
        if (x === 1) return false
        return true;
    }

    //ELIMINAR SUBESTACION
    const handleDelete = () => {
        const id = document.getElementById('delete-id').value
        let url = '{{ route('subestacion.delete', ':id') }}';
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
    // CERRAR MODAL
    const clearModal = (e) => {
        const type = document.querySelector('#btn-submit').getAttribute('data-modal')
        if (type === 'create') return false

        form_parque_select.length = 1
        form_enterprise_select.length = 1
        form_subestacion.value = ''
        form_type_select.value = 0
        form_parque_select.value = 0
        form_enterprise_select.value = 0
        form_subestacion_error.textContent = ''
        form_type_select_error.textContent = ''
        form_parque_select_error.textContent = ''
        form_enterprise_select_error.textContent = ''
        document.querySelector('#id').value = null
    }

    const handleCreate = () => {
        console.trace('handleCreate')
        document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
        document.querySelector('#modal-title').innerHTML = 'Registrar subestación'
        // form_parque_select.options[0].selected = 'selected';
        if (form_enterprise_select.length === 1) {
            console.trace('handleCreate -> ', 'Select llena campos una sola vez')
            select_enterprises.forEach(e => {
                const option = document.createElement('option')
                option.value = e.id
                option.textContent = e.enterprise
                form_enterprise_select.appendChild(option)
            });
        }
    }

    const handleEdit = (id) => {
        document.querySelector('.spinner-position').style.opacity = 1
        document.querySelector('.spinner-hide').style.opacity = 0
        clearModal()
        document.querySelector('#id').value = id
        document.querySelector('#btn-submit').setAttribute('data-modal', 'edit')
        document.querySelector('#modal-title').innerHTML = 'Editar subestación'
        document.getElementById('edit-id').value = id


        url = '{{ route('enterprise.get', ':id') }}';
        url = url.replace(':id', id);

        form_subestacion.value = document.querySelector('#subestacion_' + id).textContent
        const parque_id = document.querySelector('#parque_id_' + id).value
        const enterprise_id = document.querySelector('#enterprise_' + id).getAttribute(
            'data-id-enterprise')
        const enterprise_name = document.querySelector('#enterprise_' + id).getAttribute(
            'data-name-enterprise')

        form_type_select.value = document.querySelector('#type_id_' + id).value
        console.trace('handleEdit -> parque_id: ', parque_id)
        console.trace('handleEdit -> enteprise id: ', enterprise_id, ' ', enterprise_name)

        select_enterprises.forEach(e => {
            const option = document.createElement('option')
            option.textContent = e.enterprise
            if (e.enterprise === enterprise_name) {
                option.value = enterprise_id
            } else {
                option.value = e.id
            }
            form_enterprise_select.value = enterprise_id
            form_enterprise_select.appendChild(option)
        });
        getParques(id)
        console.trace('ID AL EDITART', document.querySelector('#parque_' + id).getAttribute('data-parqueid'))

        document.querySelector('.spinner-position').style.opacity = 0
        document.querySelector('.spinner-hide').style.opacity = 1
    }

    form_enterprise_select.addEventListener('change', () => {
        form_parque_select.options[0].selected = 'selected';
        console.trace('form_enterprise_select on change')
        const type = document.querySelector('#btn-submit').getAttribute('data-modal')
        console.trace('form_enterprise_select on change -> TYPE: ', type)
        getParques()
    })

    form_parque_select.addEventListener('change', () => {
        console.trace('form_parque_select on change')
        const type = document.querySelector('#btn-submit').getAttribute('data-modal')
        console.trace('form_parque_select on change -> TYPE: ', type)

        console.trace('aqui')

        const route = "{{ route('subestacion.get_enterprise_id_on_select') }}"
        const parque_id = form_parque_select.options[form_parque_select.selectedIndex].value
        const enterprise = form_enterprise_select.options[form_enterprise_select.selectedIndex].textContent

        const json = {
            'parque_id': parque_id,
            'enterprise': enterprise
        }
        axios.post(route, json)
            .then(res => {
                if (form_parque_select.length > 2) {
                    form_enterprise_select.options[form_enterprise_select.selectedIndex].value = res
                        .data
                        .response.id
                }
            })
            .catch(err => {
                console.error(err);
            })
    })

    function getParques(id = 0) {

        const enterprise = enterprise_id.options[enterprise_id.selectedIndex].textContent
        console.trace('form_enterprise_select on change -> nombre empresa', enterprise)

        form_enterprise_select.lenght = 1
        const route = '{{ route('subestacion.get_parques_by_name') }}';
        axios.post(route, {
            "enterprise": enterprise
        }).then(res => {
            console.log(res.data.response)
            const {
                parque_id,
                parque
            } = res.data.response

            form_parque_select.length = 1
            res.data.response.forEach(e => {
                const option = document.createElement('option')
                option.value = e.parque_id
                option.textContent = e.parque
                form_parque_select.appendChild(option)
            })

            if (id > 0) {
                console.trace('ID AL EDITART 2', document.querySelector('#parque_' + id).getAttribute(
                    'data-parqueid'))
                form_parque_select.value = document.querySelector('#parque_' + id).getAttribute('data-parqueid')
            }

        }).catch(err => {
            message('Intentalo mas tarde...')
            console.error(err)
        })
    }
    @if (Session::has('message'))
        @if (Session::get('message') == 3)
            message('Subestación creada con éxito')
        @endif
    @endif
</script>
