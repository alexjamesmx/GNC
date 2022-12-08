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
            <div class="card-body vh-100 flex">
                <section
                    class="w-1/5 h-full bg-[#585858] grid place-items-center text-white
                grid-cols-1 grid-rows-3 relative gap-4 ">
                    <img id="perfil_foto"src="{{ asset('images/user_transparent.jpg') }}"alt=""
                        class="rounded-full bg-cover object-cover p-4" width="100%" height="100%">

                    <div class="align-self-baseline w-full px-4">
                        <p
                            id="perfil_ocupacion"class="m-0 text-center text-sm text-gray-700 text-white
                        ">
                        </p>
                        <div class="flex mb-1 mt-2 last:justify-center">
                            <p id="perfil_nombre"class='text-center text-3xl font-bold m-0 p-0 text-white'></p>

                        </div>


                        <div class="flex mt-2 justify-start">
                            <p id="perfil_correo" class='text-center text-lg font-bold m-0 p-0 text-white'></p>
                        </div>

                        <div class="flex mt-2 justify-start">
                            <i class="fas fa-phone align-self-center mr-3"></i>
                            <p id="perfil_telefono"class='text-center text-lg font-bold m-0 p-0 text-white'></p>
                        </div>

                        <div class="flex mt-2 justify-start align-items-center">
                            <div id="perfil_status_color"
                                class="rounded-full border-solid border border-black w-3 h-3 mr-3">
                            </div>
                            <p id="perfil_status"class='text-center text-lg font-bold m-0 p-0 text-white'></p>
                        </div>
                    </div>
                </section>
                <section class="w-4/5
                            bg-[#f2f2f2]">
                </section>
            </div>
        </div>
    </div>
</div>
