<!-- Modal -->
<div class="modal fade" id="modal-users" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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

                        <p class="modal-title text-xl" id="modal-title"></p>
                        <button onclick="clearModal()" type="button" data-bs-dismiss="modal" aria-label="Close"
                            class="border-none bg-transparent"> <i class="fa-solid fa-times"></i></button>

                    </div>
                    <form id="modal-form" class='w-full relative'>
                        <input id="id"name="id" hidden>
                        <input type="hidden" id="edit-id">
                        <br>
                        <br>
                        <p class="font-bold text-lg">Llenar campos *</p>
                        {{-- NOMRBE DE LA EMPRESA --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="text"id="name" name="name" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="name" class="input-label-custom"
                                        onclick="efecto(this)">Nombre</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="text"id="last_name" name="last_name" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="last_name" class="input-label-custom"
                                        onclick="efecto(this)">Apellidos</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label id="name_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            <div class="col-6">
                                <label id="last_name_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        {{-- PHONE EMAIL --}}
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="text"id="email" name="email" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="email" class="input-label-custom" onclick="efecto(this)"><i
                                            class="fa-solid fa-at"></i> Email</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="text"id="phone_user" name="phone" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="phone" class="input-label-custom" onclick="efecto(this)"><i
                                            class="fa-solid fa-phone"></i> Teléfono</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label id="email_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            <div class="col-6">
                                <label id="phone_user_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>
                        {{-- PASSWORD --}}
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="text"id="password" name="password" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="password" class="input-label-custom" onclick="efecto(this)">Contraseña</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group-custom w-full flex">
                                    <input type="text"id="password_confirmation" name="password_confirmation" class='input-custom w-full'
                                        placeholder=" ">
                                    <label for="phone" class="input-label-custom" onclick="efecto(this)">Confirmar contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label id="password_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                            <div class="col-6">
                                <label id="password_confirmation_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>

                        <div class='row'>
                            {{-- ROL --}}
                            <div class="col-12">
                                <select id="role_id" name="role_id" class="w-full">
                                    <option value="0" selected disabled>-- Seleccionar tipo </option>
                                    <option value="1">Adminsitrador</option>
                                    <option value="2">Empresa</option>
                                    <option value="3">Técnico</option>
                                </select>
                            </div>
                        </div>


                        <div class='row mb-4'>
                            <div class="col-12">
                                <label id="role_id_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                            </div>
                        </div>


                        <!--Footer-->
                        <div class="flex justify-between">

                            <button type="button" id="clean"
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
