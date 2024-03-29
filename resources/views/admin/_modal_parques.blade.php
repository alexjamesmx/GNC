<!-- Modal -->
<div class="modal fade" id="modal-parques" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <svg class="animate-spin spinner-position" style="opacity:0"width="48px" height="48px" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                    fill="black" />
                <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="black" />
            </svg>
            <div class="spinner-hide" style="opacity:1">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Modal title</h1>
                    <button onclick="clearModal()" type="button" data-bs-dismiss="modal" aria-label="Close"
                        class="border-none bg-transparent"> <i class="fa-solid fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form id="modal-form" class='w-full relative'>
                        <input id="id"name="id" hidden>
                        <br>
                        <br>
                        <div class="input-group-custom w-full flex mb-2">
                            <input type="hidden" id="edit-id">
                            <input id="parque" name="parque" required class='input-custom w-full' placeholder=" ">
                            <label for="parque" class="input-label-custom" onclick="efecto(this)">Nombre</label>
                        </div>
                        <label id="parque_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                        <div class="input-group-custom w-full flex mb-2">
                            <select name="estado" id="select_estado">
                                <option value="0" selected disabled>-- Seleccionar estado</option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="CDMX">Ciudad de México</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Durango">Durango</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                        </div>
                        <label id="estado_error" class="text-sm text-red-500 tracking-wide mb-3"></label>
                        <div class="input-group-custom w-full flex mb-2">
                            <input id="municipio"name="municipio"required class='input-custom w-full' placeholder=" ">
                            <label for="municipio" class="input-label-custom" onclick="efecto(this)">Municipio</label>
                        </div>
                        <label id="municipio_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                        <div class="input-group-custom w-full flex mb-2">
                            <input id="calle"name="calle"required class='input-custom w-full' placeholder=" ">
                            <label for="calle" class="input-label-custom" onclick="efecto(this)">Calle</label>
                        </div>
                        <label id="calle_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                        <div class="input-group-custom w-full flex mb-2">
                            <input id="codigo"name="codigo"required class='input-custom w-full' placeholder=" ">
                            <label for="codigo" class="input-label-custom" onclick="efecto(this)">Código
                                Postal</label>
                        </div>
                        <label id="codigo_error" class="text-sm text-red-500 tracking-wide mb-3"></label>

                        <!--Footer-->
                        <div class="flex justify-end">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
