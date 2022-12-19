var lamparas = null,
    lamparas_emergencia = null,
    senalizacion = null,
    pintura = null,
    herreria = null;
var overlay = document.getElementById( "overlay" );
var popup = document.getElementById( "popup" );
var btnCerrarPopup = document.getElementById( "btn-cerrar-popup" );
//ANOMALIAS
const formAnomalias = document.querySelector( "#form-anomalias" );
const formSelectTipo = document.querySelector( "#form-select-tipo" );
const formSelectTipoError = document.querySelector( "#form-select-tipo-error" );
const formMarca = document.querySelector( "#form-marca" );
const formModelo = document.querySelector( "#form-modelo" );
const formMedidas = document.querySelector( "#form-medidas" );
const formDescription = document.querySelector( "#form-description" );
const formFoto = document.querySelector( "#form-foto" );
const formFotoError = document.querySelector( "#form-foto-error" );
const formDescriptionError = document.querySelector( "#form-description-error" );
//FORM GENERAL
const formInspecciones = document.querySelector( "#form-inspecciones" );

function handleAnomalia( anomaliaTipo )
{
    overlay.classList.add( "active" );
    popup.classList.add( "active" );
    formAnomalias.setAttribute( "data-anomalia", anomaliaTipo );
}

btnCerrarPopup.addEventListener( "click", function ( e )
{
    e.preventDefault();
    overlay.classList.remove( "active" );
    popup.classList.remove( "active" );
    cleanAnomalia();
} );

function saveAnomalia()
{
    const validado = validateAnomalia();
    if ( !validado ) return false;
    const anomalia = formAnomalias.getAttribute( "data-anomalia" );

    let anomaliaData = new FormData( formAnomalias );
    console.trace( "anomalia: " + anomalia );
    if ( anomalia === "lamparas" )
    {
        lamparas = new FormData( formAnomalias );
        console.log( lamparas );
    }
    if ( anomalia === "lamparas_emergencia" )
    {
        lamparas_emergencia = new FormData( formAnomalias );
        console.log( lamparas_emergencia );
    }
    if ( anomalia === "senalizacion" )
    {
        senalizacion = new FormData( formAnomalias );
        console.log( senalizacion );
    }
    if ( anomalia === "pintura" )
    {
        pintura = new FormData( formAnomalias );
    }
    if ( anomalia === "herreria" )
    {
        herreria = new FormData( formAnomalias );
        console.log( herreria );
    }


    const url = route[ 4 ]
    console.log( url )

    axios.post( url, anomaliaData ).then( res =>
    {
        console.log( res.data )



        if ( res.data.errors )
        {
            const { imagen: imagen_err } = res.data.errors
            if ( imagen_err )
            {
                formFotoError.textContent = imagen_err
                document.querySelector( "." + anomalia ).checked = false;
            }
        }
        else
        {
            document.querySelector( "." + anomalia ).checked = true;
            btnCerrarPopup.click();
            message( 'Anomalía guardada' )
        }



    } ).catch( err => console.error( err ) )


}
function validateAnomalia()
{
    let x = 0;
    if ( formSelectTipo.selectedIndex === 0 )
    {
        formSelectTipoError.textContent = "Este campo es requerido";
        x = 1;
    } else
    {
        formSelectTipoError.textContent = "";
    }
    if ( formDescription.value === "" )
    {
        formDescriptionError.textContent = "Este campo es requerido";
        x = 1;
    } else
    {
        formDescriptionError.textContent = "";
    }

    if ( formFoto.value === "" )
    {
        formFotoError.textContent = "Este campo es requerido";
        x = 1;
    } else
    {
        formFotoError.textContent = "";
    }
    if ( x === 1 ) return false;

    console.log( formFoto );
    return true;
}
function cleanAnomalia()
{
    const anomalia = formAnomalias.getAttribute( "data-anomalia" );

    console.log( anomalia );
    if ( anomalia === "lamparas" )
    {
        console.log( lamparas );
        if ( lamparas === null )
        {
            alert( "No se ha guardado ninguna anomalia" );
            document.querySelector( "." + anomalia ).checked = false;
        }
    }
    if ( anomalia === "lamparas_emergencia" )
    {
        if ( lamparas_emergencia === null )
        {
            alert( "No se ha guardado ninguna anomalia" );
            document.querySelector( "." + anomalia ).checked = false;
        }
        console.log( lamparas_emergencia );
    }
    if ( anomalia === "senalizacion" )
    {
        console.log( senalizacion );

        if ( senalizacion === null )
        {
            alert( "No se ha guardado ninguna anomalia" );
            document.querySelector( "." + anomalia ).checked = false;
        }
    }
    if ( anomalia === "pintura" )
    {
        console.log( pintura );
        if ( pintura === null )
        {
            alert( "No se ha guardado ninguna anomalia" );
            document.querySelector( "." + anomalia ).checked = false;
        }
    }
    if ( anomalia === "herreria" )
    {
        console.log( herreria );
        if ( herreria === null )
        {
            alert( "No se ha guardado ninguna anomalia" );
            document.querySelector( "." + anomalia ).checked = false;
        }
    }

    formSelectTipo.selectedIndex = 0;
    formSelectTipoError.textContent = "";
    formMarca.value = "";
    formModelo.value = "";
    formMedidas.value = "";
    formDescription.value = "";
    formDescriptionError.textContent = "";
    formFoto.value = "";
    formFotoError.textContent = "";
}

