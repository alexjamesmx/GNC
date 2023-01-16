const formMarca = document.getElementById('marca'),
formMarca_error = document.getElementById('marca_error'),

formNo_serie = document.getElementById('no_serie'),
formNo_serie_error = document.getElementById('no_serie_error')

formCapacidad = document.getElementById('capacidad'),
formCapacidad_error = document.getElementById('capacidad_error'),

formNeutro = document.getElementById('neutro'),
formNeutro_error = document.getElementById('neutro_error'),

formtension = document.getElementById('tension'),
formtension_error = document.getElementById('tension_error'),

formImpedancia = document.getElementById('impedancia'),
formImpedancia_error = document.getElementById('impedancia_error'),

formA = document.getElementById('a'),
formA_error = document.getElementById('a_error'),

formC = document.getElementById('c'),
formC_error = document.getElementById('c_error'),

formLts_aceite = document.getElementById('lts_aceite'),
formLts_aceite_error = document.getElementById('lts_aceite_error'),

formConex_primario = document.getElementById('conex_primario'),
formConex_primario_error = document.getElementById('conex_primario_error'),

formConex_secundario = document.getElementById('conex_secundario'),
formConex_secundario_error = document.getElementById('conex_secundario_error'),

formFecha_fabricacion = document.getElementById('fecha_fabricacion'),
formFecha_fabricacion_error = document.getElementById('fecha_fabricacion_error'),

formAceite = document.getElementById('aceite'),
formAceite_error = document.getElementById('aceite_error'),

formPesoTotal = document.getElementById('peso_total'),
formPesoTotal_error = document.getElementById('peso_total_error'),

formLimpieza = document.getElementById('limpieza'),
formLimpieza_error = document.getElementById('limpieza_error'),

formIndicador_nivel = document.getElementById('indicador_nivel'),
formIndicador_nivel_error = document.getElementById('indicador_nivel_error'),

formIndicador_temperatura = document.getElementById('indicador_temperatura'),
formIndicador_temperatura_error = document.getElementById('indicador_temperatura_error'),

formIndicador_temperatura_max = document.getElementById('indicador_temperatura_max'),
formIndicador_temperatura_max_error = document.getElementById('indicador_temperatura_max_error'),

formValvula_alivio = document.getElementById('valvula_alivio'),
formValvula_alivio_error = document.getElementById('valvula_alivio_error'),

formValvula_llenado = document.getElementById('valvula_llenado'),
formValvula_llenado_error = document.getElementById('valvula_llenado_error'),

formValvula_drenado = document.getElementById('valvula_drenado'),
formValvula_drenado_error = document.getElementById('valvula_drenado_error'),

formValvula_muestreo = document.getElementById('valvula_muestreo'),
formValvula_muestreo_error = document.getElementById('valvula_muestreo_error'),

formCambiador_derivaciones = document.getElementById('cambiador_derivaciones'),
formCambiador_derivaciones_error = document.getElementById('cambiador_derivaciones_error'),

formPintura_estado = document.getElementById('pintura_estado'),
formPintura_estado_error = document.getElementById('pintura_estado_error'),

formTierra_neutro = document.getElementById('tierra_neutro'),
formTierra_neutro_error = document.getElementById('tierra_neutro_error'),

formTierra_tanque = document.getElementById('tierra_tanque'),
formTierra_tanque_error = document.getElementById('tierra_tanque_error'),

formTierra_codos = document.getElementById('tierra_codos'),
formTierra_codos_error = document.getElementById('tierra_codos_error'),

formTierra_insertos = document.getElementById('tierra_insertos'),
formTierra_insertos_error = document.getElementById('tierra_insertos_error'),

formBoquillas_h1 = document.getElementById('boquillas_h1'),
formBoquillas_h1_error = document.getElementById('boquillas_h1_error'),

formBoquillas_h2 = document.getElementById('boquillas_h2'),
formBoquillas_h2_error = document.getElementById('boquillas_h2_error'),

formBoquillas_h3 = document.getElementById('boquillas_h3'),
formBoquillas_h3_error = document.getElementById('boquillas_h3_error'),

formBoquillas_x0 = document.getElementById('boquillas_x0'),
formBoquillas_x0_error = document.getElementById('boquillas_x0_error'),

formBoquillas_x1 = document.getElementById('boquillas_x1'),
formBoquillas_x1_error = document.getElementById('boquillas_x1_error'),

formBoquillas_x2 = document.getElementById('boquillas_x2'),
formBoquillas_x2_error = document.getElementById('boquillas_x2_error'),

formBoquillas_x3 = document.getElementById('boquillas_x3'),
formBoquillas_x3_error = document.getElementById('boquillas_x3_error'),

formObservaciones = document.getElementById('observaciones'),
formObservaciones_error = document.getElementById('observaciones_error'),

img1 = document.querySelector( "#img1" ),
img1_error = document.querySelector( "#img1_error" ),
img2 = document.querySelector( "#img2" ),
img2_error = document.querySelector( "#img2_error" ),
img3 = document.querySelector( "#img3" ),
img3_error = document.querySelector( "#img3_error" ),
img4 = document.querySelector( "#img4" ),
img4_error = document.querySelector( "#img4_error" ),
img5 = document.querySelector( "#img5" ),
img5_error = document.querySelector( "#img5_error" ),
img6 = document.querySelector( "#img6" ),
img6_error = document.querySelector( "#img6_error" );

formMarca.addEventListener( "change", () =>
{
    if ( formMarca.value === "" )
    {
        formMarca.classList.remove( "is-valid" );
        formMarca.classList.add( "is-invalid" );
        formMarca_error.innerHTML = "Este campo es requerido";
    } else if ( formMarca.value.length > 255 )
    {
        formMarca.classList.remove( "is-valid" );
        formMarca.classList.add( "is-invalid" );
        formMarca_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formMarca.classList.remove( "is-invalid" );
        formMarca.classList.add( "is-valid" );
        formMarca_error.innerHTML = "";
    }
} );
formNo_serie.addEventListener( "change", () =>
{
    if ( formNo_serie.value === "" )
    {
        formNo_serie.classList.remove( "is-valid" );
        formNo_serie.classList.add( "is-invalid" );
        formNo_serie_error.innerHTML = "Este campo es requerido";
    } else if ( formNo_serie.value.length > 255 )
    {
        formNo_serie.classList.remove( "is-valid" );
        formNo_serie.classList.add( "is-invalid" );
        formNo_serie_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formNo_serie.classList.remove( "is-invalid" );
        formNo_serie.classList.add( "is-valid" );
        formNo_serie_error.innerHTML = "";
    }
} );
formCapacidad.addEventListener( "change", () =>
{
    if ( formCapacidad.value === "" )
    {
        formCapacidad.classList.remove( "is-valid" );
        formCapacidad.classList.add( "is-invalid" );
        formCapacidad_error.innerHTML = "Este campo es requerido";
    } else if ( formCapacidad.value.length > 255 )
    {
        formCapacidad.classList.remove( "is-valid" );
        formCapacidad.classList.add( "is-invalid" );
        formCapacidad_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formCapacidad.classList.remove( "is-invalid" );
        formCapacidad.classList.add( "is-valid" );
        formCapacidad_error.innerHTML = "";
    }
} );

