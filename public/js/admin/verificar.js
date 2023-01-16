function pdfEnterprise(id) {
    let url = route[0];
    console.log(url);
    url = url.replace(':id', id);
    window.open(url);
}

function pdfTransformador(id) {
    let url = route[1];
    console.log(url);
    url = url.replace(':id', id);
    window.open(url);
}

function pdfElecrica(id) {
    console.log("pdfElecrica");
    let url = route[2];
    console.log(url);
    url = url.replace(':id', id);
    window.open(url);
}

function verificado(id) {
   
    let body_v = new FormData;
    body_v.append('id', id)
    let url = route[3];
    const r = confirm('Esta acción podrá realizarse una sola vez. ¿Estas seguro de notificar esta inspección a la empresa?')
    if(r){
        axios
        .post(url, body_v)
        .then(res => {
            console.log(res);
            window.location.reload();
        })
        .catch((err) => {
            console.log(err);
        
        });
    }
}