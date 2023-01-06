var ten_media_soporteria_edo, sis_tierra_edo, conex_tierra_edo, sellado_ducteria_edo, tipo_canalizacion, bt_soporteria_edo, int_senalizacion_edo,int_edo, circuitos_edo;
$( '#ten_media_soporteria_si' ).on( 'click', () =>
{
    $( '#ten_media_soporteria_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#ten_media_soporteria_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#ten_media_soporteria_no' ).on( 'click', () =>
{
    $( '#ten_media_soporteria_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#ten_media_soporteria_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$( '#sis_tierra_si' ).on( 'click', () =>
{
    $( '#sis_tierra_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#sis_tierra_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#sis_tierra_no' ).on( 'click', () =>
{
    $( '#sis_tierra_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#sis_tierra_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$( '#conex_tierra_si' ).on( 'click', () =>
{
    $( '#conex_tierra_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#conex_tierra_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#conex_tierra_no' ).on( 'click', () =>
{
    $( '#conex_tierra_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#conex_tierra_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$( '#sellado_ducteria_si' ).on( 'click', () =>
{
    $( '#sellado_ducteria_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#sellado_ducteria_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#sellado_ducteria_no' ).on( 'click', () =>
{
    $( '#sellado_ducteria_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#sellado_ducteria_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$('#tipo_canalizacion_otro').on('click', () => {
    $('#tipo_canalizacion_otro_input').attr('disabled', false)
} )

$( '#sellado_ducteria_si' ).on( 'click', () =>
{
    $( '#sellado_ducteria_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#sellado_ducteria_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#bt_soporteria_no' ).on( 'click', () =>
{
    $( '#bt_soporteria_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#bt_soporteria_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$( '#bt_soporteria_si' ).on( 'click', () =>
{
    $( '#bt_soporteria_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#bt_soporteria_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$('#int_senalizacion_si').on('click', () => {
    $('#int_senalizacion_edo_si').attr('disabled', false).next().removeClass('opacity-50')
    $('#int_senalizacion_edo_no').attr('disabled', false).next().removeClass('opacity-50')
})

$('#int_senalizacion_no').on('click', () => {
    $('#int_senalizacion_edo_si').attr('disabled', true).prop('checked', false).next().addClass('opacity-50').prop('checked', false)
    
    $('#int_senalizacion_edo_no').attr('disabled', true).prop('checked', false).next().addClass('opacity-50')
})


$('#circuitos_si').on('click', () => {
    $('#circuitos_edo_si').attr('disabled', false).next().removeClass('opacity-50')
    $('#circuitos_edo_no').attr('disabled', false).next().removeClass('opacity-50')
})

$('#circuitos_no').on('click', () => {
    $('#circuitos_edo_si').attr('disabled', true).prop('checked', false).next().addClass('opacity-50').prop('checked', false)

    $('#circuitos_edo_no').attr('disabled', true).prop('checked', false).next().addClass('opacity-50')
})

function disableOtro(){
    $('#tipo_canalizacion_otro_input').attr('disabled', true)
    $('#tipo_canalizacion_otro_input').removeClass('is-invalid').removeClass('is-valid').val('').next().html('')
}

$( 'input[requerido_generico=1], textarea' ).on( 'input', ( e ) =>
{
    const val = e.target.value
    if ( val.length === 0 )
    {
        $( e.target ).addClass( 'is-invalid' ).next().html( 'Este campo es requerido' )
    }
    else if ( val.length > 255 )
    {
        $( e.target ).addClass( 'is-invalid' ).next().html( 'Este campo no puede tener más de 255 caracteres' )
    }
    else
    {
        $( e.target ).removeClass( 'is-invalid' ).addClass( 'is-valid' ).next().html( '' )
    }
} )

function saveInspeccion( id )
{

    const body = new FormData( $( '#form-inspecciones' )[ 0 ] );
    console.trace( 'BODY ----> ', body )
    const url = route[ 0 ];

    $( 'input[existe=1]' ).each( function ( i, e )
    {
        e = $( e )[ 0 ]
        if ( e.disabled == true && e.checked == true )
        {
            body.append( e.name, e.value )
        }
    } )
    console.trace( body )
    axios
        .post( url, body )
        .then( res =>
        {

            const data = res.data
            const errors = data.errors
            console.trace('ERORRES ->', errors );
            if ( !errors && data.response == true )
            {
                checkAllFields()
                console.log( '--BIEN--' )
                const anomaliasArr = [
                    ten_media_soporteria_edo,
                    sis_tierra_edo,
                    conex_tierra_edo,
                    sellado_ducteria_edo,
                    tipo_canalizacion,
                    bt_soporteria_edo,
                    int_senalizacion_edo,
                    int_edo,
                    circuitos_edo
                ];
                const url = route[ 2 ];
                let promises = [];
                for ( i = 0; i < anomaliasArr.length; i++ )
                {
                    anomaliasArr[ i ] != undefined && promises.push( axios.post( url, anomaliasArr[ i ] ) )
                }
                ( async () =>
                {
                    await subiendo();
                    const anyIsFilled = promises.some( ( p ) => p !== null )
                    console.log( 'Vacio? => ', anomaliasArr, anyIsFilled )
                    if ( anyIsFilled )
                    {
                        Promise.all( promises ).then( ( res ) =>
                        {
                            message( '!Bien! redireccionado...' )
                            // location.href = route[ 3 ].replace( ":id", id );
                        } ).catch( ( err ) => { console.error( err ) } )
                    }
                    else
                    {
                        message( '!Bien! redireccionado...' )
                        // location.href = route[ 3 ].replace( ":id", id );
                    }
                } )()
            }

            // EL REPORTE YA EXISTE
            else if ( data.response === false && data.errors === undefined )
            {
                message( 'Este reporte ya ha sido guardado...' )
                setTimeout( () =>
                {
                    // location.href = route[ 3 ].replace( ":id", id );
                }, 3000 )
            }

            // HUBO ALGUN ERROR DE VALIDACION
            else
            {
                //Objeto de errores, cada key es un arreglo que puede tener mas de un error, por lo tanto iteramos sobre el objeto y la vez sobre el arreglo 
                let x = 0
                Object.entries( errors ).forEach( ( [ key, value ] ) =>
                {
                    //por cada input que tenga el atributo name igual al key del arreglo le agregamos la clase is-invalid y le ponemos el texto del error, esto ultimo a menos que sea un radio button
                    $( `input[name=${key}]` ).each( ( i, input ) =>
                    {
                        if(input.disabled == false){
                            $( input ).addClass( 'is-invalid' )
                        }
                        if ( $( input ).attr( 'type' ) !== 'radio' )
                        {
                            $( input ).next().html( value )
                        }
                        else
                        {
                            if ( x === 0 )
                                alert( value )
                            x = 1
                        }
                    } )
                    // lo mismo para los textarea
                    $( `textarea[name=${key}]` ).each( ( i, input ) =>
                    {
                        $( input ).addClass( 'is-invalid' ).next().html( value )
                    } )
                } )
                $( "input[existe='1'], textarea " ).each( function ( i, input )
                {
                    if ( $( input ).hasClass( 'is-invalid' ) )
                    {
                        // si el input tiene la clase is-invalid y no esta en el array de errores entonces le quitamos la clase is-invalid y le ponemos la clase is-valid
                        if ( !Object.keys( res.data.errors ).includes( $( input ).attr( 'name' ) ) )
                        {
                            $( input ).addClass( 'is-valid' )
                            $( input ).removeClass( 'is-invalid' )
                        }
                    }
                    // si no tiene clase invalida signidica que no tiene errores, por lo tanto se le agrega la clase is-valid
                    else
                    {
                        if(input.value.length > 0 && input.disabled == false){
                            $( input ).addClass( 'is-valid' )
                            $( input ).removeClass( 'is-invalid' )
                            
                        }
                    }
                } )


            }
        } )
        .catch( ( err ) => console.error( err ) );
}

function checkAllFields()
{
    $( "input[existe='1'], textarea " ).each( function ( i, e )
    {
        if ( $( e ).attr( 'type' ) !== 'radio' && e.disabled == false )
        {
            $( e ).removeClass( 'is-invalid' ).addClass( 'is-valid' ).next().html( '' )
        }
    } )
}
function handleAnomalia( anomaliaTipo )
{
   cleanAnomalia()

    overlay.classList.add( "active" );
    popup.classList.add( "active" );
    $( '#form-anomalias' ).attr( 'data-anomalia', anomaliaTipo )



    // formAnomalias.setAttribute( "data-anomalia", anomaliaTipo );
}

function cleanAnomalia()
{
    $( 'input[anomalia=1], textarea[anomalia=1], select[anomalia=1]' ).each( function ( i, e )
    {
        $( e ).val( '' )
        $( e ).removeClass( 'is-valid' )
        $( e ).removeClass( 'is-invalid' )
        $( e ).next().html( '' )
    } )

}

function saveAnomalia()
{
    const validado = validateAnomalia();
    if ( !validado ) return false;
    const anomalia = $( '#form-anomalias' ).attr( 'data-anomalia' )

    console.log(anomalia)
    let anomaliaData = new FormData( $( '#form-anomalias' )[ 0 ] );
    anomaliaData.append( 'cosa', anomalia )

    console.trace('ANOMALIA -----> ', anomalia )
    if ( anomalia === "ten_media_soporteria_edo" )
    {
        ten_media_soporteria_edo = anomaliaData;
    }


    if ( anomalia === "sis_tierra_edo" )
    {
        sis_tierra_edo = anomaliaData;
    }

    if ( anomalia === "conex_tierra_edo" )
    {
        conex_tierra_edo = anomaliaData;
    }

    if ( anomalia === "sellado_ducteria_edo" )
    {
        sellado_ducteria_edo = anomaliaData
    }
    if(anomalia === "int_senalizacion_edo"){
        int_senalizacion_edo = anomaliaData
    }
    if(anomalia === "bt_soporteria_edo"){
        bt_soporteria_edo = anomaliaData
    }
    if(anomalia === "int_edo"){
        int_edo = anomaliaData
    }
    if(anomalia === "circuitos_edo"){
        circuitos_edo = anomaliaData
    }
    const url = route[ 1 ]



    axios.post( url, anomaliaData ).then( res =>
    {
        if ( res.data.errors )
        {
            const { imagen: imagen_err } = res.data.errors
            if ( imagen_err )
            {
                $( '#form-foto-error' ).text( imagen_err )
            }
        }
        else
        {
            document.getElementById( 'btn-cerrar-popup' ).click()
            message( 'Anomalía guardada' )
            checkedAnomalia()
            disabledAnomalias()

        }
    } ).catch( err => console.error( err ) )
}

function validateAnomalia()
{
    let x = 0;

    if ( $( '#form-select-tipo' )[ 0 ].selectedIndex === 0 )
    {
        x = 1;
        $( "#form-select-tipo-error" ).text( 'Este campo es requerido' )
    }
    else
    {
        $( "#form-select-tipo-error" ).text( '' )
    }
    if ( $( "#form-description" ).val() === "" )
    {
        x = 1;
        $( "#form-description-error" ).text( 'Este campo es requerido' );
        $( "#form-description" ).removeClass( 'is-valid' )
        $( "#form-description" ).addClass( 'is-invalid' )
    } else
    {
        $( "#form-description-error" ).text( '' );
        $( "#form-description" ).addClass( 'is-valid' )
        $( "#form-description" ).removeClass( 'is-invalid' )
    }

    if ( $( "#form-foto" ).val() === "" )
    {
        x = 1;
        $( "#form-foto-error" ).text( 'Este campo es requerido' )
        $( "#form-foto" ).addClass( 'is-invalid' )
        $( "#form-foto" ).removeClass( 'is-valid' )
    } else
    {
        $( "#form-foto-error" ).text( '' )
        $( "#form-foto" ).addClass( 'is-valid' )
        $( "#form-foto" ).removeClass( 'is-invalid' )
    }

    if ( x === 1 ) return false;
    return true;
}

$( 'select' ).on( 'change', function ( e )
{
    const id = $( e.target ).attr( 'id' )
    $( `#${id}-error` ).text( '' )
} )

function uncheckedAnomalia()
{
    const inputs = $( `input[name="${$( '#form-anomalias' ).attr( 'data-anomalia' )}"]` )
    const input = inputs[ 1 ]
    input.checked = false
}

function checkedAnomalia()
{
    const inputs = $( `input[name="${$( '#form-anomalias' ).attr( 'data-anomalia' )}"]` )
    const input = inputs[ 1 ]
    input.checked = true
}

function disabledAnomalias()
{
    let anomaliaTipo = $( '#form-anomalias' ).attr( 'data-anomalia' )
    // remove the last character
    anomaliaTipo = anomaliaTipo.substring( 0, anomaliaTipo.length - 4 );

    console.log('ANOMALIAAA-> ', anomaliaTipo)

    //EXCEPCION CON EL CAMPO DE LA BD INT_EDO YA QUE NO EXISTE UN CAMPO "INT" 
    if(anomaliaTipo === 'int'){
        anomaliaTipo = 'int_edo'
    }
    const inputsToDisabled = $( `input[tipo="${anomaliaTipo}"], label[tipo="${anomaliaTipo}"]` )
    inputsToDisabled.each( function ( i, e )
    {
        console.log('ANOMALIAAA-> ', inputsToDisabled)

        
        $( e ).attr( 'disabled', true ).addClass( 'opacity-50' )


    } )



    // const input = inputs[ 1 ]

}