function saveInspeccion( id )
{
    const body = new FormData( formInspecciones );
    const url = route[ 1 ];
    axios
        .post( url, body )
        .then( ( res ) =>
        {
            if ( !res.data.errors && res.data.response == true )
            {
                cleanFormErrors();
                const anomaliasArr = [
                    lamparas,
                    lamparas_emergencia,
                    senalizacion,
                    pintura,
                    herreria,
                ];

                const url = route[ 2 ];

                let promises = [];
                for ( i = 0; i < anomaliasArr.length; i++ )
                {


                    anomaliasArr[ i ] !== null && promises.push( axios.post( url, anomaliasArr[ i ] ) )
                }

                ( async () =>
                {

                    await subiendo();

                    Promise.all( promises ).then( ( res ) =>
                    {
                        message('!Bien! redireccionado...')
                        location.href = route[ 3 ].replace( ":id", id );
                    } ).catch( ( err ) => { console.error( err ) } )


                } )()

            } else
            {
                const {
                    extintores_aro_seguridad: extintores_aro_seguridad_err,
                    extintores_fecha_vencimiento:
                    extintores_fecha_vencimiento_err,
                    extintores_no: extintores_no_err,
                    extintores_presion: extintores_presion_err,
                    extintores_tipo_agente: extintores_tipo_agente_err,
                    extintores_ubicacion: extintores_ubicacion_err,
                    herreria_estado: herreria_estado_err,
                    herreria_observaciones: herreria_observaciones_err,
                    herreria_requiere: herreria_requiere_err,
                    img1: img1_err,
                    img2: img2_err,
                    img3: img3_err,
                    img4: img4_err,
                    img5: img5_err,
                    img6: img6_err,
                    lamparas_emergencia_estado: lamparas_emergencia_estado_err,
                    lamparas_emergencia_faltante:
                    lamparas_emergencia_faltante_err,
                    lamparas_emergencia_no: lamparas_emergencia_no_err,
                    lamparas_estado: lamparas_estado_err,
                    lamparas_faltante: lamparas_faltante_err,
                    lamparas_no: lamparas_no_err,
                    pintura_estado: pintura_estado_err,
                    pintura_requiere: pintura_requiere_err,
                    senalizacion_observaciones: senalizacion_observaciones_err,
                    senalizacion_seguridad: senalizacion_seguridad_err,
                    senalizacion_seguridad_faltante:
                    senalizacion_seguridad_faltante_err,
                    senalizacion_seguridad_estado:
                    senalizacion_seguridad_estado_err,
                } = res.data.errors;

                let x = 0;
                if ( extintores_aro_seguridad_err )
                {
                    extintores_aro_seguridad.classList.remove( "is-valid" );
                    extintores_aro_seguridad.classList.add( "is-invalid" );
                    extintores_aro_seguridad_error.innerHTML =
                        extintores_aro_seguridad_err;
                } else
                {
                    extintores_aro_seguridad.classList.remove( "is-invalid" );
                    extintores_aro_seguridad.classList.add( "is-valid" );
                    extintores_aro_seguridad_error.innerHTML = "";
                }
                if ( extintores_fecha_vencimiento_err )
                {
                    extintores_fecha_vencimiento.classList.remove( "is-valid" );
                    extintores_fecha_vencimiento.classList.add( "is-invalid" );
                    extintores_fecha_vencimiento_error.innerHTML =
                        extintores_fecha_vencimiento_err;
                } else
                {
                    extintores_fecha_vencimiento.classList.remove( "is-invalid" );
                    extintores_fecha_vencimiento.classList.add( "is-valid" );
                    extintores_fecha_vencimiento_error.innerHTML = "";
                }
                if ( extintores_presion_err )
                {
                    extintores_presion.classList.remove( "is-valid" );
                    extintores_presion.classList.add( "is-invalid" );
                    extintores_presion_error.innerHTML = extintores_presion_err;
                } else
                {
                    extintores_presion.classList.remove( "is-invalid" );
                    extintores_presion.classList.add( "is-valid" );
                    extintores_presion_error.innerHTML = "";
                }
                if ( extintores_tipo_agente_err )
                {
                    extintores_tipo_agente.classList.remove( "is-valid" );
                    extintores_tipo_agente.classList.add( "is-invalid" );
                    extintores_tipo_agente_error.innerHTML =
                        extintores_tipo_agente_err;
                } else
                {
                    extintores_tipo_agente.classList.remove( "is-invalid" );
                    extintores_tipo_agente.classList.add( "is-valid" );
                    extintores_tipo_agente_error.innerHTML = "";
                }
                if ( herreria_observaciones_err )
                {
                    herreria_observaciones.classList.remove( "is-valid" );
                    herreria_observaciones.classList.add( "is-invalid" );
                    herreria_observaciones_error.innerHTML =
                        herreria_observaciones_err;
                } else
                {
                    herreria_observaciones.classList.remove( "is-invalid" );
                    herreria_observaciones.classList.add( "is-valid" );
                    herreria_observaciones_error.innerHTML = "";
                }
                if ( extintores_no_err )
                {
                    no_extintores.classList.remove( "is-valid" );
                    no_extintores.classList.add( "is-invalid" );
                    no_extintores_error.innerHTML = extintores_no_err;
                } else
                {
                    no_extintores.classList.remove( "is-invalid" );
                    no_extintores.classList.add( "is-valid" );
                    no_extintores_error.innerHTML = "";
                }
                if ( extintores_ubicacion_err )
                {
                    console.log( "aqui" );
                    extintores_ubicacion.classList.remove( "is-valid" );
                    extintores_ubicacion.classList.add( "is-invalid" );
                    extintores_ubicacion_error.innerHTML =
                        extintores_ubicacion_err;
                } else
                {
                    console.log( "ph no" );
                    extintores_ubicacion.classList.remove( "is-invalid" );
                    extintores_ubicacion.classList.add( "is-valid" );
                    extintores_ubicacion_error.innerHTML = "";
                }
                if ( extintores_no_err )
                {
                    no_extintores.classList.remove( "is-valid" );
                    no_extintores.classList.add( "is-invalid" );
                    no_extintores_error.innerHTML = extintores_no_err;
                } else
                {
                    no_extintores.classList.remove( "is-invalid" );
                    no_extintores.classList.add( "is-valid" );
                    no_extintores_error.innerHTML = "";
                }
                if ( herreria_requiere_err )
                {
                    herreria_requiere.classList.remove( "is-valid" );
                    herreria_requiere.classList.add( "is-invalid" );
                    herreria_requiere_error.innerHTML = herreria_requiere_err;
                } else
                {
                    herreria_requiere.classList.remove( "is-invalid" );
                    herreria_requiere.classList.add( "is-valid" );
                    herreria_requiere_error.innerHTML = "";
                }

                if ( lamparas_emergencia_faltante_err )
                {
                    lamparas_emergencia_faltante.classList.remove( "is-valid" );
                    lamparas_emergencia_faltante.classList.add( "is-invalid" );
                    lamparas_emergencia_faltante_error.innerHTML =
                        lamparas_emergencia_faltante_err;
                } else
                {
                    lamparas_emergencia_faltante.classList.remove( "is-invalid" );
                    lamparas_emergencia_faltante.classList.add( "is-valid" );
                    lamparas_emergencia_faltante_error.innerHTML = "";
                }
                if ( lamparas_emergencia_no_err )
                {
                    lamparas_emergencia_no.classList.remove( "is-valid" );
                    lamparas_emergencia_no.classList.add( "is-invalid" );
                    lamparas_emergencia_no_error.innerHTML =
                        lamparas_emergencia_no_err;
                } else
                {
                    lamparas_emergencia_no.classList.remove( "is-invalid" );
                    lamparas_emergencia_no.classList.add( "is-valid" );
                    lamparas_emergencia_no_error.innerHTML = "";
                }
                if ( lamparas_faltante_err )
                {
                    lamparas_faltante.classList.remove( "is-valid" );
                    lamparas_faltante.classList.add( "is-invalid" );
                    lamparas_faltante_error.innerHTML = lamparas_faltante_err;
                } else
                {
                    lamparas_faltante.classList.remove( "is-invalid" );
                    lamparas_faltante.classList.add( "is-valid" );
                    lamparas_faltante_error.innerHTML = "";
                }
                if ( pintura_requiere_err )
                {
                    pintura_requiere.classList.remove( "is-valid" );
                    pintura_requiere.classList.add( "is-invalid" );
                    pintura_requiere_error.innerHTML = pintura_requiere_err;
                } else
                {
                    pintura_requiere.classList.remove( "is-invalid" );
                    pintura_requiere.classList.add( "is-valid" );
                    pintura_requiere_error.innerHTML = "";
                }
                if ( senalizacion_observaciones_err )
                {
                    senalizacion_observaciones.classList.remove( "is-valid" );
                    senalizacion_observaciones.classList.add( "is-invalid" );
                    senalizacion_observaciones_error.innerHTML =
                        senalizacion_observaciones_err;
                } else
                {
                    senalizacion_observaciones.classList.remove( "is-invalid" );
                    senalizacion_observaciones.classList.add( "is-valid" );
                    senalizacion_observaciones_error.innerHTML = "";
                }
                if ( senalizacion_seguridad_err )
                {
                    senalizacion_seguridad.classList.remove( "is-valid" );
                    senalizacion_seguridad.classList.add( "is-invalid" );
                    senalizacion_seguridad_error.innerHTML =
                        senalizacion_seguridad_err;
                } else
                {
                    senalizacion_seguridad.classList.remove( "is-invalid" );
                    senalizacion_seguridad.classList.add( "is-valid" );
                    senalizacion_seguridad_error.innerHTML = "";
                }
                if ( senalizacion_seguridad_faltante_err )
                {
                    senalizacion_seguridad_faltante.classList.remove(
                        "is-valid"
                    );
                    senalizacion_seguridad_faltante.classList.add( "is-invalid" );
                    senalizacion_seguridad_faltante_error.innerHTML =
                        senalizacion_seguridad_faltante_err;
                } else
                {
                    senalizacion_seguridad_faltante.classList.remove(
                        "is-invalid"
                    );
                    senalizacion_seguridad_faltante.classList.add( "is-valid" );
                    senalizacion_seguridad_faltante_error.innerHTML = "";
                }
                if ( lamparas_no_err )
                {
                    lamparas_no.classList.remove( "is-valid" );
                    lamparas_no.classList.add( "is-invalid" );
                    lamparas_no_error.innerHTML = lamparas_no_err;
                } else
                {
                    lamparas_no.classList.remove( "is-invalid" );
                    lamparas_no.classList.add( "is-valid" );
                    lamparas_no_error.innerHTML = "";
                }
                if ( img1_err )
                {
                    img1.classList.remove( "is-valid" );
                    img1.classList.add( "is-invalid" );
                    img1_error.innerHTML = img1_err;
                } else
                {
                    img1.classList.remove( "is-invalid" );
                    img1.classList.add( "is-valid" );
                    img1_error.innerHTML = "";
                }
                if ( img2_err )
                {
                    img2.classList.remove( "is-valid" );
                    img2.classList.add( "is-invalid" );
                    img2_error.innerHTML = img2_err;
                } else
                {
                    img2.classList.remove( "is-invalid" );
                    img2.classList.add( "is-valid" );
                    img2_error.innerHTML = "";
                }
                if ( img3_err )
                {
                    img3.classList.remove( "is-valid" );
                    img3.classList.add( "is-invalid" );
                    img3_error.innerHTML = img3_err;
                } else
                {
                    img3.classList.remove( "is-invalid" );
                    img3.classList.add( "is-valid" );
                    img3_error.innerHTML = "";
                }
                if ( img4_err )
                {
                    img4.classList.remove( "is-valid" );
                    img4.classList.add( "is-invalid" );
                    img4_error.innerHTML = img4_err;
                } else
                {
                    img4.classList.remove( "is-invalid" );
                    // img4.classList.add('is-valid')
                    img4_error.innerHTML = "";
                }
                if ( img5_err )
                {
                    img5.classList.remove( "is-valid" );
                    img5.classList.add( "is-invalid" );
                    img5_error.innerHTML = img5_err;
                } else
                {
                    img5.classList.remove( "is-invalid" );
                    // img5.classList.add('is-valid')
                    img5_error.innerHTML = "";
                }
                if ( img6_err )
                {
                    img6.classList.remove( "is-valid" );
                    img6.classList.add( "is-invalid" );
                    img6_error.innerHTML = img6_err;
                } else
                {
                    img6.classList.remove( "is-invalid" );
                    // img6.classList.add('is-valid')
                    img6_error.innerHTML = "";
                }
                if ( lamparas_estado_err && x === 0 )
                {
                    x = 1;
                    alert( "Por favor, indica el estado de las lámparas" );
                }
                if ( lamparas_emergencia_estado_err && x === 0 )
                {
                    x = 1;
                    alert(
                        "Por favor, indica el estado de las lámparas de emergencia"
                    );
                }
                if ( senalizacion_seguridad_estado_err && x === 0 )
                {
                    x = 1;
                    alert(
                        "Por favor, indica el estado de la señalización de seguridad"
                    );
                }
                if ( herreria_estado_err && x === 0 )
                {
                    x = 1;
                    alert( "Por favor, indica el estado de la herreria" );
                }
                if ( pintura_estado_err && x === 0 )
                {
                    x = 1;
                    alert( "Por favor, indica el estado de la pintura" );
                }
            }
        } )
        .catch( ( err ) => console.error( err ) );
}

