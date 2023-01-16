function pdfEnterprise_em(id) {
    let url = route[0];
    url = url.replace(':id', id);
    window.open(url);
}

function pdfTransformador_em(id) {
    let url = route[1];
    url = url.replace(':id', id);
    window.open(url);
}

function pdfElecrica_em(id) {
    let url = route[2];
    url = url.replace(':id', id);
    window.open(url);
}