formNeutro.addEventListener( "change", () =>
{
    if ( formNeutro.value === "" )
    {
        formNeutro.classList.remove( "is-valid" );
        formNeutro.classList.add( "is-invalid" );
        formNeutro_error.innerHTML = "Este campo es requerido";
    } else if ( formNeutro.value.length > 255 )
    {
        formNeutro.classList.remove( "is-valid" );
        formNeutro.classList.add( "is-invalid" );
        formNeutro_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formNeutro.classList.remove( "is-invalid" );
        formNeutro.classList.add( "is-valid" );
        formNeutro_error.innerHTML = "";
    }
} );
formtension.addEventListener( "change", () =>
{
    if ( formtension.value === "" )
    {
        formtension.classList.remove( "is-valid" );
        formtension.classList.add( "is-invalid" );
        formtension_error.innerHTML = "Este campo es requerido";
    } else if ( formtension.value.length > 255 )
    {
        formtension.classList.remove( "is-valid" );
        formtension.classList.add( "is-invalid" );
        formtension_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formtension.classList.remove( "is-invalid" );
        formtension.classList.add( "is-valid" );
        formtension_error.innerHTML = "";
    }
} );
formImpedancia.addEventListener( "change", () =>
{
    if ( formImpedancia.value === "" )
    {
        formImpedancia.classList.remove( "is-valid" );
        formImpedancia.classList.add( "is-invalid" );
        formImpedancia_error.innerHTML = "Este campo es requerido";
    } else if ( formImpedancia.value.length > 255 )
    {
        formImpedancia.classList.remove( "is-valid" );
        formImpedancia.classList.add( "is-invalid" );
        formImpedancia_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formImpedancia.classList.remove( "is-invalid" );
        formImpedancia.classList.add( "is-valid" );
        formImpedancia_error.innerHTML = "";
    }
} );
formA.addEventListener( "change", () =>
{
    if ( formA.value === "" )
    {
        formA.classList.remove( "is-valid" );
        formA.classList.add( "is-invalid" );
        formA_error.innerHTML = "Este campo es requerido";
    } else if ( formA.value.length > 255 )
    {
        formA.classList.remove( "is-valid" );
        formA.classList.add( "is-invalid" );
        formA_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formA.classList.remove( "is-invalid" );
        formA.classList.add( "is-valid" );
        formA_error.innerHTML = "";
    }
} );
formC.addEventListener( "change", () =>
{
    if ( formC.value === "" )
    {
        formC.classList.remove( "is-valid" );
        formC.classList.add( "is-invalid" );
        formC_error.innerHTML = "Este campo es requerido";
    } else if ( formC.value.length > 255 )
    {
        formC.classList.remove( "is-valid" );
        formC.classList.add( "is-invalid" );
        formC_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formC.classList.remove( "is-invalid" );
        formC.classList.add( "is-valid" );
        formC_error.innerHTML = "";
    }
} );
formLts_aceite.addEventListener( "change", () =>
{
    if ( formLts_aceite.value === "" )
    {
        formLts_aceite.classList.remove( "is-valid" );
        formLts_aceite.classList.add( "is-invalid" );
        formLts_aceite_error.innerHTML = "Este campo es requerido";
    } else if ( formLts_aceite.value.length > 255 )
    {
        formLts_aceite.classList.remove( "is-valid" );
        formLts_aceite.classList.add( "is-invalid" );
        formLts_aceite_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formLts_aceite.classList.remove( "is-invalid" );
        formLts_aceite.classList.add( "is-valid" );
        formLts_aceite_error.innerHTML = "";
    }
} );
formFecha_fabricacion.addEventListener( "change", () =>
{
    if ( formFecha_fabricacion.value === "" )
    {
        formFecha_fabricacion.classList.remove( "is-valid" );
        formFecha_fabricacion.classList.add( "is-invalid" );
        formFecha_fabricacion_error.innerHTML = "Este campo es requerido";
    } else if ( formFecha_fabricacion.value.length > 255 )
    {
        formFecha_fabricacion.classList.remove( "is-valid" );
        formFecha_fabricacion.classList.add( "is-invalid" );
        formFecha_fabricacion_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formFecha_fabricacion.classList.remove( "is-invalid" );
        formFecha_fabricacion.classList.add( "is-valid" );
        formFecha_fabricacion_error.innerHTML = "";
    }
} );
formAceite.addEventListener( "change", () =>
{
    if ( formAceite.value === "" )
    {
        formAceite.classList.remove( "is-valid" );
        formAceite.classList.add( "is-invalid" );
        formAceite_error.innerHTML = "Este campo es requerido";
    } else if ( formAceite.value.length > 255 )
    {
        formAceite.classList.remove( "is-valid" );
        formAceite.classList.add( "is-invalid" );
        formAceite_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formAceite.classList.remove( "is-invalid" );
        formAceite.classList.add( "is-valid" );
        formAceite_error.innerHTML = "";
    }
} );
// formConex_primario.addEventListener( "change", () =>
// {
//     if ( formConex_primario.value === "" )
//     {
//         formConex_primario.classList.remove( "is-valid" );
//         formConex_primario.classList.add( "is-invalid" );
//         formConex_primario_error.innerHTML = "Este campo es requerido";
//     } else if ( formConex_primario.value.length > 255 )
//     {
//         formConex_primario.classList.remove( "is-valid" );
//         formConex_primario.classList.add( "is-invalid" );
//         formConex_primario_error.innerHTML =
//             "Este campo no puede tener más de 255 caracteres";
//     } else
//     {
//         formConex_primario.classList.remove( "is-invalid" );
//         formConex_primario.classList.add( "is-valid" );
//         formConex_primario_error.innerHTML = "";
//     }
// } );
// formConex_secundario.addEventListener( "change", () =>
// {
//     if ( formConex_secundario.value === "" )
//     {
//         formConex_secundario.classList.remove( "is-valid" );
//         formConex_secundario.classList.add( "is-invalid" );
//         formConex_secundario_error.innerHTML = "Este campo es requerido";
//     } else if ( formConex_secundario.value.length > 255 )
//     {
//         formConex_secundario.classList.remove( "is-valid" );
//         formConex_secundario.classList.add( "is-invalid" );
//         formConex_secundario_error.innerHTML =
//             "Este campo no puede tener más de 255 caracteres";
//     } else
//     {
//         formConex_secundario.classList.remove( "is-invalid" );
//         formConex_secundario.classList.add( "is-valid" );
//         formConex_secundario_error.innerHTML = "";
//     }
// } );
formPesoTotal.addEventListener( "change", () =>
{
    if ( formPesoTotal.value === "" )
    {
        formPesoTotal.classList.remove( "is-valid" );
        formPesoTotal.classList.add( "is-invalid" );
        formPesoTotal_error.innerHTML = "Este campo es requerido";
    } else if ( formPesoTotal.value.length > 255 )
    {
        formPesoTotal.classList.remove( "is-valid" );
        formPesoTotal.classList.add( "is-invalid" );
        formPesoTotal_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formPesoTotal.classList.remove( "is-invalid" );
        formPesoTotal.classList.add( "is-valid" );
        formPesoTotal_error.innerHTML = "";
    }
} );
formLimpieza.addEventListener( "change", () =>
{
    if ( formLimpieza.value === "" )
    {
        formLimpieza.classList.remove( "is-valid" );
        formLimpieza.classList.add( "is-invalid" );
        formLimpieza_error.innerHTML = "Este campo es requerido";
    } else if ( formLimpieza.value.length > 255 )
    {
        formLimpieza.classList.remove( "is-valid" );
        formLimpieza.classList.add( "is-invalid" );
        formLimpieza_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formLimpieza.classList.remove( "is-invalid" );
        formLimpieza.classList.add( "is-valid" );
        formLimpieza_error.innerHTML = "";
    }
} );
formIndicador_nivel.addEventListener( "change", () =>
{
    if ( formIndicador_nivel.value === "" )
    {
        formIndicador_nivel.classList.remove( "is-valid" );
        formIndicador_nivel.classList.add( "is-invalid" );
        formIndicador_nivel_error.innerHTML = "Este campo es requerido";
    } else if ( formMarca.value.length > 255 )
    {
        formIndicador_nivel.classList.remove( "is-valid" );
        formIndicador_nivel.classList.add( "is-invalid" );
        formIndicador_nivel_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formIndicador_nivel.classList.remove( "is-invalid" );
        formIndicador_nivel.classList.add( "is-valid" );
        formIndicador_nivel_error.innerHTML = "";
    }
} );
formIndicador_temperatura.addEventListener( "change", () =>
{
    if ( formIndicador_temperatura.value === "" )
    {
        formIndicador_temperatura.classList.remove( "is-valid" );
        formIndicador_temperatura.classList.add( "is-invalid" );
        formIndicador_temperatura_error.innerHTML = "Este campo es requerido";
    } else if ( formIndicador_temperatura.value.length > 255 )
    {
        formIndicador_temperatura.classList.remove( "is-valid" );
        formIndicador_temperatura.classList.add( "is-invalid" );
        formIndicador_temperatura_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formIndicador_temperatura.classList.remove( "is-invalid" );
        formIndicador_temperatura.classList.add( "is-valid" );
        formIndicador_temperatura_error.innerHTML = "";
    }
} );
formIndicador_temperatura_max.addEventListener( "change", () =>
{
    if ( formIndicador_temperatura_max.value === "" )
    {
        formIndicador_temperatura_max.classList.remove( "is-valid" );
        formIndicador_temperatura_max.classList.add( "is-invalid" );
        formIndicador_temperatura_max_error.innerHTML = "Este campo es requerido";
    } else if ( formMarca.value.length > 255 )
    {
        formIndicador_temperatura_max.classList.remove( "is-valid" );
        formIndicador_temperatura_max.classList.add( "is-invalid" );
        formIndicador_temperatura_max_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formIndicador_temperatura_max.classList.remove( "is-invalid" );
        formIndicador_temperatura_max.classList.add( "is-valid" );
        formIndicador_temperatura_max_error.innerHTML = "";
    }
} );
formValvula_alivio.addEventListener( "change", () =>
{
    if ( formValvula_alivio.value === "" )
    {
        formValvula_alivio.classList.remove( "is-valid" );
        formValvula_alivio.classList.add( "is-invalid" );
        formValvula_alivio_error.innerHTML = "Este campo es requerido";
    } else if ( formValvula_alivio.value.length > 255 )
    {
        formValvula_alivio.classList.remove( "is-valid" );
        formValvula_alivio.classList.add( "is-invalid" );
        formValvula_alivio_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formValvula_alivio.classList.remove( "is-invalid" );
        formValvula_alivio.classList.add( "is-valid" );
        formValvula_alivio_error.innerHTML = "";
    }
} );
formValvula_llenado.addEventListener( "change", () =>
{
    if ( formValvula_llenado.value === "" )
    {
        formValvula_llenado.classList.remove( "is-valid" );
        formValvula_llenado.classList.add( "is-invalid" );
        formValvula_llenado_error.innerHTML = "Este campo es requerido";
    } else if ( formValvula_llenado.value.length > 255 )
    {
        formValvula_llenado.classList.remove( "is-valid" );
        formValvula_llenado.classList.add( "is-invalid" );
        formValvula_llenado_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formValvula_llenado.classList.remove( "is-invalid" );
        formValvula_llenado.classList.add( "is-valid" );
        formValvula_llenado_error.innerHTML = "";
    }
} );
formValvula_drenado.addEventListener( "change", () =>
{
    if ( formValvula_drenado.value === "" )
    {
        formValvula_drenado.classList.remove( "is-valid" );
        formValvula_drenado.classList.add( "is-invalid" );
        formValvula_drenado_error.innerHTML = "Este campo es requerido";
    } else if ( formValvula_drenado.value.length > 255 )
    {
        formValvula_drenado.classList.remove( "is-valid" );
        formValvula_drenado.classList.add( "is-invalid" );
        formValvula_drenado_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formValvula_drenado.classList.remove( "is-invalid" );
        formValvula_drenado.classList.add( "is-valid" );
        formValvula_drenado_error.innerHTML = "";
    }
} );
formValvula_muestreo.addEventListener( "change", () =>
{
    if ( formValvula_muestreo.value === "" )
    {
        formValvula_muestreo.classList.remove( "is-valid" );
        formValvula_muestreo.classList.add( "is-invalid" );
        formValvula_muestreo_error.innerHTML = "Este campo es requerido";
    } else if ( formValvula_muestreo.value.length > 255 )
    {
        formValvula_muestreo.classList.remove( "is-valid" );
        formValvula_muestreo.classList.add( "is-invalid" );
        formValvula_muestreo_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formValvula_muestreo.classList.remove( "is-invalid" );
        formValvula_muestreo.classList.add( "is-valid" );
        formValvula_muestreo_error.innerHTML = "";
    }
} );

