<!-- Modal -->
<div class="modal fade" id="modal-detalle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                <div class="modal-body p-0 m-0 rounded">
                    <div class="flex justify-between bg-gradient-to-r from-blue-500 to-cyan-500 px-4">

                        <p class="mt-3 ml-3 mb-2 modal-title text-2xl text-white font-semibold" id="modal-title">Detalle
                            de la inspección</p>
                        <button onclick="clearModal()" type="button" data-bs-dismiss="modal" aria-label="Close"
                            class="border-none bg-transparent"> <i class="fa-solid fa-times"></i></button>

                    </div>
                    <div class='w-full relative p-8'>
                        <div class="row my-3">
                            <div class="col-md-6 row">
                                <div class="col-sm-6">
                                    <p class="text-sm  text-gray-500 self-end">Parque</p>
                                </div>
                                <div class="col-6">
                                    <p id="parque"class="text-lg "></p>
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <div class="col-sm-6">
                                    <p class="text-sm  text-gray-500 self-end">Empresa</p>
                                </div>
                                <div class="col-sm-6">
                                    <p id="empresa"class="text-lg"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6 row">
                                <div class="col-sm-6">
                                    <p class="text-sm  text-gray-500 self-end">Subestación</p>
                                </div>
                                <div class="col-sm-6">
                                    <p id="subestacion"class="text-lg"></p>
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <div class="col-sm-6">
                                    <p class="text-sm  text-gray-500 self-end">Estado</p>
                                </div>
                                <div class="col-sm-6">
                                    <p id="status"class="text-lg"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6 row">
                                <div class="col-sm-6">
                                    <p class="text-sm  text-gray-500  self-end">Asignado el</p>
                                </div>
                                <div class="col-sm-6">
                                    <p id="asignada"class="text-sm"></p>
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <div class="col-sm-6">
                                    <p class="text-sm  text-gray-500 self-end">Ingresado el</p>
                                </div>
                                <div class="col-sm-6">
                                    <p id="iniciada"class="text-sm"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6 row">
                                <div class="col-sm-6">
                                    <p class="text-sm  text-gray-500 self-end">Finalizado en</p>
                                </div>
                                <div class="col-sm-6">
                                    <p id="finalizada"class="text-sm "></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12 row">
                                <div class="col-sm-2">
                                    <p>Resumen:</p>
                                </div>
                                <div class="col-sm-10">
                                    <p id="resumen"class=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
</div>
</div>
