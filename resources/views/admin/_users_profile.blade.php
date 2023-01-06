<div id="table">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            <div class="flex justify-between mb-4">
                <div
                    id="back_users"class="flex items-center justify-center bg-[#585858] rounded px-3 py-2 cursor-pointer">
                    <i class="fa-solid fa-caret-left text-yellow-500"></i>
                    <p class="m-0 p-0 ml-2 text-lg text-yellow-500 font-bold">Atrás</p>
                </div>

            </div>
            <div class="card-body flex" style="height:70vh">
                <section
                    class="w-2/5
                h-full bg-[#585858] grid place-items-center text-white grid-cols-1 grid-rows-3 relative gap-4 ">

                    <div class="flex w-full h-full justify-center">

                        <img id="perfil_foto"src="{{ asset('images/user_transparent.jpg') }}"alt=""
                            class="rounded-full bg-cover object-cover p-4 aspect-square">

                    </div>

                    <div class="align-self-baseline w-full px-4">
                        <p id="perfil_ocupacion"class="m-0 text-center text-xl text-gray-700 text-white">
                        </p>
                        <div class="flex mt-2 last:justify-center" style="width:inherit">

                            <input id="perfil_nombre" type="text" value="" style="width:inherit;"
                                class="text-sm">
                            <input id="perfil_id" type="hidden" value="">
                        </div>

                        <div class="flex last:justify-center"style="width:inherit">
                            <label id="nombre_error_edit" class="text-sm m-0 p-0 text-red-500 tracking-wide"></label>
                        </div>

                        <div class="flex mt-2 last:justify-center"style="width:inherit">
                            <input id="perfil_apellido" type="text" value=""style="width:inherit"
                                class="text-sm">
                        </div>

                        <div class="flex last:justify-center"style="width:inherit">
                            <label id="apellido_error_edit" class="text-sm m-0 p-0 text-red-500 tracking-wide"></label>
                        </div>


                        <div class="flex mt-2 justify-start"style="width:inherit">

                            <input id="perfil_correo" type="email" value=""style="width:inherit"
                                class="text-sm">
                        </div>

                        <div class="flex last:justify-center"style="width:inherit">
                            <label id="correo_error_edit" class="text-sm m-0 p-0 text-red-500 tracking-wide"></label>
                        </div>

                        <div class="flex mt-2 justify-start"style="width:inherit" class="text-sm">
                            <i class="fas fa-phone align-self-center mr-3"></i>
                            <!-- <p id="perfil_telefono"class='text-center text-lg font-bold m-0 p-0 text-white'></p> -->
                            <input id="perfil_telefono" type="tel" value=""style="width:inherit"
                                class="text-sm">
                        </div>

                        <div class="flex last:justify-center"style="width:inherit" class="text-sm">
                            <label id="telefono_error_edit" class="text-sm m-0 p-0 text-red-500 tracking-wide"></label>
                        </div>

                        <div class="flex mt-2 justify-start align-items-center">
                            <div id="perfil_status_color"
                                class="rounded-full border-solid border border-black w-3 h-3 mr-3">
                            </div>
                            <p id="perfil_status"class='text-center text-lg font-bold m-0 p-0 text-white'></p>
                        </div>
                        <div id="perfil_editar" class="grid place-content-center mt-4">

                        </div>
                    </div>
                </section>
                <section class="w-4/5 bg-[#f2f2f2]">
                </section>
            </div>
        </div>
    </div>
</div>
