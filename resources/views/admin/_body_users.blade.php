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
                        Habilitados
                    </p>
                    <div class="flex items-center">

                        <div class="rounded-full border-solid border border-black bg-green-500 w-3 h-3 mx-3"></div>
                        Disponibles
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
                @if (count($users))
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th class="text-white font-bold w-1/12"scope="col">Id</th>
                                    <th class="text-white font-bold w-3/12"scope="col">Nombre</th>
                                    <th class="text-white font-bold w-1/12"scope="col">Tipo</th>
                                    <th class="text-white font-bold w-2/12"scope="col">Email</th>
                                    <th class="text-white font-bold w-2/12"scope="col">Status</th>
                                    <th class="text-white font-bold w-1/12"scope="col">Teléfono</th>
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
                                            {{-- ACCIONES --}}
                                            <td scope="row" style="min-width:fit-content; white-space:initial">
                                                <div class="flex justify-betstartween">
                                                    <button
                                                        class="bg-red-500 px-5 py-3 border-none font-bold text-white rounded hover:bg-red-600 hover:text-sm mr-3"
                                                        onclick="handleToogle({{ $user->id }}, {{ $user->status->id }})">
                                                        <i class="fas fa-trash"></i></button>
                                                    <button
                                                        class="bg-emerald-500 px-5 py-3 border-none font-bold text-white rounded hover:bg-emerald-600 hover:text-sm"
                                                        onclick="profilePage({{ $user->id }})">
                                                        <i class="fas fa-eye"></i></button>
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
                @else
                    <p class="text-2xl ">No existen usuarios habilitados</p>
                @endif
            </div>
        </div>
    </div>
</div>


@if (count($users_inactivos))
    <div class="row" id="table_deshabilitados">
        <div class="col-lg-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="flex">
                        <p class="text-xl p-0 m-0 text-center self-center">
                            Deshabilitados
                        </p>
                    </div>
                    <hr>

                    <div class="table-responsive mt-5">
                        <table class="table table-striped align-middle">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th class="text-white font-bold w-1/12"scope="col">Id</th>
                                    <th class="text-white font-bold w-3/12"scope="col">Nombre</th>
                                    <th class="text-white font-bold w-1/12"scope="col">Tipo</th>
                                    <th class="text-white font-bold w-2/12"scope="col">Email</th>
                                    <th class="text-white font-bold w-1/12"scope="col">Teléfono</th>
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

                                            {{-- PHONE --}}
                                            <td scope="row" style="min-width:fit-content;width:1rem"
                                                id="user_phone_{{ $user->id }}">
                                                {{ $user->phone }}
                                            </td>

                                            {{-- ACCIONES --}}
                                            <td scope="row" style="min-width:fit-content; white-space:initial">
                                                <div class="flex">

                                                    <button
                                                        class="bg-red-500 px-5 py-3 border-none font-bold text-white rounded hover:bg-red-600 hover:text-sm mr-3"
                                                        onclick="handleToogle({{ $user->id }}, {{ $user->status->id }})">Activar</button>
                                                    <button
                                                        class="bg-emerald-500 px-5 py-3 border-none font-bold text-white rounded hover:bg-emerald-600 hover:text-sm"
                                                        onclick="profilePage({{ $user->id }})"><i
                                                            class="fas fa-eye"></i></button>
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


                </div>
            </div>
        </div>
    </div>
@else
@endif


<div id="profile" style="opacity:0">
    @include('admin._users_profile')
</div>

