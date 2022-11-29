
    <div class="row">
        <div class="message"></div>

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
                                    {{-- <th class="text-white"scope="col">Razón social</th> --}}
                                    {{-- <th class="text-white"scope="col">RFC</th> --}}
                                    <th class="text-white"scope="col">Dirección</th>
                                    <th class="text-white"scope="col">Ciudad</th>
                                    <th class="text-white"scope="col">C.p</th>
                                    {{-- <th class="text-white"scope="col">Régimen fiscal</th> --}}
                                    <th class="text-white"scope="col">Teléfono</th>
                                    {{-- <th class="text-white"scope="col">Fax</th> --}}
                                    <th class="text-white"scope="col">Ubicación</th>
                                    <th class="text-white"scope="col">Pertenece al parque</th>
                                    <th class="text-white"scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($enterprises as $enterprise)
                                    <tr id="row_{{ $enterprise->id }}">
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="id_{{ $enterprise->id }}"> {{ $enterprise->id }}</td>
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="parque_{{ $enterprise->enterprise }}"> {{ $enterprise->enterprise }}</td>
                                        {{-- <td scope="row"  style="min-width:fit-content; white-space:initial"id="calle_{{ $enterprise->razon_social }}"> {{ $enterprise->razon_social }}</td> --}}
                                        {{-- <td scope="row"  style="min-width:fit-content; white-space:initial"id="municipio_{{ $enterprise->rfc }}"> {{ $enterprise->rfc }}</td> --}}
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->address }}"> {{ $enterprise->address }}</td>
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->ciudad }}"> {{ $enterprise->ciudad }}</td>
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->cp }}"> {{ $enterprise->cp }}</td>
                                        {{-- <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->regimen_fiscal }}"> {{ $enterprise->regimen_fiscal }}</td> --}}
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->phone }}"> {{ $enterprise->phone }}</td>
                                        {{-- <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->fax }}"> {{ $enterprise->fax }}</td> --}}
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->location }}"> {{ $enterprise->location }}</td>
                                        <td scope="row"  style="min-width:fit-content; white-space:initial"id="codigo_{{ $enterprise->parque }}"> {{ $enterprise->parque}}</td>
                                        <td scope="row"  style="min-width:fit-content; white-space:initial">
                                            <div class="flex justify-start">
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#modal-enterprises"onclick="handleEdit({{ $enterprise->id }})"
                                                    type="button"class="text-lime-600 border-none bg-transparent mr-5 hover:text-lime-500"
                                                    data-modal="edit"><i class="fa-solid fa-pen-fancy"></i>
                                                    Editar</button>
                                                <button
                                                    onclick="document.getElementById('delete-id').value = {{ $enterprise->id }}"
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

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabi1ndex="-1" aria-labelledby="modal-delete" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog w-fit">
            <div class="modal-content w-fit">
                <div class="modal-body w-fit py-4">
                    <div class="flex justify-start w-fit mb-4">
                        <p class="modal-title text-center p-0 text-2xl m-0" id="exampleModalLabel">¿Estás
                            seguro de esta acción?</p>
                        <input hidden id="delete-id">"
                    </div>
                    <div class="flex
                            justify-between mx-4">
                        <button data-bs-dismiss="modal" aria-label="Close"
                            class="p-2 px-2  transition-colors duration-700 transform bg-purple-500 hover:bg-purple-400 text-gray-100 text-sm rounded-lg focus:border-4 border-purple-300">
                            Volver atrás</button>
                        <button onclick="handleDelete()" data-bs-dismiss="modal" aria-label="Close"
                            class="p-2 px-2 transition-colors duration-700 transform bg-red-500 hover:bg-red-400 text-gray-100 text-sm rounded-lg focus:border-4 border-red-300">
                            <i class="fa-solid fa-trash-can-arrow-up"></i> Confirmar</button>
                    </div>
                </div>
            </div>
        </div>


    <script>
        const parques = @json($parques);
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

        const select = document.querySelector('#select-parque')
        const parque_id_error = document.querySelector('#parque_id_error')
    
        const submit = document.getElementById("btn-submit")

        //ELIMINAR 
        function handleDelete() {
            const id = document.getElementById('delete-id').value
            console.log('Eliminar', id)
            let url = '{{ route('enterprise.delete', ':id') }}';
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
            enterprise.value = ''
            razon_social.value =""
            rfc.value =""
            address.value =""
            ciudad.value =""
            cp.value =""
            regimen_fiscal.value =""
            phone.value =""
            fax.value =""
            locate.value =""

            enterprise_error.value = ''
            razon_social_error.value =""
            rfc.value_error =""
            address.value_error =""
            ciudad.value_error =""
            cp.value_error =""
            regimen_fiscal.value_error =""
            phone.value_error =""
            fax.value_error =""
            locate.value_error =""
            parque_id_error.value = ""

            enterprise.textContent = ''
            razon_social.textContent =""
            rfc.textContent =""
            address.textContent =""
            ciudad.textContent =""
            cp.textContent =""
            regimen_fiscal.textContent =""
            phone.textContent =""
            fax.textContent =""
            locate.textContent =""

            enterprise_error.textContent = ''
            razon_social_error.textContent =""
            rfc_error.textContent =""
            address_error.textContent =""
            ciudad_error.textContent =""
            cp_error.textContent =""
            regimen_fiscal_error.textContent =""
            phone_error.textContent =""
            fax_error.textContent =""
            locate_error.textContent=""
            parque_id_error.textContent = ""
       
        }

        function handleCreate() {
            clearModal()
            document.querySelector('#btn-submit').setAttribute('data-modal', 'create')
            document.querySelector('#modal-title').innerHTML = 'Crear Empresa'


         
            let option = document.createElement('option')
            option.value = '0'
            option.textContent = '-- Seleccione un parque --'
            option.selected = true
            select.appendChild(option)
            parques.forEach(element => {
          
            const option = document.createElement('option')
            option.value = element.id
            option.textContent = element.parque
            select.appendChild(option)
        });
           
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
     
        submit.addEventListener("click", function(e) {
            e.preventDefault()
      
        
            cleanErrors()
            const type = submit.getAttribute('data-modal')
            console.log('tipo', type)
            //CREAR PARQUE  
            if (type === 'create') {
                console.log('entro aqui')

                let body = new FormData(document.getElementById("modal-form"))
                const route = '{{ route('enterprise.store') }}'
                body.append('parque_id', document.querySelector('#select-parque').value)

                console.log(body)
                // console.log(route)

                
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
                        const route = '{{ route('parques.message', '1') }}'
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
                            parque_id : mensaje_parque_id 
                        } = errors

                        if (mensaje_enterprise) {
                            enterprise_error.innerHTML = mensaje_enterprise
                        }
                        if (mensaje_razon_social) {
                            razon_social_error.innerHTML = mensaje_razon_social
                        }
                        if (mensaje_rfc) {
                            rfc_error.innerHTML = mensaje_rfc
                        }
                        if (mensaje_address) {
                            address_error.innerHTML = mensaje_address
                        }
                        if (mensaje_ciudad) {
                            ciudad_error.innerHTML = mensaje_ciudad
                        }
                        if (mensaje_cp) {
                            cp_error.innerHTML = mensaje_cp
                        }
                        if (mensaje_regimen_fiscal) {
                            regimen_fiscal_error.innerHTML = mensaje_regimen_fiscal
                        }
                        if (mensaje_phone) {
                            phone_error.innerHTML = mensaje_phone
                        }
                        if (mensaje_fax) {
                            fax_error.innerHTML = mensaje_fax
                        }
                        if (mensaje_locate) {
                            location_error.innerHTML = mensaje_locate
                        }
                        if(mensaje_parque_id){
                            parque_id_error.innerHTML = mensaje_parque_id
                        }
                    }
                }).fail((response) => {
                    message('Hubo un problema con la petición')
                })
            }
            // if (type === 'edit') {
            //     const id = document.getElementById('edit-id').value
            //     const tmp = '{{ route('parques.actualizar', ':id') }}'
            //     const route = tmp.replace(':id', id)
            //     const body = new FormData(document.getElementById("modal-form"))
            //     $.ajax({
            //         url: route,
            //         type: 'POST',
            //         processData: false,
            //         contentType: false,
            //         data: body,
            //         dataType: 'json',
            //     }).done((json) => {
            //         if (json.response) {
            //             message('Actualizado correctamente')
            //             $('#modal-parques').modal('toggle')
            //             e = document.querySelector('#row_' + id)
            //             document.querySelector('#parque_' + id).textContent = body.get('parque')
            //             document.querySelector('#calle_' + id).textContent = body.get('calle')
            //             document.querySelector('#municipio_' + id).textContent = body.get('municipio')
            //             document.querySelector('#codigo_' + id).textContent = body.get('codigo')
            //         } else {
            //             const errors = json.errors;
            //             const {
            //                 parque: mensaje_parque,
            //                 calle: mensaje_calle,
            //                 municipio: mensaje_municipio,
            //                 codigo: mensaje_codigo,
            //             } = errors
            //             if (mensaje_parque) {
            //                 parque_error.innerHTML = mensaje_parque
            //             }
            //             if (mensaje_calle) {
            //                 calle_error.innerHTML = mensaje_calle
            //             }
            //             if (mensaje_municipio) {
            //                 municipio_error.innerHTML = mensaje_municipio
            //             }
            //             if (mensaje_codigo) {
            //                 codigo_error.innerHTML = mensaje_codigo
            //             }
            //         }
            //     }).fail((response) => {
            //         message('Hubo un problema con la petición')
            //     })
            // }
        });

        function cleanErrors() {
            enterprise_error.value = ''
            razon_social_error.value =""
            rfc.value_error =""
            address_error.value =""
            ciudad_error.value =""
            cp_error.value =""
            regimen_fiscal.value_error =""
            phone_error.value =""
            fax_error.value =""
            locate_error.value =""
            parque_id_error.value =""

            enterprise_error.textContent = ''
            razon_social_error.textContent =""
            rfc_error.textContent =""
            address_error.textContent =""
            ciudad_error.textContent =""
            cp_error.textContent =""
            regimen_fiscal_error.textContent =""
            phone_error.textContent =""
            fax_error.textContent =""
            locate_error.textContent =""
            parque_id_error.textContent =""
        }

        jQuery(document).ready(function($) {
            $('#modal-enterprises').on('hidden.bs.modal', (e) => {
                clearModal()
            })
        });

        @if (Session::has('message'))
            @if (Session::get('message') == 1)
                message('Empresa creada con éxito')
            @endif
        @endif
    </script>
</div>
