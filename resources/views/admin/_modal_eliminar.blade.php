<!-- Modal -->
<div class="modal fade" id="modal-delete" tabi1ndex="-1" aria-labelledby="modal-delete" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="true">
    <div class="modal-dialog w-fit">
        <div class="modal-content w-fit">
            <div class="modal-body w-fit py-4">
                <div class="flex justify-start w-fit mb-4">
                    <p class="modal-title text-center p-0 text-2xl m-0" id="exampleModalLabel">¿Estás
                        seguro de esta acción?</p>
                    <input hidden id="delete-id">"
                </div>
                <div class="flex
                            justify-between mx-4">
                    <button data-bs-dismiss="modal" aria-label="Close"
                        class="p-2 px-2  transition-colors duration-700 transform bg-purple-500 hover:bg-purple-400 text-gray-100 text-sm rounded-lg focus:border-4 border-purple-300">
                        Volver atrás</button>
                    <button onclick="handleDelete()" data-bs-dismiss="modal" aria-label="Close"
                        class="p-2 px-2 transition-colors duration-700 transform bg-red-500 hover:bg-red-400 text-gray-100 text-sm rounded-lg focus:border-4 border-red-300">
                        <i class="fa-solid fa-trash-can-arrow-up"></i> Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>
