<!-- Modal -->
<div class="modal fade" id="modal-enterprises" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog max-w-2xl">
        <div class="modal-content">
            <svg class="animate-spin spinner-position" style="opacity:0"width="48px" height="48px" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                    fill="black" />
                <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="black" />
            </svg>
            <div class="spinner-hide" style="opacity:1">
                <div class="modal-body p-8">
                    <div class="flex justify-between">

                        <p class="modal-title text-2xl" id="modal-title"></p>
                        <button onclick="clearModal()" type="button" data-bs-dismiss="modal" aria-label="Close"
                            class="border-none bg-transparent"> <i class="fa-solid fa-times"></i></button>

                    </div>
                    <form id="modal-form" class='w-full relative'>
                        <input id="id"name="id" hidden>
                        <input type="hidden" id="edit-id">
                        <br>
                        <br>
                        <p class="font-bold text-lg mb-3">Datos de la empresa *</p>
                        <div class="row mb-4">
                            {{-- NOMRBE DE LA EMPRESA --}}
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="hidden" id="edit-id">
                                    <input type="text"id="enterprise" name="enterprise" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="enterprise" class="input-label-custom"
                                        onclick="efecto(this)">Nombre</label>
                                </div>
                                <label id="enterprise_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            {{-- RAZON SOCIAL --}}
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input id="razon_social" name="razon_social" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="razon_social" class="input-label-custom" onclick="efecto(this)">Razón
                                        social</label>
                                </div>
                                <label id="razon_social_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            {{-- RFC --}}
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input id="rfc" name="rfc" class='input-custom w-full' placeholder=" ">
                                    <label for="rfc" class="input-label-custom" onclick="efecto(this)">RFC</label>
                                </div>
                                <label id="rfc_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            {{-- REGIMEN FISCAL --}}
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input id="regimen_fiscal" name="regimen_fiscal" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="regimen_fiscal" class="input-label-custom"
                                        onclick="efecto(this)">Régimen
                                        fiscal</label>
                                </div>
                                <label id="regimen_fiscal_error"
                                    class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        <div class='row'>
                            {{-- TELEFONO --}}
                            <div class="col-6 ">
                                <div class="input-group-custom w-full flex">
                                    <input id="phone" name="phone" class='input-custom w-full' placeholder=" ">
                                    <label for="phone" class="input-label-custom"
                                        onclick="efecto(this)">Teléfono</label>
                                </div>
                                <label id="phone_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            {{-- PARQUE A ELEGIR --}}
                            <div class="col-6 mt-3">
                                <select id="select-parque" name="parque_id">
                                </select>
                                <label id="parque_id_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        <p class="font-bold text-lg mb-3">Administrador *</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <select id="select-administrador" name="user_id">
                                </select>
                                <label id="user_id_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        <p class="font-bold text-lg mb-3.5">Dirección *</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input id="ciudad" name="ciudad" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="ciudad" class="input-label-custom"
                                        onclick="efecto(this)">Ciudad</label>
                                </div>
                                <label id="ciudad_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input id="cp" name="cp" class='input-custom' placeholder=" ">
                                    <label for="cp" class="input-label-custom"
                                        onclick="efecto(this)">C.P.</label>
                                </div>
                                <label id="cp_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input id="address" name="address" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="address" class="input-label-custom"
                                        onclick="efecto(this)">Dirección</label>
                                </div>
                                <label id="address_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        <p class="font-bold text-lg mb-3">Otros(opcionales)</p>
                        <div class="row mb-4">
                            {{-- FAX --}}
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="text" id="fax" name="fax" placeholder=" "
                                        class='input-custom w-full'>
                                    <label for="fax" class="input-label-custom"
                                        onclick="efecto(this)">Fax</label>
                                </div>
                                <label id="fax_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            {{-- GOOGLE MAPS --}}
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input id="location" name="location" placeholder=" " type="text"
                                        class='input-custom w-full location' placeholder=" ">
                                    <label for="location" class="input-label-custom" onclick="efecto(this)">
                                        Ubicación - GOOGLE MAPS</label>
                                </div>
                                <label id="location_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="flex justify-between">

                            <button type="button"
                                class="border-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-gray-600 active:shadow-none shadow-lg bg-gradient-to-tr from-gray-700 to-gray-600 border-gray-700 text-white">
                                <span
                                    class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                                <span class="relative font-semibold tracking-wider">
                                    Limpiar campos
                                </span>
                            </button>

                            <div class="">
                                <button id="button_close"type="button"data-bs-dismiss="modal"onclick="clearModal()"
                                    class="border-none modal-close  rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-purple-600 active:shadow-none shadow-lg bg-gradient-to-tr from-purple-600 to-purple-500 border-purple-700 text-white">
                                    <span
                                        class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                                    <span class="relative tracking-wider">
                                        Cerrar
                                    </span>
                                </button>
                                <button type="submit" id="btn-submit"
                                    class="border-none rounded relative inline-flex group items-center justify-center px-3.5 py-2 m-1 cursor-pointer border-b-4 border-l-2 active:border-green-600 active:shadow-none shadow-lg bg-gradient-to-tr from-green-700 to-green-600 border-green-700 text-white">
                                    <span
                                        class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-32 group-hover:h-32 opacity-10"></span>
                                    <span class="relative font-semibold tracking-wider">
                                        <i class="fa-solid fa-file-arrow-up"></i> Guardar
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