formCambiador_derivaciones.addEventListener( "change", () =>
{
    if ( formCambiador_derivaciones.value === "" )
    {
        formCambiador_derivaciones.classList.remove( "is-valid" );
        formCambiador_derivaciones.classList.add( "is-invalid" );
        formCambiador_derivaciones_error.innerHTML = "Este campo es requerido";
    } else if ( formCambiador_derivaciones.value.length > 255 )
    {
        formCambiador_derivaciones.classList.remove( "is-valid" );
        formCambiador_derivaciones.classList.add( "is-invalid" );
        formCambiador_derivaciones_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formCambiador_derivaciones.classList.remove( "is-invalid" );
        formCambiador_derivaciones.classList.add( "is-valid" );
        formCambiador_derivaciones_error.innerHTML = "";
    }
} );
formPintura_estado.addEventListener( "change", () =>
{
    if ( formPintura_estado.value === "" )
    {
        formPintura_estado.classList.remove( "is-valid" );
        formPintura_estado.classList.add( "is-invalid" );
        formPintura_estado_error.innerHTML = "Este campo es requerido";
    } else if ( formPintura_estado.value.length > 255 )
    {
        formPintura_estado.classList.remove( "is-valid" );
        formPintura_estado.classList.add( "is-invalid" );
        formPintura_estado_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formPintura_estado.classList.remove( "is-invalid" );
        formPintura_estado.classList.add( "is-valid" );
        formPintura_estado_error.innerHTML = "";
    }
} );
formTierra_neutro.addEventListener( "change", () =>
{
    if ( formTierra_neutro.value === "" )
    {
        formTierra_neutro.classList.remove( "is-valid" );
        formTierra_neutro.classList.add( "is-invalid" );
        formTierra_neutro_error.innerHTML = "Este campo es requerido";
    } else if ( formTierra_neutro.value.length > 255 )
    {
        formTierra_neutro.classList.remove( "is-valid" );
        formTierra_neutro.classList.add( "is-invalid" );
        formTierra_neutro_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formTierra_neutro.classList.remove( "is-invalid" );
        formTierra_neutro.classList.add( "is-valid" );
        formTierra_neutro_error.innerHTML = "";
    }
} );
formTierra_tanque.addEventListener( "change", () =>
{
    if ( formTierra_tanque.value === "" )
    {
        formTierra_tanque.classList.remove( "is-valid" );
        formTierra_tanque.classList.add( "is-invalid" );
        formTierra_tanque_error.innerHTML = "Este campo es requerido";
    } else if ( formTierra_tanque.value.length > 255 )
    {
        formTierra_tanque.classList.remove( "is-valid" );
        formTierra_tanque.classList.add( "is-invalid" );
        formTierra_tanque_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formTierra_tanque.classList.remove( "is-invalid" );
        formTierra_tanque.classList.add( "is-valid" );
        formTierra_tanque_error.innerHTML = "";
    }
} );
formTierra_codos.addEventListener( "change", () =>
{
    if ( formTierra_codos.value === "" )
    {
        formTierra_codos.classList.remove( "is-valid" );
        formTierra_codos.classList.add( "is-invalid" );
        formTierra_codos_error.innerHTML = "Este campo es requerido";
    } else if ( formTierra_codos.value.length > 255 )
    {
        formTierra_codos.classList.remove( "is-valid" );
        formTierra_codos.classList.add( "is-invalid" );
        formTierra_codos_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formTierra_codos.classList.remove( "is-invalid" );
        formTierra_codos.classList.add( "is-valid" );
        formTierra_codos_error.innerHTML = "";
    }
} );
formTierra_insertos.addEventListener( "change", () =>
{
    if ( formTierra_insertos.value === "" )
    {
        formTierra_insertos.classList.remove( "is-valid" );
        formTierra_insertos.classList.add( "is-invalid" );
        formTierra_insertos_error.innerHTML = "Este campo es requerido";
    } else if ( formTierra_insertos.value.length > 255 )
    {
        formTierra_insertos.classList.remove( "is-valid" );
        formTierra_insertos.classList.add( "is-invalid" );
        formTierra_insertos_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formTierra_insertos.classList.remove( "is-invalid" );
        formTierra_insertos.classList.add( "is-valid" );
        formTierra_insertos_error.innerHTML = "";
    }
} );
formBoquillas_h1.addEventListener( "change", () =>
{
    if ( formBoquillas_h1.value === "" )
    {
        formBoquillas_h1.classList.remove( "is-valid" );
        formBoquillas_h1.classList.add( "is-invalid" );
        formBoquillas_h1_error.innerHTML = "Este campo es requerido";
    } else if ( formBoquillas_h1.value.length > 255 )
    {
        formBoquillas_h1.classList.remove( "is-valid" );
        formBoquillas_h1.classList.add( "is-invalid" );
        formBoquillas_h1_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formBoquillas_h1.classList.remove( "is-invalid" );
        formBoquillas_h1.classList.add( "is-valid" );
        formBoquillas_h1_error.innerHTML = "";
    }
} );
formBoquillas_h2.addEventListener( "change", () =>
{
    if ( formBoquillas_h2.value === "" )
    {
        formBoquillas_h2.classList.remove( "is-valid" );
        formBoquillas_h2.classList.add( "is-invalid" );
        formBoquillas_h2_error.innerHTML = "Este campo es requerido";
    } else if ( formBoquillas_h2.value.length > 255 )
    {
        formBoquillas_h2.classList.remove( "is-valid" );
        formBoquillas_h2.classList.add( "is-invalid" );
        formBoquillas_h2_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formBoquillas_h2.classList.remove( "is-invalid" );
        formBoquillas_h2.classList.add( "is-valid" );
        formBoquillas_h2_error.innerHTML = "";
    }
} );
formBoquillas_h3.addEventListener( "change", () =>
{
    if ( formBoquillas_h3.value === "" )
    {
        formBoquillas_h3.classList.remove( "is-valid" );
        formBoquillas_h3.classList.add( "is-invalid" );
        formBoquillas_h3_error.innerHTML = "Este campo es requerido";
    } else if ( formBoquillas_h3.value.length > 255 )
    {
        formBoquillas_h3.classList.remove( "is-valid" );
        formBoquillas_h3.classList.add( "is-invalid" );
        formBoquillas_h3_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formBoquillas_h3.classList.remove( "is-invalid" );
        formBoquillas_h3.classList.add( "is-valid" );
        formBoquillas_h3_error.innerHTML = "";
    }
} );
formBoquillas_x0.addEventListener( "change", () =>
{
    if ( formBoquillas_x0.value === "" )
    {
        formBoquillas_x0.classList.remove( "is-valid" );
        formBoquillas_x0.classList.add( "is-invalid" );
        formBoquillas_x0_error.innerHTML = "Este campo es requerido";
    } else if ( formBoquillas_x0.value.length > 255 )
    {
        formBoquillas_x0.classList.remove( "is-valid" );
        formBoquillas_x0.classList.add( "is-invalid" );
        formBoquillas_x0_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formBoquillas_x0.classList.remove( "is-invalid" );
        formBoquillas_x0.classList.add( "is-valid" );
        formBoquillas_x0_error.innerHTML = "";
    }
} );
formBoquillas_x1.addEventListener( "change", () =>
{
    if ( formBoquillas_x1.value === "" )
    {
        formBoquillas_x1.classList.remove( "is-valid" );
        formBoquillas_x1.classList.add( "is-invalid" );
        formBoquillas_x1_error.innerHTML = "Este campo es requerido";
    } else if ( formBoquillas_x1.value.length > 255 )
    {
        formBoquillas_x1.classList.remove( "is-valid" );
        formBoquillas_x1.classList.add( "is-invalid" );
        formBoquillas_x1_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formBoquillas_x1.classList.remove( "is-invalid" );
        formBoquillas_x1.classList.add( "is-valid" );
        formBoquillas_x1_error.innerHTML = "";
    }
} );
formBoquillas_x2.addEventListener( "change", () =>
{
    if ( formBoquillas_x2.value === "" )
    {
        formBoquillas_x2.classList.remove( "is-valid" );
        formBoquillas_x2.classList.add( "is-invalid" );
        formBoquillas_x2_error.innerHTML = "Este campo es requerido";
    } else if ( formBoquillas_x2.value.length > 255 )
    {
        formBoquillas_x2.classList.remove( "is-valid" );
        formBoquillas_x2.classList.add( "is-invalid" );
        formBoquillas_x2_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formBoquillas_x2.classList.remove( "is-invalid" );
        formBoquillas_x2.classList.add( "is-valid" );
        formBoquillas_x2_error.innerHTML = "";
    }
} );
formBoquillas_x3.addEventListener( "change", () =>
{
    if ( formBoquillas_x3.value === "" )
    {
        formBoquillas_x3.classList.remove( "is-valid" );
        formBoquillas_x3.classList.add( "is-invalid" );
        formBoquillas_x3_error.innerHTML = "Este campo es requerido";
    } else if ( formBoquillas_x3.value.length > 255 )
    {
        formBoquillas_x3.classList.remove( "is-valid" );
        formBoquillas_x3.classList.add( "is-invalid" );
        formBoquillas_x3_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formBoquillas_x3.classList.remove( "is-invalid" );
        formBoquillas_x3.classList.add( "is-valid" );
        formBoquillas_x3_error.innerHTML = "";
    }
} );
formObservaciones.addEventListener( "change", () =>
{
    if ( formObservaciones.value === "" )
    {
        formObservaciones.classList.remove( "is-valid" );
        formObservaciones.classList.add( "is-invalid" );
        formObservaciones_error.innerHTML = "Este campo es requerido";
    } else if ( formObservaciones.value.length > 255 )
    {
        formObservaciones.classList.remove( "is-valid" );
        formObservaciones.classList.add( "is-invalid" );
        formObservaciones_error.innerHTML =
            "Este campo no puede tener más de 255 caracteres";
    } else
    {
        formObservaciones.classList.remove( "is-invalid" );
        formObservaciones.classList.add( "is-valid" );
        formObservaciones_error.innerHTML = "";
    }
} );

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

