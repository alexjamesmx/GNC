<!--Modal-->
<div hidden class="modal opacity-0 pointer-events-none fixed w-full h-full left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div
        class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto relative bottom-20 min-w-fit">

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left p-6">
            <svg class="animate-spin spinner-position" style="opacity:0"width="48px" height="48px" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                    fill="black" />
                <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="black" />
            </svg>
            <!--Title-->
            <div class="spinner-hide" style="opacity:1">
                <div class="flex justify-between items-center">
                    <p id="modal-title"class="text-2xl font-bold p-0 m-0">

                    </p>
                    <div class="modal-close
                        cursor-pointer z-50">
                        <i id="modal_close_times" class="fa-solid fa-times"></i>
                    </div>
                </div>

                <!--Body-->
                <div class="modal_body">


                    <form id="modal-form"action="" method="POST" class='w-full relative'>
                        @csrf
                        <input id="id"name="id" hidden>
                        <br>
                        <br>
                        <div id="before"></div>
                        <div class="input-group-custom w-full flex">

                            <input id="parque" name="parque" required class='input-custom w-full'
                                value="{{ old('parque') ?? '' }} ">
                            <label for="parque" class="input-label-custom" onclick="efecto(this)">Nombre</label>
                        </div>
                        <label id="parque_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                        <div class="input-group-custom w-full flex">
                            <input id="calle"name="calle"required class='input-custom w-full'>
                            <label for="calle" class="input-label-custom" onclick="efecto(this)">Calle</label>
                        </div>
                        <label id="calle_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                        <div class="input-group-custom w-full flex">
                            <input id="municipio"name="municipio"required class='input-custom w-full'>
                            <label for="municipio" class="input-label-custom" onclick="efecto(this)">Municipio</label>
                        </div>
                        <label id="municipio_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                        <div class="input-group-custom w-full flex">
                            <input id="codigo"name="codigo"required class='input-custom w-full'>
                            <label for="codigo" class="input-label-custom" onclick="efecto(this)">Código
                                Postal</label>
                        </div>
                        <label id="codigo_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                        <!--Footer-->
                        <div class="flex justify-end">
                            <button type="button"id="modal_close"
                                class="border-none modal-close  rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white">
                                <span
                                    class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                                <span class="relative tracking-wider">
                                    Cerrar
                                </span>
                            </button>
                            <button type="submit"
                                class="border-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-green-600 active:shadow-none shadow-lg bg-gradient-to-tr from-green-700 to-green-600 border-green-700 text-white">
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
</div>
