<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
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
                                        <p id="id_{{ $subestacion->id }}">
                                            {{ $subestacion->id }}
                                    </td>
                                    </p>
                                    {{-- SUBESTACION --}}
                                    <td scope="row" style="min-width:fit-content; white-space:initial ">
                                        <p id="subestacion_{{ $subestacion->id }}">{{ $subestacion->subestacion }}</p>
                                    </td>
                                    {{-- TIPO --}}
                                    <td scope="row" style="min-width:fit-content; white-space:initial "id="type_{{ $subestacion->id }}">
                                        {{ $subestacion->type->type }}
                                    </td>
                                    <input type="text" id="type_id_{{ $subestacion->id }}" hidden
                                            value="{{ $subestacion->type->id }}">
                                    {{-- EMPRESA A LA QUE PERTENECE --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="enterprise_{{ $subestacion->id }}">
                                        {{ $subestacion->enterprise->enterprise }}
                                    </td>
                                    <input type="text" id="enterprise_id_{{ $subestacion->id }}" hidden
                                    value="{{ $subestacion->enterprise->id }}">
                                    {{-- PARQUE AL QUE PERTENECE --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="parque_{{ $subestacion->id }}">
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
        </div>
    </div>
</div>

<script defer async="false">
    document.querySelector('#page-title').innerHTML = 'GNC - {{ $section_cute }}';
    const subestaciones = @json($subestaciones);
    const parques = @json($parques);
    const enterprises = @json($enterprises);

    const subestacion = document.querySelector('#subestacion')
    const subestacion_error = document.querySelector('#subestacion_error')

    const type_id = document.querySelector('#type_id')
    const type_id_error = document.querySelector('#type_id_error')

    const parque_id = document.querySelector('#parque_id')
    const parque_id_error = document.querySelector('#parque_id_error')

    const enterprise_id = document.querySelector('#enterprise_id')
    const enterprise_id_error = document.querySelector('#enterprise_id_error')

    const submit = document.querySelector('#modal-form')
    const clean = document.querySelector('#clean')
    $(function() {

        clean.addEventListener('click', () => {
            subestacion.value = ''
            type_id.value = 0
            enterprise_id.value = 0
            parque_id.value = 0
            subestacion_error.textContent = ''
            type_id_error.textContent = ''
            parque_id_error.textContent = ''
            enterprise_id_error.textContent = ''
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
                        console.log(res.data)
                        console.log(res.data.response)

                        if (res.data.response === true) {
                            
                            document.querySelector('#subestacion_' + body.get('id')).innerHTML = body.get('subestacion')
                            document.querySelector('#type_' + body.get('id')).innerHTML = body.get('type_id') == 1 ? 'Compacta' : 'Pedestal' 
                            document.querySelector('#type_id_' + body.get('id')).value = body.get('type_id')
                            document.querySelector('#parque_' + body.get('id')).innerHTML = parque_id.options[parque_id.selectedIndex].text
                            document.querySelector('#parque_id_' + body.get('id')).value = body.get('parque_id')
                            document.querySelector('#parque_' + body.get('id')).innerHTML = parque_id.options[parque_id.selectedIndex].text

                            document.querySelector('#enterprise_id_' + body.get('id')).value = body.get('enterprise_id')
                            document.querySelector('#enterprise_' + body.get('id')).innerHTML = enterprise_id.options[enterprise_id.selectedIndex].text

                            document.querySelector('#button_close').click()
                            message('Actualizado correctamente');
                        }
                         else {
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
        });

        $('#modal-enterprises').on('hidden.bs.modal', (e) => {
            if (document.querySelector('#btn-submit').getAttribute('data-modal') === 'edit') {
                clearModal()
            }
        })
    })

    function handleErrors() {
        let x = 0
        if (subestacion.value === '') {
            subestacion_error.textContent = 'Este campo es requerido'
            subestacion.classList.remove('input-validated')
            x = 1
        } else {
            subestacion_error.textContent = ''
            subestacion.classList.add('input-validated')
        }

        if (type_id.value === "0") {
            type_id_error.textContent = 'Este campo es requerido'
            x = 1
        } else {
            type_id_error.textContent = ''
        }
        if (parque_id.value === "0") {
            parque_id_error.textContent = 'Este campo es requerido'
            x = 1
        } else {
            parque_id_error.textContent = ''
        }
        if (enterprise_id.value === "0") {
            enterprise_id_error.textContent = 'Este campo es requerido'
            x = 1
        } else {
            enterprise_id_error.textContent = ''
        }
        if (x === 1) return false

        console.log('regresadn ??')
        return true;
    }



    //ELIMINAR 
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
        console.log('entro a limopiar')

        parque_id.length = 1
        enterprise_id.length = 1
        subestacion.value = ''
        type_id.value = 0
        parque_id.value = 0
        enterprise_id.value = 0
        subestacion_error.textContent = ''
        type_id_error.textContent = ''
        parque_id_error.textContent = ''
        enterprise_id_error.textContent = ''
        document.querySelector('#id').value = null
        // cleanErrorStyles()
    }

    const handleCreate = () => {
        document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
        document.querySelector('#modal-title').innerHTML = 'Registrar subestación'

        if (parque_id.length === 1) {
            parques.forEach(element => {
                const option = document.createElement('option')
                option.value = element.id
                option.textContent = element.parque
                parque_id.appendChild(option)
            });
        }
        if (enterprise_id.length === 1) {
            enterprises.forEach(element => {
                const option = document.createElement('option')
                option.value = element.id
                option.textContent = element.enterprise
                enterprise_id.appendChild(option)
            });
        }
    }

    const handleEdit = (id) => {
        clearModal()
        document.querySelector('#id').value = id
        document.querySelector('#btn-submit').setAttribute('data-modal', 'edit')
        document.querySelector('#modal-title').innerHTML = 'Editar subestación'
        document.getElementById('edit-id').value = id

        document.querySelector('.spinner-position').style.opacity = 1
        document.querySelector('.spinner-hide').style.opacity = 0
        url = '{{ route('enterprise.get', ':id') }}';
        url = url.replace(':id', id);

        subestacion.value = document.querySelector('#subestacion_' + id).textContent
        console.log('id =>  ', id)
        console.log(document.querySelector('#parque_id_' + id).value)

        if (parque_id.length === 1) {
            parques.forEach(element => {
                const option = document.createElement('option')
                option.value = element.id
                option.textContent = element.parque
                parque_id.appendChild(option)
            });
        }
        if (enterprise_id.length === 1) {
            enterprises.forEach(element => {
                const option = document.createElement('option')
                option.value = element.id
                option.textContent = element.enterprise
                enterprise_id.appendChild(option)
            });
        }

        parque_id.value = document.querySelector('#parque_id_' + id).value
        enterprise_id.value = document.querySelector('#enterprise_id_' + id).value
        type_id.value = document.querySelector('#type_id_' + id).value


        document.querySelector('.spinner-position').style.opacity = 0
        document.querySelector('.spinner-hide').style.opacity = 1
    }


    // const cleanErrorStyles = () => {
    //     enterprise.classList.remove('input-validated')
    //     razon_social.classList.remove('input-validated')
    //     rfc.classList.remove('input-validated')
    //     address.classList.remove('input-validated')
    //     ciudad.classList.remove('input-validated')
    //     cp.classList.remove('input-validated')
    //     enterprise.classList.remove('input-validated')
    //     regimen_fiscal.classList.remove('input-validated')
    //     phone.classList.remove('input-validated')
    //     fax.classList.remove('input-validated')
    //     fax.classList.remove('input-validated')
    //     locate.classList.remove('input-validated')
    //     locate.classList.remove('input-validated')


    //     enterprise_error.textContent = ''
    //     razon_social_error.textContent = ""
    //     rfc_error.textContent = ""
    //     address_error.textContent = ""
    //     ciudad_error.textContent = ""
    //     cp_error.textContent = ""
    //     regimen_fiscal_error.textContent = ""
    //     phone_error.textContent = ""
    //     fax_error.textContent = ""
    //     locate_error.textContent = ""
    //     parque_id_error.textContent = ""
    //     user_id_error.textContent = ""
    // }

    @if (Session::has('message'))
        console.log(' SIENTRO AL MENSAJE')
        @if (Session::get('message') == 3)
            message('Subestación creada con éxito')
        @endif
    @endif
</script>
