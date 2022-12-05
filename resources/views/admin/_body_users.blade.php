<svg id="spinner_profile"class="animate-spin"
    style="display:none;position: relative;
top: calc(50% - 24px);
left: calc(50% - 24px);
}" id="spinner"width="48px"
    height="48px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
        d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
        fill="black" />
    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="black" />
</svg>




<div class="row" id="table">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between">
                    <p class="text-xl p-0 m-0 text-center self-center">
                        Listado de usuarios
                    </p>
                    <div class="flex items-center">

                        <div class="rounded-full border-solid border border-black bg-green-500 w-3 h-3 mx-3"></div>
                        Disponible
                        <div class="rounded-full border-solid border border-black bg-yellow-500 w-3 h-3 mx-3"></div>
                        En inspección

                    </div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-users"
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
                                <th class="text-white font-bold w-1"scope="col">Id</th>
                                <th class="text-white font-bold w-3/12"scope="col">Nombre</th>
                                <th class="text-white font-bold w-1/12"scope="col">Tipo</th>
                                <th class="text-white font-bold w-2/12"scope="col">Email</th>
                                <th class="text-white font-bold w-2/12"scope="col">Status</th>
                                <th class="text-white font-bold w-1/12"scope="col">Teléfono</th>
                                <th class="text-white font-bold w-2/12"scope="col">Eliminar</th>
                                <th class="text-white font-bold w-2/12"scope="col">Perfil</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($users as $user)
                                @if ($user->status->id !== 1)
                                    <tr id="row_{{ $user->id }}"
                                        class=" {{ $user->status->id > 1 ? '' : 'deshabilitado' }}">
                                        {{-- ID --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem">
                                            <p id="id_{{ $user->id }}"
                                                class='p-0 m-0 text-xs text-gray-500 text-center'>
                                                {{ $user->id }}
                                        </td>
                                        </p>
                                        {{-- Name Last Name --}}
                                        <td scope="row" style="min-width:fit-content;width:15rem">
                                            <div class="flex">
                                                <p id="user_name_{{ $user->id }}" class="p-0 m-0">
                                                    {{ $user->name }}</p>&nbsp;
                                                <p id="user_lastname_{{ $user->id }}" class="p-0 m-0">
                                                    {{ $user->last_name }}</p>
                                            </div>
                                        </td>
                                        {{-- TIPO --}}
                                        <td scope="row"
                                            style="min-width:fit-content;width:35px;"id="type_{{ $user->id }}">
                                            @if ($user->role->id === 3)
                                                <img src="{{ asset('images/worker-svgrepo-com.svg') }}"
                                                    style="border-radius:0 !important"alt="{{ $user->role->role }}">
                                            @endif
                                            @if ($user->role->id === 2)
                                                <img src="{{ asset('images/building-svgrepo-com.svg') }}"
                                                    style="border-radius:0 !important"alt="{{ $user->role->role }}">
                                            @endif
                                            @if ($user->role->id === 1)
                                                <p class="font-bold m-0">ADMIN</p>
                                            @endif
                                        </td>
                                        <input type="text" id="type_id_{{ $user->id }}" hidden
                                            value="{{ $user->role->id }}">
                                        {{-- Email  --}}
                                        <td scope="row" style="min-width:fit-content;width:5rem"
                                            id="user_email_{{ $user->id }}">
                                            {{ $user->email }}
                                        </td>
                                        {{-- Status --}}
                                        <td scope="row"id="user_status_{{ $user->id }}">
                                            @if ($user->status->id === 1)
                                                {{-- <p class="font-bold m-0">deshabilitado</p> --}}
                                            @endif
                                            @if ($user->status->id === 2)
                                                <div
                                                    class="rounded-full border-solid border border-black bg-yellow-500 w-50 h-2 mx-3">
                                                </div>
                                            @endif
                                            @if ($user->status->id === 3)
                                                <div
                                                    class="rounded-full border-solid border border-black bg-green-500 w-50 h-2 mx-3">
                                                </div>
                                            @endif
                                        </td>
                                        {{-- PHONE --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem"
                                            id="user_phone_{{ $user->id }}">
                                            {{ $user->phone }}
                                        </td>

                                        <td scope="row" style="min-width:fit-content; white-space:initial">

                                            <div class="flex justify-between">
                                                <p class="text-xs">
                                                </p>
                                                <input data-id="{{ $user->id }}"type="checkbox"
                                                    {{ $user->status->id > 1 ? 'checked' : '' }}
                                                    id="switch_{{ $user->id }}" /><label
                                                    for="switch_{{ $user->id }}"
                                                    onclick="handleToogle(this)">Toggle</label>
                                            </div>
                                        </td>
                                        {{-- ACCIONES --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial">
                                            <div class="flex justify-between">
                                                <button
                                                    class="bg-emerald-500 px-5 py-3 border-none font-bold text-white rounded hover:bg-emerald-600 hover:text-sm"
                                                    onclick="profilePage({{ $user->id }})">Ver/editar</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <h1>No hay empresas</h1>


                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>



                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-dark text-white">
                            <tr>
                                <th class="text-white font-bold w-1"scope="col">Id</th>
                                <th class="text-white font-bold w-3/12"scope="col">Nombre</th>
                                <th class="text-white font-bold w-1/12"scope="col">Tipo</th>
                                <th class="text-white font-bold w-2/12"scope="col">Email</th>
                                <th class="text-white font-bold w-2/12"scope="col">Status</th>
                                <th class="text-white font-bold w-1/12"scope="col">Teléfono</th>
                                <th class="text-white font-bold w-2/12"scope="col">Eliminar</th>
                                <th class="text-white font-bold w-2/12"scope="col">Perfil</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($users_inactivos as $user)
                                @if ($user->status->id === 1)
                                    <tr id="row_{{ $user->id }}"
                                        class=" {{ $user->status->id > 1 ? '' : 'deshabilitado' }}">
                                        {{-- ID --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem">
                                            <p id="id_{{ $user->id }}"
                                                class='p-0 m-0 text-xs text-gray-500 text-center'>
                                                {{ $user->id }}
                                        </td>
                                        </p>
                                        {{-- Name Last Name --}}
                                        <td scope="row" style="min-width:fit-content;width:15rem">
                                            <div class="flex">
                                                <p id="user_name_{{ $user->id }}" class="p-0 m-0">
                                                    {{ $user->name }}</p>&nbsp;
                                                <p id="user_lastname_{{ $user->id }}" class="p-0 m-0">
                                                    {{ $user->last_name }}</p>
                                            </div>
                                        </td>
                                        {{-- TIPO --}}
                                        <td scope="row"
                                            style="min-width:fit-content;width:35px;"id="type_{{ $user->id }}">
                                            @if ($user->role->id === 3)
                                                <img src="{{ asset('images/worker-svgrepo-com.svg') }}"
                                                    style="border-radius:0 !important"alt="{{ $user->role->role }}">
                                            @endif
                                            @if ($user->role->id === 2)
                                                <img src="{{ asset('images/building-svgrepo-com.svg') }}"
                                                    style="border-radius:0 !important"alt="{{ $user->role->role }}">
                                            @endif
                                            @if ($user->role->id === 1)
                                                <p class="font-bold m-0">ADMIN</p>
                                            @endif
                                        </td>
                                        <input type="text" id="type_id_{{ $user->id }}" hidden
                                            value="{{ $user->role->id }}">
                                        {{-- Email  --}}
                                        <td scope="row" style="min-width:fit-content;width:5rem"
                                            id="user_email_{{ $user->id }}">
                                            {{ $user->email }}
                                        </td>
                                        {{-- Status --}}
                                        <td scope="row"id="user_status_{{ $user->id }}">
                                            @if ($user->status->id === 1)
                                                {{-- <p class="font-bold m-0">deshabilitado</p> --}}
                                            @endif
                                            @if ($user->status->id === 2)
                                                <div
                                                    class="rounded-full border-solid border border-black bg-yellow-500 w-50 h-2 mx-3">
                                                </div>
                                            @endif
                                            @if ($user->status->id === 3)
                                                <div
                                                    class="rounded-full border-solid border border-black bg-green-500 w-50 h-2 mx-3">
                                                </div>
                                            @endif
                                        </td>
                                        {{-- PHONE --}}
                                        <td scope="row" style="min-width:fit-content;width:1rem"
                                            id="user_phone_{{ $user->id }}">
                                            {{ $user->phone }}
                                        </td>

                                        <td scope="row" style="min-width:fit-content; white-space:initial">

                                            <div class="flex justify-between">
                                                <p class="text-xs">
                                                </p>
                                                <input data-id="{{ $user->id }}"type="checkbox"
                                                    {{ $user->status->id > 1 ? 'checked' : '' }}
                                                    id="switch_{{ $user->id }}" /><label
                                                    for="switch_{{ $user->id }}"
                                                    onclick="handleToogle(this)">Toggle</label>
                                            </div>
                                        </td>
                                        {{-- ACCIONES --}}
                                        <td scope="row" style="min-width:fit-content; white-space:initial">
                                            <div class="flex justify-between">
                                                <button
                                                    class="bg-emerald-500 px-5 py-3 border-none font-bold text-white rounded hover:bg-emerald-600 hover:text-sm"
                                                    onclick="profilePage({{ $user->id }})">Ver/editar</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <h1>No hay empresas</h1>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>


<div id="profile" style="opacity:0">
    @include('admin._users_profile')
</div>

<script>
    const clean = document.querySelector('#clean')
    const name = document.querySelector('#name')
    const last_name = document.querySelector('#last_name')
    const email = document.querySelector('#email')
    const phone = document.querySelector('#phone_user')
    const role = document.querySelector('#role_id')
    const password = document.querySelector('#password')
    const password_confirmation = document.querySelector('#password_confirmation')

    const name_error = document.querySelector('#name_error')
    const last_name_error = document.querySelector('#last_name_error')
    const email_error = document.querySelector('#email_error')
    const phone_error = document.querySelector('#phone_user_error')
    const role_error = document.querySelector('#role_id_error')
    const password_error = document.querySelector('#password_error')
    const password_confirmation_error = document.querySelector('#password_confirmation_error')

    const submit = document.querySelector('#modal-form')



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

    function profilePage(id) {
        $("#table").hide()
        $("#spinner_profile").show()
        const route = "{{ route('users.get_user') }}"
        id = {
            'id': id
        }
        axios.post(route, id)
            .then(res => {
                console.log(res.data)
                document.querySelector('#perfil_nombre').textContent = res.data.name
                document.querySelector("#perfil_ocupacion").textContent = res.data.role_id === 1 ? 'ADMIN' : res
                    .data.role_id === 2 ? 'EMPRESA' : 'TÉCNICO'
                document.querySelector('#perfil_correo').textContent = res.data.email
                document.querySelector('#perfil_telefono').textContent = res.data.phone
                document.querySelector('#perfil_status').textContent = res.data.status_id === 1 ? 'INACTIVO' : res
                    .data
                    .status_id === 2 ? 'En una inspección' : 'DISPONIBLE'

                document.querySelector('#profile').style.opacity = 1
                $("#spinner_profile").hide()

            }).catch(err => message('Hubo un problema con la petición'))
    }
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('#back_users').addEventListener('click', () => {
            document.querySelector('#profile').style.opacity = 0
            $("#table").show()
        })
        submit.addEventListener("submit", function(e) {

            e.preventDefault()

            const validate = handleErrors()

            if (validate === false) return false
            const type = document.querySelector('#btn-submit').getAttribute('data-modal')

            let body = new FormData(document.getElementById("modal-form"))

            body.append('role_id', role_id.value)
            //CREAR PARQUE  
            if (type === 'create') {

                const route = '{{ route('users.store') }}'

                axios.post(route, body)
                    .then(res => {
                        console.log(res.data)
                        if (res.data.response === true) {
                            console.log('creado')
                            const message = 4
                            const route = '{{ route('message') }}'
                            axios.post(route, {
                                    'message': message
                                })
                                .then(res => {
                                    console.log(res.data)
                                    window.location.href =
                                        '{{ route('users.home') }}'
                                })
                                .catch(err => {
                                    console.log(err)
                                })
                        } else {
                            const errors = res.data.errors
                            const {
                                name: name_mensaje,
                                last_name: last_name_mensaje,
                                email: email_mensaje,
                                phone: phone_mensaje,
                                password: password_mensaje,
                                password_confirmation: password_confirmation_mensaje,
                                role_id: role_id_mensaje
                            } = errors


                            if (name_mensaje) {
                                name_error.textContent = name_mensaje
                                name.classList.remove('input-validated')
                            }
                            if (!name_mensaje) {
                                name_error.textContent = ''
                                name.classList.add('input-validated')
                            }
                            // console.log(email_mensaje)

                            if (last_name_mensaje) {
                                last_name_error.textContent = last_name_mensaje
                                last_name.classList.remove('input-validated')
                            }
                            if (!last_name_mensaje) {
                                last_name_error.textContent = ''
                                last_name.classList.add('input-validated')
                            }
                            if (email_mensaje) {
                                console.log('entro')
                                email_error.textContent = email_mensaje
                                email.classList.remove('input-validated')
                            } else {
                                email_error.textContent = ''
                                email.classList.add('input-validated')
                            }
                            if (phone_mensaje) {
                                phone_error.textContent = phone_mensaje
                                phone.classList.remove('input-validated')
                            } else {
                                phone_error.textContent = ''
                                phone.classList.add('input-validated')
                            }
                            if (password_mensaje) {
                                password_error.textContent = password_mensaje
                                password.classList.remove('input-validated')
                            } else {
                                password_error.textContent = ''
                                password.classList.add('input-validated')
                            }
                            if (password_confirmation_mensaje) {
                                password_confirmation_error.textContent =
                                    password_confirmation_mensaje
                                password_confirmation.classList.remove('input-validated')
                            } else {
                                password_confirmation_error.textContent = ''
                                password_confirmation.classList.add('input-validated')
                            }

                        }
                    })
                    .catch(err => {
                        message('Hubo un problema con la petición');
                        console.error(err)
                    })
            }
            // if (type === 'edit') {
            //     const route = '{{ route('subestacion.update', ':id') }}'
            //     const url = route.replace(':id', document.querySelector('#id').value)

            //     axios.post(url, body)
            //         .then(res => {
            //             console.log(res.data)
            //             console.log(res.data.response)

            //             if (res.data.response === true) {

            //                 document.querySelector('#subestacion_' + body.get('id')).innerHTML = body.get('subestacion')
            //                 document.querySelector('#type_' + body.get('id')).innerHTML = body.get('type_id') == 1 ? 'Compacta' : 'Pedestal' 
            //                 document.querySelector('#type_id_' + body.get('id')).value = body.get('type_id')
            //                 document.querySelector('#parque_' + body.get('id')).innerHTML = parque_id.options[parque_id.selectedIndex].text
            //                 document.querySelector('#parque_id_' + body.get('id')).value = body.get('parque_id')
            //                 document.querySelector('#parque_' + body.get('id')).innerHTML = parque_id.options[parque_id.selectedIndex].text

            //                 document.querySelector('#enterprise_id_' + body.get('id')).value = body.get('enterprise_id')
            //                 document.querySelector('#enterprise_' + body.get('id')).innerHTML = enterprise_id.options[enterprise_id.selectedIndex].text

            //                 document.querySelector('#button_close').click()
            //                 message('Actualizado correctamente');
            //             }
            //              else {
            //                 const errors = res.data.errors

            //                 const {
            //                     subestacion: subestacion_mensaje,
            //                     enterprise_id: enterprise_id_mensaje,
            //                     parque_id: parque_id_mensaje,
            //                     type_id: type_id_mensaje
            //                 } = errors
            //                 if (subestacion_mensaje) {
            //                     subestacion_error.textContent = subestacion_mensaje
            //                     subestacion.classList.remove('input-validated')
            //                 } else {
            //                     subestacion_error.textContent = ''
            //                     subestacion.classList.add('input-validated')
            //                 }
            //                 if (enterprise_id_mensaje) {
            //                     enterprise_id_error.textContent = enterprise_id_mensaje
            //                 } else {
            //                     enterprise_id_error.textContent = ''
            //                 }
            //                 if (parque_id_mensaje) {
            //                     parque_id_error.textContent = parque_id_mensaje
            //                 } else {
            //                     enterprise_id_error.textContent = ''
            //                 }
            //                 if (type_id_mensaje) {
            //                     type_id_error.textContent = type_id_mensaje
            //                 } else {
            //                     enterprise_id_error.textContent = ''
            //                 }
            //             }
            //         })
            //         .catch(err => {
            //             message('Hubo un problema con la petición');
            //         })
            // }
        });

        clean.addEventListener('click', () => {
            name.value = ''
            last_name.value = ''
            email.value = ''
            phone.value = ''
            password.value = ''
            password_confirmation.value = ''
            name_error.textContent = ''
            last_name_error.textContent = ''
            email_error.textContent = ''
            phone_error.textContent = ''
            password_error.textContent = ''
            password_confirmation_error.textContent = ''
            role_error.textContent = ''

            name.classList.remove('input-validated')
            last_name.classList.remove('input-validated')
            email.classList.remove('input-validated')
            phone.classList.remove('input-validated')
            password.classList.remove('input-validated')
            password_confirmation.classList.remove('input-validated')
            role.classList.remove('input-validated')

            role.value = 0


            document.querySelector('#id').value = null
        })

    })

    const handleCreate = () => {
        document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
        document.querySelector('#modal-title').innerHTML = 'Registrar usuario'

        // if (parque_id.length === 1) {
        //     parques.forEach(element => {
        //         const option = document.createElement('option')
        //         option.value = element.id
        //         option.textContent = element.parque
        //         parque_id.appendChild(option)
        //     });
        // }
        // if (enterprise_id.length === 1) {
        //     enterprises.forEach(element => {
        //         const option = document.createElement('option')
        //         option.value = element.id
        //         option.textContent = element.enterprise
        //         enterprise_id.appendChild(option)
        //     });
        // }
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

    function handleErrors() {
        let x = 0
        if (name.value === '') {
            name_error.textContent = 'Este campo es requerido'
            name.classList.remove('input-validated')
            x = 1
        } else {
            name_error.textContent = ''
            name.classList.add('input-validated')
        }
        if (last_name.value === '') {
            last_name_error.textContent = 'Este campo es requerido'
            last_name.classList.remove('input-validated')
            x = 1
        } else {
            last_name_error.textContent = ''
            last_name.classList.add('input-validated')
        }
        if (email.value === '') {
            email_error.textContent = 'Este campo es requerido'
            // email.classList.remove('input-validated')
            x = 1
        } else {
            email_error.textContent = ''
            // email.classList.add('input-validated')
        }
        if (phone.value === "") {
            phone_error.textContent = 'Este campo es requerido'
            x = 1
        } else {
            phone_error.textContent = ''
            // phone.classList.add('input-validated')
        }
        if (password.value === "") {
            password_error.textContent = 'Este campo es requerido'
            x = 1
        } else {
            password_error.textContent = ''
            // password.classList.add('input-validated')
        }

        if (password_confirmation.value === "") {
            password_confirmation_error.textContent = 'Este campo es requerido'
            x = 1
        } else {
            password_confirmation_error.textContent = ''
            // password_confirmation.classList.add('input-validated')
        }
        if (role.value === "0") {
            role_error.textContent = 'Este campo es requerido'
            role.classList.remove('input-validated')
            x = 1
        } else {
            role_error.textContent = ''
            role.classList.add('input-validated')
        }
        if (x === 1) return false
        return true;
    }

    function handleToogle(e) {
        console.log(e)
        const input_id = e.getAttribute('for')
        console.log(input_id)
        const input = document.querySelector(`#${input_id}`)
        console.log('checado')
        const row_id = input.getAttribute('data-id')
        const row = document.querySelector(`#row_${row_id}`)

        const url = "{{ route('users.disable') }}"

        const barra = document.querySelector(`#user_status_${row_id}`)
        if (input.checked) {
            row.remove()
            axios.post(url, {
                status_id: 1,
                id: row_id
            }).then(res => {
                console.log(res)
                console.log(barra)
                // $(barra).html(``)

            }).catch(err => {
                console.log(err)
            })
        } else {
            row.remove()

            axios.post(url, {
                status_id: 3,
                id: row_id
            }).then(res => {
                console.log(res)
                // $(barra).html(`   <div
                //                                 class="rounded-full border-solid border border-black bg-green-500 w-50 h-2 mx-3">
                //                             </div>`)
            }).catch(err => {
                console.log(err)
            })
        }
        console.log(input)
    }



    @if (Session::has('message'))
        console.log(' SIENTRO AL MENSAJE')
        @if (Session::get('message') == 4)
            message('Usuario registrado')
        @endif
    @endif
</script>
{{-- <script defer async="false">
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

 
    $(function() {

        

        $('#modal-enterprises').on('hidden.bs.modal', (e) => {
            if (document.querySelector('#btn-submit').getAttribute('data-modal') === 'edit') {
                clearModal()
            }
        })
    })




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

</script> --}}