const formInspecciones = document.querySelector( "#form-inspecciones" );
function saveInspeccion( id )
{
    const body = new FormData( formInspecciones );
    const url = route[ 8 ];

    console.log(url)
    axios
        .post( url, body )
        .then( ( res ) =>
        {

            console.log(res.data)
            if ( !res.data.errors && res.data.response == true )
            {
                cleanFormErrors();        
                ( async () =>
                {
                    await subiendo();
                    message( '!Bien! redireccionado...' )
                    location.href = route[ 3 ].replace( ":id", id );


                } )()
            } 
            // HUBO ALGUN ERROR DE VALIDACION
            else
            {
                const {
                    marca: marca_err,
                    capacidad:capacidad_err,
                    neutro: neutro_err,
                    tension: tension_err,
                    impedancia: impedancia_err,
                    a: a_err,
                    c: c_err,
                    lts_aceite: lts_aceite_err,
                    conex_primario: conex_primario_err,
                    conex_secundario: conex_secundario_err,
                    fecha_fabricacion: fecha_fabricacion_err,
                    aceite: aceite_err,
                    peso_total: peso_total_err,
                    limpieza: limpieza_err,
                    indicador_nivel: indicador_nivel_err,
                    indicador_temperatura: indicador_temperatura_err,
                    indicador_temperatura_max : indicador_temperatura_max_err,
                    valvula_alivio: valvula_alivio_err,
                    valvula_llenado: valvula_llenado_err,
                    valvula_drenado: valvula_drenado_err,
                    valvula_muestreo: valvula_muestreo_err,
                    cambiador_derivaciones : cambiador_derivaciones_err,
                    pintura_estado : pintura_estado_err,
                    tierra_neutro : tierra_neutro_err,
                    tierra_tanque : tierra_tanque_err,
                    tierra_codos : tierra_codos_err,
                    tierra_insertos : tierra_insertos_err,
                    boquillas_h1 : boquillas_h1_err,
                    boquillas_h2 : boquillas_h2_err,
                    boquillas_h3 : boquillas_h3_err,
                    boquillas_x0 : boquillas_x0_err,
                    boquillas_x1 : boquillas_x1_err,
                    boquillas_x2 : boquillas_x2_err,
                    boquillas_x3 : boquillas_x3_err,
                    observaciones: observaciones_err,
                    img1: img1_err,
                    img2: img2_err,
                    img3: img3_err,
                    img4: img4_err,
                    img5: img5_err,
                    img6: img6_err,
                } = res.data.errors;

                let x = 0;

                console.log('a',  a_err)
                if ( marca_err !== undefined )
                {
                    marca.classList.remove( "is-valid" );
                    marca.classList.add( "is-invalid" );
                    marca_error.innerHTML =
                        marca_err;
                } else
                {
                    marca.classList.remove( "is-invalid" );
                    marca.classList.add( "is-valid" );
                    marca_error.innerHTML = "";
                }


                if ( capacidad_err !== undefined )
                {
                    capacidad.classList.remove( "is-valid" );
                    capacidad.classList.add( "is-invalid" );
                    capacidad_error.innerHTML =
                        capacidad_err;
                } else
                {
                    capacidad.classList.remove( "is-invalid" );
                    capacidad.classList.add( "is-valid" );
                    capacidad_error.innerHTML = "";
                }

                if ( neutro_err !== undefined )
                {
                    neutro.classList.remove( "is-valid" );
                    neutro.classList.add( "is-invalid" );
                    neutro_error.innerHTML = neutro_err;
                } else
                {
                    neutro.classList.remove( "is-invalid" );
                    neutro.classList.add( "is-valid" );
                    neutro_error.innerHTML = "";
                }
                if ( tension_err !== undefined )
                {
                    tension.classList.remove( "is-valid" );
                    tension.classList.add( "is-invalid" );
                    tension_error.innerHTML =
                        tension_err;
                } else
                {
                    tension.classList.remove( "is-invalid" );
                    tension.classList.add( "is-valid" );
                    tension_error.innerHTML = "";
                }

                if ( impedancia_err !== undefined )
                {
                    impedancia.classList.remove( "is-valid" );
                    impedancia.classList.add( "is-invalid" );
                    impedancia_error.innerHTML =
                        impedancia_err;
                } else
                {
                    impedancia.classList.remove( "is-invalid" );
                    impedancia.classList.add( "is-valid" );
                    impedancia_error.innerHTML = "";
                }

                if ( a_err !== undefined )
                {
                    a.classList.remove( "is-valid" );
                    a.classList.add( "is-invalid" );
                    a_error.innerHTML = a_err;
                } else
                {
                    a.classList.remove( "is-invalid" );
                    a.classList.add( "is-valid" );
                    a_error.innerHTML = "";
                }

                if ( c_err!== undefined  )
                {
                    c.classList.remove( "is-valid" );
                    c.classList.add( "is-invalid" );
                    c_error.innerHTML = c_err;
                } else
                {
                    c.classList.remove( "is-invalid" );
                    c.classList.add( "is-valid" );
                    c_error.innerHTML = "";
                }

                if ( lts_aceite_err !== undefined )
                {
                    lts_aceite.classList.remove( "is-valid" );
                    lts_aceite.classList.add( "is-invalid" );
                    lts_aceite_error.innerHTML = lts_aceite_err;
                } else
                {
                    lts_aceite.classList.remove( "is-invalid" );
                    lts_aceite.classList.add( "is-valid" );
                    lts_aceite_error.innerHTML = "";
                }

                if ( fecha_fabricacion_err!== undefined  )
                {
                    fecha_fabricacion.classList.remove( "is-valid" );
                    fecha_fabricacion.classList.add( "is-invalid" );
                    fecha_fabricacion_error.innerHTML =
                        fecha_fabricacion_err;
                } else
                {
                    fecha_fabricacion.classList.remove( "is-invalid" );
                    fecha_fabricacion.classList.add( "is-valid" );
                    fecha_fabricacion_error.innerHTML = "";
                }

                if ( aceite_err !== undefined )
                {
                    aceite.classList.remove( "is-valid" );
                    aceite.classList.add( "is-invalid" );
                    aceite_error.innerHTML =
                        aceite_err;
                } else
                {
                    aceite.classList.remove( "is-invalid" );
                    aceite.classList.add( "is-valid" );
                    aceite_error.innerHTML = "";
                }
               
                if ( peso_total_err !== undefined )
                {
                    peso_total.classList.remove( "is-valid" );
                    peso_total.classList.add( "is-invalid" );
                    peso_total_error.innerHTML =
                        peso_total_err;
                } else
                {
                    peso_total.classList.remove( "is-invalid" );
                    peso_total.classList.add( "is-valid" );
                    peso_total_error.innerHTML = "";
                }
               
                if ( limpieza_err !== undefined )
                {
                    limpieza.classList.remove( "is-valid" );
                    limpieza.classList.add( "is-invalid" );
                    limpieza_error.innerHTML =
                        limpieza_err;
                } else
                {
                    limpieza.classList.remove( "is-invalid" );
                    limpieza.classList.add( "is-valid" );
                    limpieza_error.innerHTML = "";
                }
               
                if ( indicador_nivel_err !== undefined )
                {
                    indicador_nivel.classList.remove( "is-valid" );
                    indicador_nivel.classList.add( "is-invalid" );
                    indicador_nivel_error.innerHTML =
                        indicador_nivel_err;
                } else
                {
                    indicador_nivel.classList.remove( "is-invalid" );
                    indicador_nivel.classList.add( "is-valid" );
                    indicador_nivel_error.innerHTML = "";
                }
               
                     
                if ( indicador_temperatura_err !== undefined )
                {
                    indicador_temperatura.classList.remove( "is-valid" );
                    indicador_temperatura.classList.add( "is-invalid" );
                    indicador_temperatura_error.innerHTML =
                        indicador_temperatura_err;
                } else
                {
                    indicador_temperatura.classList.remove( "is-invalid" );
                    indicador_temperatura.classList.add( "is-valid" );
                    indicador_temperatura_error.innerHTML = "";
                }

                if ( indicador_temperatura_max_err !== undefined )
                {
                    indicador_temperatura_max.classList.remove( "is-valid" );
                    indicador_temperatura_max.classList.add( "is-invalid" );
                    indicador_temperatura_max_error.innerHTML =
                    indicador_temperatura_max_err;
                } else
                {
                    indicador_temperatura_max.classList.remove( "is-invalid" );
                    indicador_temperatura_max.classList.add( "is-valid" );
                    indicador_temperatura_max_error.innerHTML = "";
                }
               
                if ( valvula_alivio_err!== undefined  )
                {
                    valvula_alivio.classList.remove( "is-valid" );
                    valvula_alivio.classList.add( "is-invalid" );
                    valvula_alivio_error.innerHTML =
                    valvula_alivio_err;
                } else
                {
                    valvula_alivio.classList.remove( "is-invalid" );
                    valvula_alivio.classList.add( "is-valid" );
                    valvula_alivio_error.innerHTML = "";
                }
                   
                if ( valvula_llenado_err !== undefined )
                {
                    valvula_llenado.classList.remove( "is-valid" );
                    valvula_llenado.classList.add( "is-invalid" );
                    valvula_llenado_error.innerHTML =
                    valvula_llenado_err;
                } else
                {
                    valvula_llenado.classList.remove( "is-invalid" );
                    valvula_llenado.classList.add( "is-valid" );
                    valvula_llenado_error.innerHTML = "";
                }

                if ( valvula_drenado_err !== undefined )
                {
                    valvula_drenado.classList.remove( "is-valid" );
                    valvula_drenado.classList.add( "is-invalid" );
                    valvula_drenado_error.innerHTML =
                    valvula_drenado_err;
                } else
                {
                    valvula_drenado.classList.remove( "is-invalid" );
                    valvula_drenado.classList.add( "is-valid" );
                    valvula_drenado_error.innerHTML = "";
                }

                if ( valvula_muestreo_err !== undefined )
                {
                    valvula_muestreo.classList.remove( "is-valid" );
                    valvula_muestreo.classList.add( "is-invalid" );
                    valvula_muestreo_error.innerHTML =
                    valvula_muestreo_err;
                } else
                {
                    valvula_muestreo.classList.remove( "is-invalid" );
                    valvula_muestreo.classList.add( "is-valid" );
                    valvula_muestreo_error.innerHTML = "";
                }

                if ( cambiador_derivaciones_err!== undefined  )
                {
                    cambiador_derivaciones.classList.remove( "is-valid" );
                    cambiador_derivaciones.classList.add( "is-invalid" );
                    cambiador_derivaciones_error.innerHTML =
                    cambiador_derivaciones_err;
                } else
                {
                    cambiador_derivaciones.classList.remove( "is-invalid" );
                    cambiador_derivaciones.classList.add( "is-valid" );
                    cambiador_derivaciones_error.innerHTML = "";
                }

                if ( pintura_estado_err !== undefined )
                {
                    pintura_estado.classList.remove( "is-valid" );
                    pintura_estado.classList.add( "is-invalid" );
                    pintura_estado_error.innerHTML =
                    pintura_estado_err;
                } else
                {
                    pintura_estado.classList.remove( "is-invalid" );
                    pintura_estado.classList.add( "is-valid" );
                    pintura_estado_error.innerHTML = "";
                }

                if ( tierra_neutro_err !== undefined )
                {
                    tierra_neutro.classList.remove( "is-valid" );
                    tierra_neutro.classList.add( "is-invalid" );
                    tierra_neutro_error.innerHTML =
                    tierra_neutro_err;
                } else
                {
                    tierra_neutro.classList.remove( "is-invalid" );
                    tierra_neutro.classList.add( "is-valid" );
                    tierra_neutro_error.innerHTML = "";
                }

                if ( tierra_tanque_err !== undefined )
                {
                    tierra_tanque.classList.remove( "is-valid" );
                    tierra_tanque.classList.add( "is-invalid" );
                    tierra_tanque_error.innerHTML =
                    tierra_tanque_err;
                } else
                {
                    tierra_tanque.classList.remove( "is-invalid" );
                    tierra_tanque.classList.add( "is-valid" );
                    tierra_tanque_error.innerHTML = "";
                }

                if ( tierra_codos_err !== undefined )
                {
                    tierra_codos.classList.remove( "is-valid" );
                    tierra_codos.classList.add( "is-invalid" );
                    tierra_codos_error.innerHTML =
                    tierra_codos_err;
                } else
                {
                    tierra_codos.classList.remove( "is-invalid" );
                    tierra_codos.classList.add( "is-valid" );
                    tierra_codos_error.innerHTML = "";
                }

                if ( tierra_insertos_err !== undefined )
                {
                    tierra_insertos.classList.remove( "is-valid" );
                    tierra_insertos.classList.add( "is-invalid" );
                    tierra_insertos_error.innerHTML =
                    tierra_insertos_err;
                } else
                {
                    tierra_insertos.classList.remove( "is-invalid" );
                    tierra_insertos.classList.add( "is-valid" );
                    tierra_insertos_error.innerHTML = "";
                }

                if ( boquillas_h1_err!== undefined  )
                {
                    boquillas_h1.classList.remove( "is-valid" );
                    boquillas_h1.classList.add( "is-invalid" );
                    boquillas_h1_error.innerHTML =
                    boquillas_h1_err;
                } else
                {
                    boquillas_h1.classList.remove( "is-invalid" );
                    boquillas_h1.classList.add( "is-valid" );
                    boquillas_h1_error.innerHTML = "";
                }

                if ( boquillas_h2_err!== undefined  )
                {
                    boquillas_h2.classList.remove( "is-valid" );
                    boquillas_h2.classList.add( "is-invalid" );
                    boquillas_h2_error.innerHTML =
                    boquillas_h2_err;
                } else
                {
                    boquillas_h2.classList.remove( "is-invalid" );
                    boquillas_h2.classList.add( "is-valid" );
                    boquillas_h2_error.innerHTML = "";
                }

                if ( boquillas_h3_err !== undefined )
                {
                    boquillas_h3.classList.remove( "is-valid" );
                    boquillas_h3.classList.add( "is-invalid" );
                    boquillas_h3_error.innerHTML =
                    boquillas_h3_err;
                } else
                {
                    boquillas_h3.classList.remove( "is-invalid" );
                    boquillas_h3.classList.add( "is-valid" );
                    boquillas_h3_error.innerHTML = "";
                }
               
                if ( boquillas_x0_err!== undefined  )
                {
                    boquillas_x0.classList.remove( "is-valid" );
                    boquillas_x0.classList.add( "is-invalid" );
                    boquillas_x0_error.innerHTML =
                    boquillas_x0_err;
                } else
                {
                    boquillas_x0.classList.remove( "is-invalid" );
                    boquillas_x0.classList.add( "is-valid" );
                    boquillas_x0_error.innerHTML = "";
                }
               
                if ( boquillas_x1_err !== undefined )
                {
                    boquillas_x1.classList.remove( "is-valid" );
                    boquillas_x1.classList.add( "is-invalid" );
                    boquillas_x1_error.innerHTML =
                    boquillas_x1_err;
                } else
                {
                    boquillas_x1.classList.remove( "is-invalid" );
                    boquillas_x1.classList.add( "is-valid" );
                    boquillas_x1_error.innerHTML = "";
                }
               
                if ( boquillas_x2_err )
                {
                    boquillas_x2.classList.remove( "is-valid" );
                    boquillas_x2.classList.add( "is-invalid" );
                    boquillas_x2_error.innerHTML =
                    boquillas_x2_err;
                } else
                {
                    boquillas_x2.classList.remove( "is-invalid" );
                    boquillas_x2.classList.add( "is-valid" );
                    boquillas_x2_error.innerHTML = "";
                }
               
                if ( boquillas_x3_err !== undefined )
                {
                    boquillas_x3.classList.remove( "is-valid" );
                    boquillas_x3.classList.add( "is-invalid" );
                    boquillas_x3_error.innerHTML =
                    boquillas_x3_err;
                } else
                {
                    boquillas_x3.classList.remove( "is-invalid" );
                    boquillas_x3.classList.add( "is-valid" );
                    boquillas_x3_error.innerHTML = "";
                }
                  
                if ( observaciones_err !== undefined  )
                {
                    observaciones.classList.remove( "is-valid" );
                    observaciones.classList.add( "is-invalid" );
                    observaciones_error.innerHTML =
                    observaciones_err;
                } else
                {
                    observaciones.classList.remove( "is-invalid" );
                    observaciones.classList.add( "is-valid" );
                    observaciones_error.innerHTML = "";
                }
                      
                if ( img1_err !== undefined )
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

                if ( img2_err !== undefined )
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

                if ( img3_err !== undefined )
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

                if ( img4_err !== undefined )
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

                if ( img5_err!== undefined  )
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

                if ( img6_err!== undefined  )
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

                if ( conex_primario_err && x === 0 )
                {
                    x = 1;
                    alert( "Por favor, indica la conexión primaria" );
                }
                if ( conex_secundario_err && x === 0 )
                {
                    x = 1;
                    alert( "Por favor, indica la conexión secundaria" );
                }
            
            
            }
        } )
        .catch( ( err ) => console.error( err ) );
}

