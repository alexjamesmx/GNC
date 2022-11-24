    //EFECTO FOCUS EN LABELS DE FORMULARIO
    function efecto(e) {
        console.log(e)
        e.parentElement.children[0].focus()
    }
    //MODAL CERRAR CON ESCAPE
    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            closeModal()
        }
    };