const herreria_estado_si = document.querySelector( "#herreria_estado_si" );
const herreria_estado_no = document.querySelector( "#herreria_estado_no" );
const herreria_estado_error = document.querySelector( "#herreria_estado_error" );

//FORMULARIO VALIDACIONES
const no_extintores = document.querySelector( "#extintores_no" );
const no_extintores_error = document.querySelector( "#extintores_no_error" );
no_extintores.addEventListener( "change", () =>
{
    if ( no_extintores.value === "" )
    {
        no_extintores.classList.remove( "is-valid" );
        no_extintores.classList.add( "is-invalid" );
        no_extintores_error.innerHTML = "Este campo es requerido";
    } else if ( no_extintores.value.length >= 255 )
    {
        no_extintores.classList.remove( "is-valid" );
        no_extintores.classList.add( "is-invalid" );
        no_extintores_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        no_extintores.classList.remove( "is-invalid" );
        no_extintores_error.innerHTML = "";
        no_extintores.classList.add( "is-valid" );
    }
} );

const extintores_tipo_agente = document.querySelector(
    "#extintores_tipo_agente"
);
const extintores_tipo_agente_error = document.querySelector(
    "#extintores_tipo_agente_error"
);
extintores_tipo_agente.addEventListener( "change", () =>
{
    if ( extintores_tipo_agente.selectedIndex === 0 )
    {
        extintores_tipo_agente.classList.remove( "is-valid" );
        extintores_tipo_agente.classList.add( "is-invalid" );
        extintores_tipo_agente_error.innerHTML = "Este campo es requerido";
    } else
    {
        extintores_tipo_agente.classList.remove( "is-invalid" );
        extintores_tipo_agente_error.innerHTML = "";
        extintores_tipo_agente.classList.add( "is-valid" );
    }
} );

