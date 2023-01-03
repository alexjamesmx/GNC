document.addEventListener("DOMContentLoaded", () => {
    $("#mes_selec").hide();
    $("#spinner_profile").hide();
    $("#list_calendar").show();
    $("#parke_selec").hide();
    $("#empresa_selec").hide();

    const year = new Date().getFullYear();
    $("#ano_select").val(year);
});


function profileMes(mes, num_mes) {
    //console.log(mes);
    $("#list_calendar").hide();
    $("#spinner_profile").show();

    const url = route[0];

    axios
        .post(url)
        .then((res) => {
            //console.log(res.data);
            $("#mes_selec").show();
            $("#title_mes").text(mes);
            $("#spinner_profile").hide();

            res.data.forEach((element) => {
                $("#body_mes").append(
                    `<button class="btn m-0 p-0" onclick="parque_calen(${element.id}, '${element.parque}', '${num_mes}', '${mes}')">
                        <div class="col">
                            <div class="card mb-3 rounded bg-teal-400">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <h3><i class="fa-solid fa-city"></i></h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-white font-semibold m-0">${element.parque}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>`
                );
            });
        })
        .catch((err) => {
            console.log(err);
            $("#spinner_profile").hide();
        });
}

function parque_calen(id, parque, num_mes, mes) {
    $("#mes_selec").hide();
    $("#spinner_profile").show();
    const url = route[1];
    id_data = {
        id: id,
    };
    axios
        .post(url, id_data)
        .then((res) => {
            $("#parke_selec").show();
            $("#title_parque").text(parque);
            $("#spinner_profile").hide();
            if (res.data.length > 0) {
                //console.log(res.data);
                res.data.forEach((element) => {
                    $("#body_parke").append(
                        `<button class="btn m-0 p-0" onclick="empresa_calen(${element.id}, '${element.enterprise}', '${num_mes}', '${mes}')">
                        <div class="col">
                            <div class="card mb-3 rounded bg-teal-400">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <h3><i class="fa-solid fa-industry"></i></h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title
                                            text-white font-semibold m-0">${element.enterprise}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>`
                    );
                });
            } else {
                $("#body_parke").append(
                    `<h3 class="container">No hay datos</h3>`
                );
            }
        })
        .catch((err) => {
            console.log(err);
            $("#spinner_profile").hide();
        });
}

function empresa_calen(id, empresa, num_mes, mes) {
    $("#parke_selec").hide();
    $("#spinner_profile").show();
    $("#empresa_selec").show();
    $("#title_empresa").text(empresa);
    let ano = document.getElementById("ano_select").value;
    const url = route[2];
    id_data = {
        id: id,
        mes: num_mes,
        year: ano,
    };
    axios
        .post(url, id_data)
        .then((res) => {
            //console.log(res.data);
            $("#spinner_profile").hide();
            if (res.data.length > 0) {
                console.log(res.data);
                res.data.forEach((element) => {
                    let f_inicio = new Date(element.fecha_inicio).getTime();
                    //console.log(f_inicio);
                    let f_fin = new Date(element.fecha_fin).getTime();
                    //console.log(f_fin);
                    let f_diferencia = Math.abs(f_fin - f_inicio)/(1000*60);
                    
                    $("#body_table_empresa").append(
                        `<tr>
                            <td>${element.id}</td>
                            <td>${element.tecnico.name}</td>
                            <td>${element.subestacion.subestacion}</td>
                            <td>${element.admin.name}</td>
                            <td>${element.fecha_inicio}</td>
                            <td>${element.fecha_fin}</td>
                            <td>${f_diferencia} min</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-success" onclick="pdfEnterprise(${element.id})">
                                    <img src="${img_url[0]}"/>
                                    </button>
                                    <button type="button" class="btn btn-warning">
                                    <img src="${img_url[1]}"/>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                    <img src="${img_url[2]}"/>
                                    </button>
                                </div>
                            </td>
                        </tr>`
                    );
                });
                
            } else {
                console.log("No hay datos");
                $("#body_table_empresa").append(
                    `<td colspan="7">No hay Inspecciones en ${mes} del ${ano}</td>`
                );
            }

        })
        .catch((err) => {
            console.log(err);
            $("#spinner_profile").hide();
        }
    );
}

function pdfEnterprise(id) {
    let url = route[3];
    console.log(url);
    url = url.replace(':id', id);
    location.href = url;
   

}

function atrasMes() {
    $("#list_calendar").show();
    $("#mes_selec").hide();
    $("#body_mes").empty();
}

function atrasParque() {
    $("#mes_selec").show();
    $("#parke_selec").hide();
    $("#body_parke").empty();
}

function atrasEmpresa() {
    $("#parke_selec").show();
    $("#empresa_selec").hide();
    $("#body_empresa").empty();
    $("#body_table_empresa").empty();
}