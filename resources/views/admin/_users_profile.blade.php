<div id="table">
    <div class="col-lg-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body vh-100">
                <div class="flex justify-between mb-4">
                    <div
                        id="back_users"class="flex items-center justify-center bg-[#585858] rounded px-3 py-2 cursor-pointer">
                        <i class="fa-solid fa-caret-left text-yellow-500"></i>
                        <p class="m-0 p-0 ml-2 text-lg text-yellow-500 ">Atrás</p>
                    </div>
                </div>

                <section
                    class="max-w-sm h-full bg-slate-400 grid place-items-center
                grid-cols-1 grid-rows-3 relative gap-4">
                    <img src="{{ asset('images/user_transparent.jpg') }}" alt=""
                        class="w-2/4 h-auto rounded-full max-h-full">

                    <div class="align-self-baseline">
                        <p id="perfil_nombre"class='text-4xl font-bold m-0 p-0 mb-1'></p>
                        <p id="perfil_ocupacion"class="text-center text-sm text-gray-700">Admin</p>

                        <p id="perfil_correo"></p>
                        <p id="perfil_telefono"></p>
                        <p id="perfil_status"></p>
                    </div>



                </section>
            </div>
        </div>
    </div>
</div>
