<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="flex justify-between">
                        <p class="text-xl p-0 m-0 text-center self-center">
                            Listado de parques
                        </p>
                        <a href="#" id="modal_open"
                            class="modal-open text-decoration-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white">
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
                                <th>Nombre</th>
                                <th>Calle</th>
                                <th>Municipio</th>
                                <th>Código</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($parques as $parque)
                                <tr>
                                    <td> {{ $parque->parque }}</td>
                                    <td> {{ $parque->calle }}</td>
                                    <td> {{ $parque->municipio }}</td>
                                    <td> {{ $parque->codigo }}</td>
                                    <td>
                                        <div class="flex justify-start">
                                            <button
                                                type="button"class="modal-open text-lime-700 border-none bg-transparent mr-5 hover:text-lime-500"
                                                data-modal="edit"><i class="fa-solid fa-pen-fancy"></i>
                                                Editar</button>
                                            <button type="button"
                                                class="modal-open text-red-700 border-none bg-transparent  hover:text-red-500"><i
                                                    class="fa-solid fa-trash-can"></i> Eliminar</button>





                                        </div class='bg-slate-800'>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $parques->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin._modal')

<script>
    function efecto(e) {
        console.log('aasddsfasdfs')
        e.parentElement.children[0].focus()
    }

    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event) {
            event.preventDefault()
            console.log('Modales')
            console.log(openmodal[i].getAttribute('data-modal'))
            toggleModal()
        })
    }

    // const overlay = document.querySelector('.modal-overlay')
    // overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };


    function toggleModal() {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }
</script>


@if ($errors->any())
    <script>
        let errors = []
        errors = (<?php echo json_encode($errors->all()); ?>)
        console.log('ERRORES', errors)

        document.querySelector('#modal_open').click()

        const list = document.querySelector('#list')


        errors.forEach((e) => {

            if (e.includes('parque')) {
                document.querySelector('#parque_error').innerHTML = e
            }
            if (e.includes('calle')) {
                document.querySelector('#calle_error').innerHTML = e
            }
            if (e.includes('municipio')) {
                document.querySelector('#codigo_error').innerHTML = e
            }
            if (e.includes('codigo')) {
                document.querySelector('#codigo_error').innerHTML = e
            }

            // const li = document.createElement('li')
            // li.innerHTML = e
            // list.appendChild(li)
        })
    </script>
@endif









// <style>
    //     .input-group-custom {
    //         position: relative;
    //     }

    //     .input-custom {
    //         padding: 10px;
    //         border: none;
    //         border-radius: 4px;
    //         font: inherit;
    //         color: #fff;
    //         background-color: transparent;
    //         outline: 2px solid rgb(217, 0, 0)
    //     }

    //     .input-label-custom {
    //         position: absolute;
    //         top: 0;
    //         left: 0;
    //         transform: translate(10px, 10px);
    //         transition: transform .25s
    //     }

    //     .input-custom:focus+.input-label-custom,
    //     .input-custom:valid+.input-label-custom {
    //         transform:
    //             translate(10px, -14px) scale(.8);
    //         color: #d1c5fc;
    //         padding-inline: 5px;
    //         background-color: #242329;
    //     }

    //     .input-custom:is(:focus, :valid) {
    //         outline-color: '#d1c5fc'
    //     }
    //
    //
    //
</style>

<form action="">
    <div class="input-group-custom">
        <input name="parque"required class='input-custom'>
        <label for="parque" class="input-label-custom">Nombre del parque</label>
    </div>
</form>