const extintores_fecha_vencimiento = document.querySelector(
    "#extintores_fecha_vencimiento"
);
const extintores_fecha_vencimiento_error = document.querySelector(
    "#extintores_fecha_vencimiento_error"
);
extintores_fecha_vencimiento.addEventListener( "change", () =>
{
    if ( extintores_fecha_vencimiento.value === "" )
    {
        extintores_fecha_vencimiento.classList.remove( "is-valid" );
        extintores_fecha_vencimiento.classList.add( "is-invalid" );
        extintores_fecha_vencimiento_error.innerHTML =
            "Este campo es requerido";
    } else
    {
        extintores_fecha_vencimiento.classList.remove( "is-invalid" );
        extintores_fecha_vencimiento_error.innerHTML = "";
        extintores_fecha_vencimiento.classList.add( "is-valid" );
    }
} );

const extintores_presion = document.querySelector( "#extintores_presion" );
const extintores_presion_error = document.querySelector(
    "#extintores_presion_error"
);
extintores_presion.addEventListener( "change", () =>
{
    if ( extintores_presion.value === "" )
    {
        extintores_presion.classList.remove( "is-valid" );
        extintores_presion.classList.add( "is-invalid" );
        extintores_presion_error.innerHTML = "Este campo es requerido";
    } else if ( extintores_presion.value.length > 255 )
    {
        extintores_presion.classList.remove( "is-valid" );
        extintores_presion.classList.add( "is-invalid" );
        extintores_presion_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        extintores_presion.classList.remove( "is-invalid" );
        extintores_presion_error.innerHTML = "";
        extintores_presion.classList.add( "is-valid" );
    }
} );

