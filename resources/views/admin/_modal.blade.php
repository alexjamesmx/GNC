<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div
        class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto relative bottom-20 min-w-fit">

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left p-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Nuevo parque</p>
                <div class="modal-close cursor-pointer z-50">
                    <i class="fa-solid fa-times"></i>
                </div>
            </div>

            <!--Body-->
            <div class="modal_body">
                <form action="{{ route('parques.store') }}" method="POST" class='w-full relative'>
                    @csrf

                    <div class="input-group-custom">
                        <input name="parque"required class='input-custom'>
                        <label for="parque" class="input-label-custom">Nombre del parque</label>
                    </div>



                    <div class="input-group-custom
                w-full flex">
                        <input name="parque"required class='input-custom w-full'>
                        <label for="parque" class="input-label-custom" onclick="efecto(this)">Nombre</label>
                    </div>
                    <label id="parque_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                    <div class="input-group-custom w-full flex">
                        <input name="calle"required class='input-custom w-full'>
                        <label for="calle" class="input-label-custom" onclick="efecto(this)">Calle</label>
                    </div>
                    <label id="calle_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                    <div class="input-group-custom w-full flex">
                        <input name="municipio"required class='input-custom w-full'>
                        <label for="municipio" class="input-label-custom" onclick="efecto(this)">Municipio</label>
                    </div>
                    <label id="municipio_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                    <div class="input-group-custom w-full flex">
                        <input name="codigo"required class='input-custom w-full'>
                        <label for="codigo" class="input-label-custom" onclick="efecto(this)">Código</label>
                    </div>
                    <label id="codigo_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                    <!--Footer-->
                    <div class="flex justify-end">
                        <a href="#" id="nuevo_parque]"
                            class="modal-close text-decoration-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white">
                            <span
                                class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                            <span class="relative tracking-wider">
                                Cerrar
                            </span>
                        </a>
                        <button type="submit"
                            class="border-none text-decoration-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-green-600 active:shadow-none shadow-lg bg-gradient-to-tr from-green-700 to-green-600 border-green-700 text-white">
                            <span
                                class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                            <span class="relative font-semibold tracking-wider">
                                <i class="fa-solid fa-file-arrow-up"></i> Guardar
                            </span>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
