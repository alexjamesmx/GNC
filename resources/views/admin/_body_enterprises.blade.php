<div class="row">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between">
                    <p class="text-xl p-0 m-0 text-center self-center">
                        Listado de empresas
                    </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-enterprises"
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
                                <th class="text-white"scope="col">Empresa</th>
                                <th class="text-white"scope="col">Dirección</th>
                                <th class="text-white"scope="col">Ciudad</th>
                                <th class="text-white"scope="col">C.P.</th>
                                <th class="text-white"scope="col">Teléfono</th>
                                <th class="text-white"scope="col">Pertenece al parque</th>
                                <th class="text-white"scope="col">Usuario</th>
                                <th class="text-white"scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($enterprises as $enterprise)
                                <tr id="row_{{ $enterprise->enterprise_id }}">
                                    {{-- ID --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="id_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->enterprise_id }}</td>
                                    {{-- NOMBRE --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="enterprise_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->enterprise }}</td>
                                    {{-- DIRECCION --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="address_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->address }}</td>
                                    {{-- CIUDAD --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="ciudad_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->ciudad }}</td>
                                    {{-- CP --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="cp_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->cp }}</td>
                                    {{-- PHONE --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="phone_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->phone }}</td>
                                    {{-- PARUQE AL QUE PERTENECE --}}
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="parque_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->parque }}</td>
                                    <td scope="row"
                                        style="min-width:fit-content; white-space:initial"id="email_{{ $enterprise->enterprise_id }}">
                                        {{ $enterprise->email }}</td>
                                    <td scope="row" style="min-width:fit-content; white-space:initial">
                                        <div class="flex justify-start">
                                            <button data-bs-toggle="modal"
                                                data-bs-target="#modal-enterprises"onclick="handleEdit({{ $enterprise->enterprise_id }})"
                                                type="button"class="text-lime-600 border-none bg-transparent mr-5 hover:text-lime-500"
                                                data-modal="edit"><i class="fa-solid fa-pen-fancy"></i>
                                                Ver más / editar</button>
                                            <button
                                                onclick="document.getElementById('delete-id').value = {{ $enterprise->enterprise_id }}"
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
                    {{ $enterprises->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script defer async="false">
    $(function() {

        submit.addEventListener("submit", function(e) {

            e.preventDefault()
            const type = document.querySelector('#btn-submit').getAttribute('data-modal')
            //CREAR PARQUE  
            if (type === 'create') {

                let body = new FormData(document.getElementById("modal-form"))
                const route = '{{ route('enterprise.validated') }}'
                body.append('parque_id', document.querySelector('#select-parque').value)

                $.ajax({
                    url: route,
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: body,
                    dataType: 'json',
                }).done((json) => {
                    cleanErrorStyles()
                    if (json.response === true) {
                        axios.post('{{ route('enterprise.store') }}', body)
                            .then(res => {
                                console.log(res)
                                if (json.response === true) {
                                    const route = '{{ route('message', '2') }}'
                                    const message = 2
                                    $.ajax({
                                        type: "post",
                                        url: route,
                                        data: {
                                            message
                                        },
                                        success: function(response) {
                                            console.log('message', response)
                                            window.location.href =
                                                '{{ route('empresas.home') }}'
                                        },
                                        error: function(err) {
                                            message(
                                                'Hubo un problema con la petición'
                                                )
                                        }
                                    });
                                }
                            })
                            .catch(err => {
                                console.error(err);
                            })
                    } else {
                        const errors = json.errors;
                        const {
                            enterprise: mensaje_enterprise,
                            razon_social: mensaje_razon_social,
                            rfc: mensaje_rfc,
                            address: mensaje_address,
                            ciudad: mensaje_ciudad,
                            cp: mensaje_cp,
                            regimen_fiscal: mensaje_regimen_fiscal,
                            phone: mensaje_phone,
                            fax: mensaje_fax,
                            locate: mensaje_locate,
                            parque_id: mensaje_parque_id,
                            user_id: mensaje_user_id,
                        } = errors
                        if (mensaje_enterprise) {
                            enterprise_error.innerHTML = mensaje_enterprise
                            enterprise.classList.remove('input-validated')
                        } else {
                            enterprise_error.innerHTML = ''
                            enterprise.classList.add('input-validated')
                        }
                        if (mensaje_razon_social) {
                            razon_social_error.innerHTML = mensaje_razon_social
                            razon_social.classList.remove('input-validated')
                        } else {
                            razon_social_error.innerHTML = ''
                            razon_social.classList.add('input-validated')
                        }
                        if (mensaje_rfc) {
                            rfc_error.innerHTML = mensaje_rfc
                            rfc.classList.remove('input-validated')
                        } else {
                            rfc_error.innerHTML = ''
                            rfc.classList.add('input-validated')

                        }
                        if (mensaje_address) {
                            address_error.innerHTML = mensaje_address
                            address.classList.remove('input-validated')
                        } else {
                            address_error.innerHTML = ''
                            address.classList.add('input-validated')

                        }
                        if (mensaje_ciudad) {
                            ciudad_error.innerHTML = mensaje_ciudad
                            ciudad.classList.remove('input-validated')
                        } else {
                            ciudad_error.innerHTML = ''
                            ciudad.classList.add('input-validated')

                        }
                        if (mensaje_cp) {
                            cp_error.innerHTML = mensaje_cp
                            cp.classList.remove('input-validated')
                        } else {
                            enterprise.classList.remove('input-validated')
                            cp_error.innerHTML = ''
                            cp.classList.add('input-validated')

                        }
                        if (mensaje_regimen_fiscal) {
                            regimen_fiscal_error.innerHTML = mensaje_regimen_fiscal
                            regimen_fiscal.classList.remove('input-validated')
                        } else {
                            regimen_fiscal_error.innerHTML = ''
                            regimen_fiscal.classList.add('input-validated')

                        }
                        if (mensaje_phone) {
                            phone_error.innerHTML = mensaje_phone
                            phone.classList.remove('input-validated')
                        } else {
                            phone_error.innerHTML = ''
                            phone.classList.add('input-validated')
                        }
                        if (mensaje_fax) {
                            fax_error.innerHTML = mensaje_fax
                            fax.classList.remove('input-validated')
                        } else if (mensaje_fax === undefined && fax.value !== '') {
                            fax_error.innerHTML = ''
                            fax.classList.add('input-validated')
                        } else {
                            fax.classList.remove('input-validated')
                        }
                        if (mensaje_locate) {
                            location_error.innerHTML = mensaje_locate
                            locate.classList.remove('input-validated')
                        } else if (mensaje_locate === undefined && locate.value !== '') {
                            location_error.innerHTML = ''
                            locate.classList.add('input-validated')
                        } else {
                            locate.classList.remove('input-validated')
                        }
                        if (mensaje_parque_id) {
                            parque_id_error.innerHTML = mensaje_parque_id
                            // parque_id_.classList.remove('input-validated')
                        } else {
                            parque_id_error.innerHTML = ''
                            // parque_id_.classList.add('input-validated')
                        }
                        if (mensaje_user_id) {
                            user_id_error.innerHTML = mensaje_user_id
                            // parque_id_.classList.remove('input-validated')
                        } else {
                            user_id_error.innerHTML = ''
                            // parque_id_.classList.add('input-validated')
                        }

                    }
                }).fail((response) => {
                    message('Hubo un problema con la petición')
                })
            }
            if (type === 'edit') {
                let body = new FormData(document.getElementById("modal-form"))
                const route = '{{ route('enterprise.validated_update') }}'
                const parque_text = selectParque[selectParque.selectedIndex].text
                const administrador_text = selectAdministrador[selectAdministrador.selectedIndex].text
                // body.append('parque_id', document.querySelector('#select-parque').value)

                $.ajax({
                    url: route,
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: body,
                    dataType: 'json',
                }).done((json) => {
                    cleanErrorStyles()
                    if (json.response === true) {
                        const id = body.get('id')
                        const route = '{{ route('enterprise.update', ':id') }}'
                        const url = route.replace(':id', id)
                        axios.post(url, body)
                            .then(res => {
                                console.log(res.status)
                                if (res.status === 200) {
                                    message('Actualizado correctamente')
                                    $('#modal-enterprises').modal('hide')
                                    document.querySelector('#address_' + id).innerHTML =
                                        body.get('address')
                                    document.querySelector('#enterprise_' + id).innerHTML =
                                        body.get('enterprise')
                                    document.querySelector('#ciudad_' + id).innerHTML = body
                                        .get('ciudad')
                                    document.querySelector('#cp_' + id).innerHTML = body
                                        .get('cp')
                                    document.querySelector('#phone_' + id).innerHTML = body
                                        .get('phone')
                                    document.querySelector('#parque_' + id).innerHTML =
                                        parque_text
                                    document.querySelector('#email_' + id).innerHTML =
                                        administrador_text



                                } else {
                                    message('Hubo un problema con la petición')
                                }
                            })
                            .catch(err => {
                                console.error(err);
                            })
                    } else {
                        const errors = json.errors;
                        const {
                            enterprise: mensaje_enterprise,
                            razon_social: mensaje_razon_social,
                            rfc: mensaje_rfc,
                            address: mensaje_address,
                            ciudad: mensaje_ciudad,
                            cp: mensaje_cp,
                            regimen_fiscal: mensaje_regimen_fiscal,
                            phone: mensaje_phone,
                            fax: mensaje_fax,
                            locate: mensaje_locate,
                            parque_id: mensaje_parque_id,
                            user_id: mensaje_user_id,
                        } = errors
                        if (mensaje_enterprise) {
                            enterprise_error.innerHTML = mensaje_enterprise
                            enterprise.classList.remove('input-validated')
                        } else {
                            enterprise_error.innerHTML = ''
                            enterprise.classList.add('input-validated')
                        }
                        if (mensaje_razon_social) {
                            razon_social_error.innerHTML = mensaje_razon_social
                            razon_social.classList.remove('input-validated')
                        } else {
                            razon_social_error.innerHTML = ''
                            razon_social.classList.add('input-validated')
                        }
                        if (mensaje_rfc) {
                            rfc_error.innerHTML = mensaje_rfc
                            rfc.classList.remove('input-validated')
                        } else {
                            rfc_error.innerHTML = ''
                            rfc.classList.add('input-validated')

                        }
                        if (mensaje_address) {
                            address_error.innerHTML = mensaje_address
                            address.classList.remove('input-validated')
                        } else {
                            address_error.innerHTML = ''
                            address.classList.add('input-validated')

                        }
                        if (mensaje_ciudad) {
                            ciudad_error.innerHTML = mensaje_ciudad
                            ciudad.classList.remove('input-validated')
                        } else {
                            ciudad_error.innerHTML = ''
                            ciudad.classList.add('input-validated')

                        }
                        if (mensaje_cp) {
                            cp_error.innerHTML = mensaje_cp
                            cp.classList.remove('input-validated')
                        } else {
                            enterprise.classList.remove('input-validated')
                            cp_error.innerHTML = ''
                            cp.classList.add('input-validated')

                        }
                        if (mensaje_regimen_fiscal) {
                            regimen_fiscal_error.innerHTML = mensaje_regimen_fiscal
                            regimen_fiscal.classList.remove('input-validated')
                        } else {
                            regimen_fiscal_error.innerHTML = ''
                            regimen_fiscal.classList.add('input-validated')

                        }
                        if (mensaje_phone) {
                            phone_error.innerHTML = mensaje_phone
                            phone.classList.remove('input-validated')
                        } else {
                            phone_error.innerHTML = ''
                            phone.classList.add('input-validated')
                        }
                        if (mensaje_fax) {
                            fax_error.innerHTML = mensaje_fax
                            fax.classList.remove('input-validated')
                        } else if (mensaje_fax === undefined && fax.value !== '') {
                            fax_error.innerHTML = ''
                            fax.classList.add('input-validated')
                        } else {
                            fax.classList.remove('input-validated')
                        }
                        if (mensaje_locate) {
                            location_error.innerHTML = mensaje_locate
                            locate.classList.remove('input-validated')
                        } else if (mensaje_locate === undefined && locate.value !== '') {
                            location_error.innerHTML = ''
                            locate.classList.add('input-validated')
                        } else {
                            locate.classList.remove('input-validated')
                        }
                        if (mensaje_parque_id) {
                            parque_id_error.innerHTML = mensaje_parque_id
                            // parque_id_.classList.remove('input-validated')
                        } else {
                            parque_id_error.innerHTML = ''
                            // parque_id_.classList.add('input-validated')
                        }
                        if (mensaje_user_id) {
                            user_id_error.innerHTML = mensaje_user_id
                            // parque_id_.classList.remove('input-validated')
                        } else {
                            user_id_error.innerHTML = ''
                            // parque_id_.classList.add('input-validated')
                        }

                    }
                }).fail((response) => {
                    message('Hubo un problema con la petición')
                })
            }

        });

        $('#modal-enterprises').on('hidden.bs.modal', (e) => {
            clearModal()
        })
    })

    @if (Session::has('message'))
        @if (Session::get('message') == 2)
            message('Empresa creada con éxito')
        @endif
    @endif


    const parques = @json($parques);
    const users = @json($users);
    document.querySelector('#page-title').innerHTML = 'GNC - {{ $section_cute }}';
    const enterprise = document.querySelector('#enterprise')
    const enterprise_error = document.querySelector('#enterprise_error')

    const razon_social = document.querySelector('#razon_social')
    const razon_social_error = document.querySelector('#razon_social_error')

    const rfc = document.querySelector('#rfc')
    const rfc_error = document.querySelector('#rfc_error')

    const address = document.querySelector('#address')
    const address_error = document.querySelector('#address_error')

    const ciudad = document.querySelector('#ciudad')
    const ciudad_error = document.querySelector('#ciudad_error')

    const cp = document.querySelector('#cp')
    const cp_error = document.querySelector('#cp_error')

    const regimen_fiscal = document.querySelector('#regimen_fiscal')
    const regimen_fiscal_error = document.querySelector('#regimen_fiscal_error')

    const phone = document.querySelector('#phone')
    const phone_error = document.querySelector('#phone_error')

    const fax = document.querySelector('#fax')
    const fax_error = document.querySelector('#fax_error')

    const locate = document.querySelector('#location')
    const locate_error = document.querySelector('#location_error')

    const parque_id_error = document.querySelector('#parque_id_error')
    const submit = document.getElementById("modal-form")

    const selectParque = document.querySelector('#select-parque')
    const selectAdministrador = document.querySelector('#select-administrador')

    //ELIMINAR 
    const handleDelete = () => {
        const id = document.getElementById('delete-id').value
        let url = '{{ route('enterprise.delete', ':id') }}';
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

        while (selectAdministrador.length > 0) {
            selectAdministrador.remove(0);
        }
        while (selectParque.length > 0) {
            selectParque.remove(0);
        }
        enterprise.value = ''
        razon_social.value = ""
        rfc.value = ""
        address.value = ""
        ciudad.value = ""
        cp.value = ""
        regimen_fiscal.value = ""
        phone.value = ""
        fax.value = ""
        locate.value = ""

        enterprise_error.value = ''
        razon_social_error.value = ""
        rfc_error.value = ""
        address_error.value = ""
        ciudad_error.value = ""
        cp_error.value = ""
        regimen_fiscal_error.value = ""
        phone_error.value = ""
        fax_error.value = ""
        locate_error.value = ""
        parque_id_error.value = ""

        enterprise.textContent = ''
        razon_social.textContent = ""
        rfc.textContent = ""
        address.textContent = ""
        ciudad.textContent = ""
        cp.textContent = ""
        regimen_fiscal.textContent = ""
        phone.textContent = ""
        fax.textContent = ""
        locate.textContent = ""

        enterprise_error.textContent = ''
        razon_social_error.textContent = ""
        rfc_error.textContent = ""
        address_error.textContent = ""
        ciudad_error.textContent = ""
        cp_error.textContent = ""
        regimen_fiscal_error.textContent = ""
        phone_error.textContent = ""
        fax_error.textContent = ""
        locate_error.textContent = ""
        parque_id_error.textContent = ""
        user_id_error.textContent = ""

        cleanErrorStyles()
    }

    const handleCreate = () => {
        clearModal()
        document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
        document.querySelector('#modal-title').innerHTML = 'Registrar empresa'

        //SELECT PARQUES
        let option = document.createElement('option')
        option.value = '0'
        option.textContent = '-- Seleccione un parque --'
        option.selected = true
        option.disabled = true
        selectParque.appendChild(option)
        parques.forEach(element => {
            const option = document.createElement('option')
            option.value = element.id
            option.textContent = element.parque
            selectParque.appendChild(option)
        });
        // SELECT ADMINISTRADOR
        option = document.createElement('option')
        option.value = '0'
        option.textContent = '-- Seleccione un administrador --'
        option.selected = true
        option.disabled = true
        selectAdministrador.appendChild(option)
        users.forEach(element => {
            const option = document.createElement('option')
            option.value = element.id
            option.textContent = element.email
            selectAdministrador.appendChild(option)
        });
    }

    const handleEdit = (id) => {
        clearModal()
        document.querySelector('#id').value = id
        document.querySelector('#btn-submit').setAttribute('data-modal', 'edit')
        document.querySelector('#modal-title').innerHTML = 'Editar empresa'
        document.getElementById('edit-id').value = id

        document.querySelector('.spinner-position').style.opacity = 1
        document.querySelector('.spinner-hide').style.opacity = 0
        url = '{{ route('enterprise.get', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            type: "get",
            url: url,
            dataType: "json"
        }).done((json) => {
            if (json === false) {
                message('Hubo un problema...')
                clearModal()
                return false;
            }
            const {
                enterprise: enterprise_respuesta,
                razon_social: razon_social_respuesta,
                rfc: rfc_respuesta,
                regimen_fiscal: regimen_fiscal_respuesta,
                phone: phone_respuesta,
                parque_id: parque_id_respuesta,
                user_id: user_id_respuesta,
                ciudad: ciudad_respuesta,
                cp: cp_respuesta,
                address: address_respuesta,
                fax: fax_respuesta,
                location: location_respuesta,
                id: id_resuesta,
                status_id: status_id_respuesta,
            } = json

            enterprise.value = enterprise_respuesta
            razon_social.value = razon_social_respuesta
            rfc.value = rfc_respuesta
            address.value = address_respuesta
            ciudad.value = ciudad_respuesta
            cp.value = cp_respuesta
            regimen_fiscal.value = regimen_fiscal_respuesta
            phone.value = phone_respuesta
            fax.value = fax_respuesta
            locate.value = location_respuesta
            user_id = user_id_respuesta

            //ADMINISTRADOR DE LA EMPRESA
            let route = '{{ route('enterprise.get_user', ':id') }}'
            let url = route.replace(':id', user_id_respuesta)
            axios({
                method: 'get',
                url: url,
                data: {
                    id: id_resuesta
                }
            }).then((response) => {

                // SELECT ADMINISTRADOR
                option = document.createElement('option')
                option.value = '0'
                option.textContent = '-- Seleccione un administrador --'
                option.disabled = true
                selectAdministrador.appendChild(option)


                option = document.createElement('option')
                option.value = response.data.id
                option.selected = true
                option.textContent = response.data.email
                selectAdministrador.appendChild(option)


                users.forEach(element => {

                    const option = document.createElement('option')
                    option.value = element.id

                    if (option.value != response.data.id) {
                        option.textContent = element.email
                        selectAdministrador.appendChild(option)
                    }

                });

            }).catch((error) => {
                message('Hubo un problema...')
            })
            // PARQUE AL QUE PERTENECE EL SELECT        
            let option = document.createElement('option')
            option.value = 0
            option.textContent = '-- Seleccione un parque --'
            option.selected = true
            option.disabled = true
            selectParque.appendChild(option)
            parques.forEach(element => {
                const option = document.createElement('option')
                option.value = element.id
                option.textContent = element.parque
                selectParque.appendChild(option)
            });


            selectParque.value = parque_id_respuesta

        }).fail((err) => {
            message('Hubo un problema con la petición')
        }).always(() => {
            document.querySelector('.spinner-position').style.opacity = 0
            document.querySelector('.spinner-hide').style.opacity = 1
        })
    }

    const cleanErrors = () => {}

    const cleanErrorStyles = () => {
        enterprise.classList.remove('input-validated')
        razon_social.classList.remove('input-validated')
        rfc.classList.remove('input-validated')
        address.classList.remove('input-validated')
        ciudad.classList.remove('input-validated')
        cp.classList.remove('input-validated')
        enterprise.classList.remove('input-validated')
        regimen_fiscal.classList.remove('input-validated')
        phone.classList.remove('input-validated')
        fax.classList.remove('input-validated')
        fax.classList.remove('input-validated')
        locate.classList.remove('input-validated')
        locate.classList.remove('input-validated')


        enterprise_error.textContent = ''
        razon_social_error.textContent = ""
        rfc_error.textContent = ""
        address_error.textContent = ""
        ciudad_error.textContent = ""
        cp_error.textContent = ""
        regimen_fiscal_error.textContent = ""
        phone_error.textContent = ""
        fax_error.textContent = ""
        locate_error.textContent = ""
        parque_id_error.textContent = ""
        user_id_error.textContent = ""
    }
</script>