const extintores_aro_seguridad = document.querySelector(
    "#extintores_aro_seguridad"
);
const extintores_aro_seguridad_error = document.querySelector(
    "#extintores_aro_seguridad_error"
);
extintores_aro_seguridad.addEventListener( "change", () =>
{
    if ( extintores_aro_seguridad.value === "" )
    {
        extintores_aro_seguridad.classList.remove( "is-valid" );
        extintores_aro_seguridad.classList.add( "is-invalid" );
        extintores_aro_seguridad_error.innerHTML = "Este campo es requerido";
    } else if ( extintores_aro_seguridad.value.length > 255 )
    {
        extintores_aro_seguridad.classList.remove( "is-valid" );
        extintores_aro_seguridad.classList.add( "is-invalid" );
        extintores_aro_seguridad_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        extintores_aro_seguridad.classList.remove( "is-invalid" );
        extintores_aro_seguridad_error.innerHTML = "";
        extintores_aro_seguridad.classList.add( "is-valid" );
    }
} );

const extintores_ubicacion = document.querySelector( "#extintores_ubicacion" );
const extintores_ubicacion_error = document.querySelector(
    "#extintores_ubicacion_error"
);
extintores_ubicacion.addEventListener( "change", () =>
{
    if ( extintores_ubicacion.value === "" )
    {
        extintores_ubicacion.classList.remove( "is-valid" );
        extintores_ubicacion.classList.add( "is-invalid" );
        extintores_ubicacion_error.innerHTML = "Este campo es requerido";
    } else if ( extintores_ubicacion.value.length > 255 )
    {
        extintores_ubicacion.classList.remove( "is-valid" );
        extintores_ubicacion.classList.add( "is-invalid" );
        extintores_ubicacion_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        extintores_ubicacion.classList.remove( "is-invalid" );
        extintores_ubicacion.classList.add( "is-valid" );
        extintores_ubicacion_error.innerHTML = "";
    }
} );
const lamparas_no = document.querySelector( "#lamparas_no" );
const lamparas_no_error = document.querySelector( "#lamparas_no_error" );
lamparas_no.addEventListener( "change", () =>
{
    if ( lamparas_no.value === "" )
    {
        lamparas_no.classList.remove( "is-valid" );
        lamparas_no.classList.add( "is-invalid" );
        lamparas_no_error.innerHTML = "Este campo es requerido";
    } else if ( lamparas_no.value.length > 255 )
    {
        lamparas_no.classList.remove( "is-valid" );
        lamparas_no.classList.add( "is-invalid" );
        lamparas_no_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        lamparas_no.classList.remove( "is-invalid" );
        lamparas_no.classList.add( "is-valid" );
        lamparas_no_error.innerHTML = "";
    }
} );

