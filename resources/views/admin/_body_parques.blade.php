<div class="content-wrapper">

    <div class="row">
        <div class="message"></div>

        <div class="col-lg-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="flex justify-between">
                        <p class="text-xl p-0 m-0 text-center self-center">
                            Listado de parques
                        </p>
                        <a href="#" id="modal_open"
                            class="modal-open text-decoration-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white"
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Calle</th>
                                <th>Municipio</th>
                                <th>Código</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($parques as $parque)
                                <tr id="row_{{ $parque->id }}">
                                    <td> {{ $parque->id }}</td>
                                    <td> {{ $parque->parque }}</td>
                                    <td> {{ $parque->calle }}</td>
                                    <td> {{ $parque->municipio }}</td>
                                    <td> {{ $parque->codigo }}</td>
                                    <td>
                                        <div class="flex justify-start">
                                            <button onclick="handleEdit({{ $parque->id }})"
                                                type="button"class="modal-open text-lime-600 border-none bg-transparent mr-5 hover:text-lime-500"
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
                                <h1>No hay parques </h1>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabi1ndex="-1" aria-labelledby="modal-delete" aria-hidden="true">
        <div class="modal-dialog w-fit">
            <div class="modal-content w-fit">
                <div class="modal-body w-fit py-4">
                    <div class="flex justify-start w-fit mb-4">
                        <p class="modal-title text-center p-0 text-2xl m-0" id="exampleModalLabel">¿Estás
                            seguro de esta acción?</p>
                        <input hidden id="delete-id">"
                        {{-- <button type="button" data-bs-dismiss="modal" aria-label="Close"
                            class='bg-transparent border-none mr-4'>
                            <i id="modal_close_times" class="fa-solid fa-times"></i>
                        </button> --}}
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
    </div>



    <script>
        function handleDelete() {
            const id = document.getElementById('delete-id').value
            console.log('Eliminar', id)
            let url = '{{ route('parques.delete', ':id') }}';
            url = url.replace(':id', id)
            console.log(url)
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
            }).done((json) => {
                console.log(json)
                if (json.response === 1) {
                    message('Eliminado correctamente')
                    document.querySelector('#row_' + id).remove()
                } else {
                    message('Hubo un problema con la petición')
                }

            }).fail((err) => {
                console.log(err)

            })
        }
        document.getElementById('modal-delete').setAttribute('data-bs-keyboard', 'true');
        document.getElementById('modal-delete').setAttribute('data-bs-backdrop', 'static');
        // $('#modal-delete').data('modal').options.backdrop = 'static';
        document.querySelector('#page-title').innerHTML = 'GNC - Parques';
        let session = @json(session()->all());
        let old_data = @json(old())

        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')

        // Al cerrar modal
        function closeModal(e) {
            document.querySelector('.modal').hidden = true
            console.log('Cerrar modal')
            document.querySelector('#parque').value = ''
            document.querySelector('#calle').value = ''
            document.querySelector('#municipio').value = ''
            document.querySelector('#codigo').value = ''

            document.querySelector('#parque_error').textContent = ''
            document.querySelector('#calle_error').textContent = ''
            document.querySelector('#municipio_error').textContent = ''
            document.querySelector('#codigo_error').textContent = ''

            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

        function handleCreate() {
            document.querySelector('.modal').hidden = false
            if (document.querySelector('#method-form') !== null) {
                document.querySelector('#method-form').remove()
            }
            console.log('Modal crear')
            document.querySelector('#modal-title').innerHTML = 'Crear parque'
            document.querySelector('#modal-form').action = '{{ route('parques.store') }}'
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
            document.querySelector('#parque').focus()
        }

        function handleEdit(id) {
            document.querySelector('.modal').hidden = false
            document.querySelector('#modal-title').innerHTML = 'Editar parque'
            let tmp = '{{ route('parques.update', ':id') }}'
            const route = tmp.replace(':id', id)
            const form = document.querySelector('#modal-form')
            form.action = route

            if (document.querySelector('#method-form') === null) {
                let method = document.createElement('input')
                method.id = 'method-form'
                method.name = '_method'
                method.setAttribute('value', 'PATCH')
                method.setAttribute('type', 'hidden')
                form.insertBefore(method, form.firstChild)
            }
            document.querySelector('.spinner-position').style.opacity = 1
            document.querySelector('.spinner-hide').style.opacity = 0

            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')

            let url = '{{ route('parques.update', ':id') }}';
            url = url.replace(':id', id);

            fetch(url)
                .then(response => response.json())
                .then(json => {
                    if (json.response === false) {
                        message('Hubo un problema...')
                        closeModal()
                        return false;
                    }
                    document.querySelector('#id').value = json.id
                    //LLENAR DATOS VIEJOS DEL INPUT EN  FORMULARIO EN CASO DE ERROR... MOSTAR UNA SOLA VEZ EL MODAL
                    if (parseInt(json.id) === parseInt(old_data?.id)) {
                        document.querySelector('#parque').value = old_data?.parque
                        document.querySelector('#calle').value = old_data?.calle
                        document.querySelector('#municipio').value = old_data?.municipio
                        document.querySelector('#codigo').value = old_data?.codigo
                    } else {
                        document.querySelector('#parque').value = json.parque
                        document.querySelector('#calle').value = json.calle
                        document.querySelector('#municipio').value = json.municipio
                        document.querySelector('#codigo').value = json.codigo
                    }
                    document.querySelector('#parque').focus()
                    document.querySelector('.spinner-position').style.opacity = 0
                    document.querySelector('.spinner-hide').style.opacity = 1

                    //BORRAMOS VALORES ANTIGUOS SI ES QUE LOS HAY
                    @if (Session::has('_old_input'))
                        old_data = {}
                    @endif

                })
                .catch(error => console.log(error))
        }

        document.querySelector('#modal_close').addEventListener('click', closeModal)
        document.querySelector('#modal_close_times').addEventListener('click', closeModal)
    </script>
</div>


{{-- EN CASO DE ERRORES --}}
<script>
    @if ($errors->any())

        let errors = JSON.parse(`<?= json_encode($errors->all()) ?>`)

        @if (Session::get('modal') === 'update')
            handleEdit(session.id)
        @elseif (Session::get('modal') === 'crear')
            handleCreate()
        @endif
        errors.forEach((e) => {
            if (e.includes('parque')) {
                document.querySelector('#parque_error').innerHTML = e
            }
            if (e.includes('calle')) {
                document.querySelector('#calle_error').innerHTML = e
            }
            if (e.includes('municipio')) {
                document.querySelector('#municipio_error').innerHTML = e
            }
            if (e.includes('postal')) {
                document.querySelector('#codigo_error').innerHTML = e
            }
        })
    @else
        @if (Session::has('response'))
            {{ Debugbar::info(session('response')) }}
            {{ Debugbar::info('entro') }}

            @if (Session::get('response') == 0)
                console.log('No se actualizó')
            @elseif (Session::get('response') == 1)
                console.log('Si actualizó')
                message('Parque actualizado')
            @elseif (Session::get('response') == 'creado')
                console.log('Si se actualizó')
                message('Parque creado')
            @endif
        @endif
    @endif
</script>