<script>
    document.querySelector('#page-title').innerHTML = 'GNC - {{ $section_cute }}';

    const clean = document.querySelector('#clean')
    const name = document.querySelector('#name')
    const last_name = document.querySelector('#last_name')
    const email = document.querySelector('#email')
    const phone = document.querySelector('#phone_user')
    const role = document.querySelector('#role_id')
    const password = document.querySelector('#password')
    const password_confirmation = document.querySelector('#password_confirmation')
    const image = document.querySelector('#profile_photo')

    const name_error = document.querySelector('#name_error')
    const last_name_error = document.querySelector('#last_name_error')
    const email_error = document.querySelector('#email_error')
    const phone_error = document.querySelector('#phone_user_error')
    const role_error = document.querySelector('#role_id_error')
    const password_error = document.querySelector('#password_error')
    const password_confirmation_error = document.querySelector('#password_confirmation_error')
    const image_error = document.querySelector('#image_error')

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
        console.log('escoder')
        $("#table").hide()
        $("#table_deshabilitados").hide()

        $("#spinner_profile").show()
        const route = "{{ route('users.get_user') }}"
        id = {
            'id': id
        }
        axios.post(route, id)
            .then(res => {
                console.log(res.data)

                const {
                    name,
                    last_name,
                    role_id,
                    email,
                    phone,
                    status_id,
                    image
                } = res.data



                document.querySelector('#perfil_nombre').textContent = name + ' ' + last_name
                document.querySelector("#perfil_ocupacion").textContent = role_id === 1 ? 'ADMIN' : role_id === 2 ?
                    'EMPRESA' : 'TÉCNICO'
                document.querySelector('#perfil_correo').textContent = email
                document.querySelector('#perfil_telefono').textContent = phone
                document.querySelector('#perfil_status').textContent = status_id === 1 ? 'INACTIVO' :
                    status_id === 2 ? 'En una inspección' : 'DISPONIBLE'

                document.querySelector('#perfil_status_color').classList.add(status_id === 1 ? 'bg-red-500' :
                    status_id === 2 ? 'bg-yellow-500' : 'bg-green-500')



                if (image) {
                    let image_route = "{{ asset('images/profile/:image') }}"
                    image_route = image_route.replace(':image', image)
                    document.querySelector('#perfil_foto').src = image_route
                } else {
                    if (role_id === 3) {
                        const src = "{{ asset('images/worker-svgrepo-com.svg') }}"
                        document.querySelector('#perfil_foto').src = src
                    }
                    if (role_id === 2) {
                        const src = "{{ asset('images/building-svgrepo-com.svg') }}"
                        document.querySelector('#perfil_foto').src = src
                    }
                    if (role_id === 1) {
                        const src = "{{ asset('images/hacker.jpg') }}"
                        document.querySelector('#perfil_foto').src = src
                    }

                }

                document.querySelector('#profile').style.opacity = 1
                $("#spinner_profile").hide()

            }).catch(err => message('Hubo un problema con la petición'))
    }
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('#back_users').addEventListener('click', () => {
            document.querySelector('#profile').style.opacity = 0
            $("#table").show()
            $("#table_deshabilitados").show()
        })
        submit.addEventListener("submit", function(e) {

            e.preventDefault()

            const validate = handleErrors()

            if (validate === false) return false
            const type = document.querySelector('#btn-submit').getAttribute('data-modal')

            let body = new FormData(document.getElementById("modal-form"))

            const foto = document.querySelector('#profile_photo').files[0]
            body.append('role_id', role_id.value)

            body.append('image', foto)
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
                                role_id: role_id_mensaje,
                                image: image_mensaje
                            } = errors


                            if (name_mensaje) {
                                name_error.textContent = name_mensaje
                                name.classList.remove('input-validated')
                            }
                            if (!name_mensaje) {
                                name_error.textContent = ''
                                name.classList.add('input-validated')
                            } // console.log(email_mensaje)
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
                            if (image_mensaje) {
                                image_error.textContent = image_mensaje
                                image.classList.remove('input-validated')
                            } else {
                                image_error.textContent = ''
                                image.classList.add('input-validated')
                            }

                        }
                    })
                    .catch(err => {
                        message('Hubo un problema con la petición');
                        console.error(err)
                    })
            }
            // if (type === 'edit') {

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
            image.value = ""
            image_error.textContent = ''
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
    }

    // document.querySelector('#toggleInput').addEventListener('click', (e) => {
    //     document.querySelector('#profile_photo').click()
    // })

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

    function handleToogle(id, status) {
        const row = document.querySelector(`#row_${id}`)
        const url = "{{ route('users.disable') }}"
        const barra = document.querySelector(`#user_status_${id}`)



        if (status !== 1) {

            const confirmar = confirm('¿Estás seguro de eliminar este usuario?')
            console.log(confirmar)
            if (confirmar === false) return false

            axios.post(url, {
                status_id: 1,
                id: id
            }).then(res => {
                axios.post("{{ route('message') }}", {
                    'message': 5
                }).then((res) => {
                    console.log(res)
                    location.replace("{{ route('users.home') }}")
                }).catch(err => {
                    message('Inténtalo más tarde')
                })


            }).catch(err => {
                console.log(err)
                message('Inténtalo más tarde')
            })
        } else {

            const confirmar = confirm('¿Estás seguro de activar este usuario?')
            console.log(confirmar)
            if (confirmar === false) return false


            axios.post(url, {
                status_id: 3,
                id: id
            }).then(res => {
                axios.post("{{ route('message') }}", {
                    'message': 6
                }).then((res) => {
                    console.log(res)
                    location.replace("{{ route('users.home') }}")
                }).catch(err => {
                    message('Inténtalo más tarde')
                })
            }).catch(err => {
                console.log(err)
                message('Inténtalo más tarde')
            })
        }
    }
    @if (Session::has('message'))
        console.log(' SIENTRO AL MENSAJE')
        @if (Session::get('message') == 4)
            message('Usuario registrado')
        @endif
        @if (Session::get('message') == 5)
            message('Usuario eliminado')
        @endif
        @if (Session::get('message') == 6)
            message('Usuario activado')
        @endif
    @endif
</script>