const lamparas_faltante = document.querySelector( "#lamparas_faltante" );
const lamparas_faltante_error = document.querySelector(
    "#lamparas_faltante_error"
);
lamparas_faltante.addEventListener( "change", () =>
{
    if ( lamparas_faltante.value === "" )
    {
        lamparas_faltante.classList.remove( "is-valid" );
        lamparas_faltante.classList.add( "is-invalid" );
        lamparas_faltante_error.innerHTML = "Este campo es requerido";
    } else if ( lamparas_faltante.value.length > 255 )
    {
        lamparas_faltante.classList.remove( "is-valid" );
        lamparas_faltante.classList.add( "is-invalid" );
        lamparas_faltante_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        lamparas_faltante.classList.remove( "is-invalid" );
        lamparas_faltante.classList.add( "is-valid" );
        lamparas_faltante_error.innerHTML = "";
    }
} );

const lamparas_emergencia_no = document.querySelector(
    "#lamparas_emergencia_no"
);
const lamparas_emergencia_no_error = document.querySelector(
    "#lamparas_emergencia_no_error"
);
lamparas_emergencia_no.addEventListener( "change", () =>
{
    if ( lamparas_emergencia_no.value === "" )
    {
        lamparas_emergencia_no.classList.remove( "is-valid" );
        lamparas_emergencia_no.classList.add( "is-invalid" );
        lamparas_emergencia_no_error.innerHTML = "Este campo es requerido";
    } else if ( lamparas_emergencia_no.value.length > 255 )
    {
        lamparas_emergencia_no.classList.remove( "is-valid" );
        lamparas_emergencia_no.classList.add( "is-invalid" );
        lamparas_emergencia_no_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        lamparas_emergencia_no.classList.remove( "is-invalid" );
        lamparas_emergencia_no.classList.add( "is-valid" );
        lamparas_emergencia_no_error.innerHTML = "";
    }
} );
const lamparas_emergencia_faltante = document.querySelector(
    "#lamparas_emergencia_faltante"
);
const lamparas_emergencia_faltante_error = document.querySelector(
    "#lamparas_emergencia_faltante_error"
);
lamparas_emergencia_faltante.addEventListener( "change", () =>
{
    if ( lamparas_emergencia_faltante.value === "" )
    {
        lamparas_emergencia_faltante.classList.remove( "is-valid" );
        lamparas_emergencia_faltante.classList.add( "is-invalid" );
        lamparas_emergencia_faltante_error.innerHTML =
            "Este campo es requerido";
    } else if ( lamparas_emergencia_faltante.value.length > 255 )
    {
        lamparas_emergencia_faltante.classList.remove( "is-valid" );
        lamparas_emergencia_faltante.classList.add( "is-invalid" );
        lamparas_emergencia_faltante_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        lamparas_emergencia_faltante.classList.remove( "is-invalid" );
        lamparas_emergencia_faltante.classList.add( "is-valid" );
        lamparas_emergencia_faltante_error.innerHTML = "";
    }
} );

const senalizacion_seguridad = document.querySelector(
    "#senalizacion_seguridad"
);
const senalizacion_seguridad_error = document.querySelector(
    "#senalizacion_seguridad_error"
);
senalizacion_seguridad.addEventListener( "change", () =>
{
    if ( senalizacion_seguridad.value === "" )
    {
        senalizacion_seguridad.classList.remove( "is-valid" );
        senalizacion_seguridad.classList.add( "is-invalid" );
        senalizacion_seguridad_error.innerHTML = "Este campo es requerido";
    } else if ( senalizacion_seguridad.value.length > 255 )
    {
        senalizacion_seguridad.classList.remove( "is-valid" );
        senalizacion_seguridad.classList.add( "is-invalid" );
        senalizacion_seguridad_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        senalizacion_seguridad.classList.remove( "is-invalid" );
        senalizacion_seguridad.classList.add( "is-valid" );
        senalizacion_seguridad_error.innerHTML = "";
    }
} );

const senalizacion_seguridad_faltante = document.querySelector(
    "#senalizacion_seguridad_faltante"
);
const senalizacion_seguridad_faltante_error = document.querySelector(
    "#senalizacion_seguridad_faltante_error"
);
senalizacion_seguridad_faltante.addEventListener( "change", () =>
{
    if ( senalizacion_seguridad_faltante.value === "" )
    {
        senalizacion_seguridad_faltante.classList.remove( "is-valid" );
        senalizacion_seguridad_faltante.classList.add( "is-invalid" );
        senalizacion_seguridad_faltante_error.innerHTML =
            "Este campo es requerido";
    } else if ( senalizacion_seguridad_faltante.value.length > 255 )
    {
        senalizacion_seguridad_faltante.classList.remove( "is-valid" );
        senalizacion_seguridad_faltante.classList.add( "is-invalid" );
        senalizacion_seguridad_faltante_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        senalizacion_seguridad_faltante.classList.remove( "is-invalid" );
        senalizacion_seguridad_faltante.classList.add( "is-valid" );
        senalizacion_seguridad_faltante_error.innerHTML = "";
    }
} );