//MENSAJE SUBIENDO INSPECCION
async function subiendo()
{
    return new Promise( resolve =>
    {
        message( 'Cargando...' )
        setTimeout( () =>
        {
            resolve( true )
        }, 2000 )
    } )

}


function cleanFormErrors(){
    console.log('hola ', marca )

    marca.classList.remove( "is-invalid" );
    marca.classList.add( "is-valid" );
    marca_error.innerHTML = "";

    capacidad.classList.remove( "is-invalid" );
    capacidad.classList.add( "is-valid" );
    capacidad_error.innerHTML = "";

    neutro.classList.remove( "is-invalid" );
    neutro.classList.add( "is-valid" );
    neutro_error.innerHTML = "";

    tension.classList.remove( "is-invalid" );
    tension.classList.add( "is-valid" );
    tension_error.innerHTML = "";

    impedancia.classList.remove( "is-invalid" );
    impedancia.classList.add( "is-valid" );
    impedancia_error.innerHTML = "";

    a.classList.remove( "is-invalid" );
    a.classList.add( "is-valid" );
    a_error.innerHTML = "";

    c.classList.remove( "is-invalid" );
    c.classList.add( "is-valid" );
    c_error.innerHTML = "";

    lts_aceite.classList.remove( "is-invalid" );
    lts_aceite.classList.add( "is-valid" );
    lts_aceite_error.innerHTML = "";

    fecha_fabricacion.classList.remove( "is-invalid" );
    fecha_fabricacion.classList.add( "is-valid" );
    fecha_fabricacion_error.innerHTML = "";

    aceite.classList.remove( "is-invalid" );
    aceite.classList.add( "is-valid" );
    aceite_error.innerHTML = "";

    peso_total.classList.remove( "is-invalid" );
    peso_total.classList.add( "is-valid" );
    peso_total_error.innerHTML = "";

    limpieza.classList.remove( "is-invalid" );
    limpieza.classList.add( "is-valid" );
    limpieza_error.innerHTML = "";

    indicador_nivel.classList.remove( "is-invalid" );
    indicador_nivel.classList.add( "is-valid" );
    indicador_nivel_error.innerHTML = "";

    indicador_temperatura.classList.remove( "is-invalid" );
    indicador_temperatura.classList.add( "is-valid" );
    indicador_temperatura_error.innerHTML = "";

    indicador_temperatura_max.classList.remove( "is-invalid" );
    indicador_temperatura_max.classList.add( "is-valid" );
    indicador_temperatura_max_error.innerHTML = "";

    valvula_alivio.classList.remove( "is-invalid" );
    valvula_alivio.classList.add( "is-valid" );
    valvula_alivio_error.innerHTML = "";

    valvula_drenado.classList.remove( "is-invalid" );
    valvula_drenado.classList.add( "is-valid" );
    valvula_drenado_error.innerHTML = "";

    valvula_muestreo.classList.remove( "is-invalid" );
    valvula_muestreo.classList.add( "is-valid" );
    valvula_muestreo_error.innerHTML = "";

    valvula_llenado.classList.remove( "is-invalid" );
    valvula_llenado.classList.add( "is-valid" );
    valvula_llenado_error.innerHTML = "";

    cambiador_derivaciones.classList.remove( "is-invalid" );
    cambiador_derivaciones.classList.add( "is-valid" );
    cambiador_derivaciones_error.innerHTML = "";

    pintura_estado.classList.remove( "is-invalid" );
    pintura_estado.classList.add( "is-valid" );
    pintura_estado_error.innerHTML = "";

    tierra_neutro.classList.remove( "is-invalid" );
    tierra_neutro.classList.add( "is-valid" );
    tierra_neutro_error.innerHTML = "";

    tierra_tanque.classList.remove( "is-invalid" );
    tierra_tanque.classList.add( "is-valid" );
    tierra_tanque_error.innerHTML = "";

    tierra_codos.classList.remove( "is-invalid" );
    tierra_codos.classList.add( "is-valid" );
    tierra_codos_error.innerHTML = "";

    tierra_insertos.classList.remove( "is-invalid" );
    tierra_insertos.classList.add( "is-valid" );
    tierra_insertos_error.innerHTML = "";

    boquillas_h1.classList.remove( "is-invalid" );
    boquillas_h1.classList.add( "is-valid" );
    boquillas_h1_error.innerHTML = "";

    boquillas_h2.classList.remove( "is-invalid" );
    boquillas_h2.classList.add( "is-valid" );
    boquillas_h2_error.innerHTML = "";

    boquillas_h3.classList.remove( "is-invalid" );
    boquillas_h3.classList.add( "is-valid" );
    boquillas_h3_error.innerHTML = "";

    boquillas_x0.classList.remove( "is-invalid" );
    boquillas_x0.classList.add( "is-valid" );
    boquillas_x0_error.innerHTML = "";

    boquillas_x1.classList.remove( "is-invalid" );
    boquillas_x1.classList.add( "is-valid" );
    boquillas_x1_error.innerHTML = "";

    boquillas_x2.classList.remove( "is-invalid" );
    boquillas_x2.classList.add( "is-valid" );
    boquillas_x2_error.innerHTML = "";

    boquillas_x3.classList.remove( "is-invalid" );
    boquillas_x3.classList.add( "is-valid" );
    boquillas_x3_error.innerHTML = "";

    observaciones.classList.remove( "is-invalid" );
    observaciones.classList.add( "is-valid" );
    observaciones_error.innerHTML = "";

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