const senalizacion_observaciones = document.querySelector(
    "#senalizacion_observaciones"
);
const senalizacion_observaciones_error = document.querySelector(
    "#senalizacion_observaciones_error"
);
senalizacion_observaciones.addEventListener( "change", () =>
{
    if ( senalizacion_observaciones.value === "" )
    {
        senalizacion_observaciones.classList.remove( "is-valid" );
        senalizacion_observaciones.classList.add( "is-invalid" );
        senalizacion_observaciones_error.innerHTML = "Este campo es requerido";
    } else if ( senalizacion_observaciones.value.length > 255 )
    {
        senalizacion_observaciones.classList.remove( "is-valid" );
        senalizacion_observaciones.classList.add( "is-invalid" );
        senalizacion_observaciones_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        senalizacion_observaciones.classList.remove( "is-invalid" );
        senalizacion_observaciones.classList.add( "is-valid" );
        senalizacion_observaciones_error.innerHTML = "";
    }
} );

const pintura_requiere = document.querySelector( "#pintura_requiere" );
const pintura_requiere_error = document.querySelector(
    "#pintura_requiere_error"
);
pintura_requiere.addEventListener( "change", () =>
{
    if ( pintura_requiere.value === "" )
    {
        pintura_requiere.classList.remove( "is-valid" );
        pintura_requiere.classList.add( "is-invalid" );
        pintura_requiere_error.innerHTML = "Este campo es requerido";
    } else if ( pintura_requiere.value.length > 255 )
    {
        pintura_requiere.classList.remove( "is-valid" );
        pintura_requiere.classList.add( "is-invalid" );
        pintura_requiere_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        pintura_requiere.classList.remove( "is-invalid" );
        pintura_requiere.classList.add( "is-valid" );
        pintura_requiere_error.innerHTML = "";
    }
} );
const herreria_requiere = document.querySelector( "#herreria_requiere" );
const herreria_requiere_error = document.querySelector(
    "#herreria_requiere_error"
);
herreria_requiere.addEventListener( "change", () =>
{
    if ( herreria_requiere.value === "" )
    {
        herreria_requiere.classList.remove( "is-valid" );
        herreria_requiere.classList.add( "is-invalid" );
        herreria_requiere_error.innerHTML = "Este campo es requerido";
    } else if ( herreria_requiere.value.length > 255 )
    {
        herreria_requiere.classList.remove( "is-valid" );
        herreria_requiere.classList.add( "is-invalid" );
        herreria_requiere_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        herreria_requiere.classList.remove( "is-invalid" );
        herreria_requiere.classList.add( "is-valid" );
        herreria_requiere_error.innerHTML = "";
    }
} );
const herreria_observaciones = document.querySelector(
    "#herreria_observaciones"
);
const herreria_observaciones_error = document.querySelector(
    "#herreria_observaciones_error"
);
herreria_observaciones.addEventListener( "change", () =>
{
    if ( herreria_observaciones.value === "" )
    {
        herreria_observaciones.classList.remove( "is-valid" );
        herreria_observaciones.classList.add( "is-invalid" );
        herreria_observaciones_error.innerHTML = "Este campo es requerido";
    } else if ( herreria_observaciones.value.length > 255 )
    {
        herreria_observaciones.classList.remove( "is-valid" );
        herreria_observaciones.classList.add( "is-invalid" );
        herreria_observaciones_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        herreria_observaciones.classList.remove( "is-invalid" );
        herreria_observaciones.classList.add( "is-valid" );
        herreria_observaciones_error.innerHTML = "";
    }
} );
const img1 = document.querySelector( "#img1" );
const img1_error = document.querySelector( "#img1_error" );
const img2 = document.querySelector( "#img2" );
const img2_error = document.querySelector( "#img2_error" );
const img3 = document.querySelector( "#img3" );
const img3_error = document.querySelector( "#img3_error" );

const img4 = document.querySelector( "#img4" );
const img4_error = document.querySelector( "#img4_error" );
const img5 = document.querySelector( "#img5" );
const img5_error = document.querySelector( "#img5_error" );
const img6 = document.querySelector( "#img6" );
const img6_error = document.querySelector( "#img6_error" );

img1.addEventListener( "change", () =>
{
    if ( img1.value === "" )
    {
        img1.classList.remove( "is-valid" );
        img1.classList.add( "is-invalid" );
        img1_error.innerHTML = "Este campo es requerido";
    } else
    {
        img1.classList.remove( "is-invalid" );
        img1.classList.add( "is-valid" );
        img1_error.innerHTML = "";
    }
} );
img2.addEventListener( "change", () =>
{
    if ( img2.value === "" )
    {
        img2.classList.remove( "is-valid" );
        img2.classList.add( "is-invalid" );
        img2_error.innerHTML = "Este campo es requerido";
    } else
    {
        img2.classList.remove( "is-invalid" );
        img2.classList.add( "is-valid" );
        img2_error.innerHTML = "";
    }
} );
img3.addEventListener( "change", () =>
{
    if ( img3.value === "" )
    {
        img3.classList.remove( "is-valid" );
        img3.classList.add( "is-invalid" );
        img3_error.innerHTML = "Este campo es requerido";
    } else
    {
        img3.classList.remove( "is-invalid" );
        img3.classList.add( "is-valid" );
        img3_error.innerHTML = "";
    }
} );
//

function cleanFormErrors()
{
    extintores_aro_seguridad.classList.remove( "is-invalid" );
    extintores_aro_seguridad.classList.add( "is-valid" );
    extintores_aro_seguridad_error.innerHTML = "";

    extintores_fecha_vencimiento.classList.remove( "is-invalid" );
    extintores_fecha_vencimiento.classList.add( "is-valid" );
    extintores_fecha_vencimiento_error.innerHTML = "";

    extintores_presion.classList.remove( "is-invalid" );
    extintores_presion.classList.add( "is-valid" );
    extintores_presion_error.innerHTML = "";

    extintores_tipo_agente.classList.remove( "is-invalid" );
    extintores_tipo_agente.classList.add( "is-valid" );
    extintores_tipo_agente_error.innerHTML = "";

    herreria_observaciones.classList.remove( "is-invalid" );
    herreria_observaciones.classList.add( "is-valid" );
    herreria_observaciones_error.innerHTML = "";

    no_extintores.classList.remove( "is-invalid" );
    no_extintores.classList.add( "is-valid" );
    no_extintores_error.innerHTML = "";

    extintores_ubicacion.classList.remove( "is-invalid" );
    extintores_ubicacion.classList.add( "is-valid" );
    extintores_ubicacion_error.innerHTML = "";

    no_extintores.classList.remove( "is-invalid" );
    no_extintores.classList.add( "is-valid" );
    no_extintores_error.innerHTML = "";

    herreria_requiere.classList.remove( "is-invalid" );
    herreria_requiere.classList.add( "is-valid" );
    herreria_requiere_error.innerHTML = "";

    lamparas_emergencia_faltante.classList.remove( "is-invalid" );
    lamparas_emergencia_faltante.classList.add( "is-valid" );
    lamparas_emergencia_faltante_error.innerHTML = "";

    lamparas_emergencia_no.classList.remove( "is-invalid" );
    lamparas_emergencia_no.classList.add( "is-valid" );
    lamparas_emergencia_no_error.innerHTML = "";

    lamparas_faltante.classList.remove( "is-invalid" );
    lamparas_faltante.classList.add( "is-valid" );
    lamparas_faltante_error.innerHTML = "";

    pintura_requiere.classList.remove( "is-invalid" );
    pintura_requiere.classList.add( "is-valid" );
    pintura_requiere_error.innerHTML = "";

    senalizacion_observaciones.classList.remove( "is-invalid" );
    senalizacion_observaciones.classList.add( "is-valid" );
    senalizacion_observaciones_error.innerHTML = "";

    senalizacion_seguridad.classList.remove( "is-invalid" );
    senalizacion_seguridad.classList.add( "is-valid" );
    senalizacion_seguridad_error.innerHTML = "";

    senalizacion_seguridad_faltante.classList.remove( "is-invalid" );
    senalizacion_seguridad_faltante.classList.add( "is-valid" );
    senalizacion_seguridad_faltante_error.innerHTML = "";

    lamparas_no.classList.remove( "is-invalid" );
    lamparas_no.classList.add( "is-valid" );
    lamparas_no_error.innerHTML = "";

    img1.classList.remove( "is-invalid" );
    img1.classList.add( "is-valid" );
    img1_error.innerHTML = "";

    img2.classList.remove( "is-invalid" );
    img2.classList.add( "is-valid" );
    img2_error.innerHTML = "";

    img3.classList.remove( "is-invalid" );
    img3.classList.add( "is-valid" );
    img3_error.innerHTML = "";

    img4.classList.remove( "is-invalid" );
    // img4.classList.add('is-valid')
    img4_error.innerHTML = "";

    img5.classList.remove( "is-invalid" );
    // img5.classList.add('is-valid')
    img5_error.innerHTML = "";

    img6.classList.remove( "is-invalid" );
    // img6.classList.add('is-valid')
    img6_error.innerHTML = "";
}
document.querySelector( "#btn-cancelar" ).addEventListener( "click", () =>
{
    const confirmar = confirm( "¿Está seguro que desea cancelar?" );
    if ( !confirmar ) return false;
    console.log( route );
    const id = document.querySelector( "#inspeccion_id" ).value;
    const url = route[ 3 ].replace( ":id", id );
    console.log( url );
    window.location.href = url;
} );

async function subiendo()
{


    return new Promise( resolve =>
    {
        message( 'Subiendo inspección, por favor espere...' )
        setTimeout( () =>
        {
            resolve( true )
        }, 2000 )
    } )

}
