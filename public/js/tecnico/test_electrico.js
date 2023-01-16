const reg = new RegExp( '^[0-9]+$' );



$(function() {
$('#tipo_inspeccion_id').val(2)
});



//Validaciones por cada letra escrita donde se valida que el campo no se encuentre vacio y que no supere los 255 caracteres
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
//Validaciones por cada letra escrita donde se valida que el campo no se encuentre vacio y que sean SOLO cantidades
$( 'input[requerido_generico=2]' ).on( 'input', ( e ) =>
{
    const val = e.target.value
    if ( val.length === 0 )
    {
        $( e.target ).addClass( 'is-invalid' ).next().html( 'Este campo es requerido' )
    }
    else if ( reg.test( val ) === false )
    {
        $( e.target ).addClass( 'is-invalid' ).next().html( 'Sólo cantidades' )
    }
    else
    {
        $( e.target ).removeClass( 'is-invalid' ).addClass( 'is-valid' ).next().html( '' )
    }
} )

function esconderCantidad( e )
{
    const l = $( 'label[for="disponible_cantidad"]' )[ 0 ]
    const i = $( 'input[name="disponible_cantidad"]' )[ 0 ]
    $( l ).addClass( 'opacity-70' )
    $( i ).addClass( 'opacity-70' )
    $( i ).attr( 'disabled', true )
    $( i ).val( '' )
    $( i ).removeClass( 'is-invalid' ).removeClass( 'is-valid' )
    $( i ).next().html( '' )
}
function mostrarCantidad( e )
{

    const l = $( 'label[for="disponible_cantidad"]' )[ 0 ]
    const i = $( 'input[name="disponible_cantidad"]' )[ 0 ]
    $( l ).removeClass( 'opacity-70' )
    $( i ).removeClass( 'opacity-70' )
    $( i ).attr( 'disabled', false )

}
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
            console.trace( 'ERORRES ->', errors );
            if ( !errors && data.response == true )
            {
                checkAllFields()
                const url = route[ 2 ];
                let promises = [];
                for ( i = 0; i < anomaliasArrPost.length; i++ )
                {
                    anomaliasArrPost[ i ] != undefined && promises.push( axios.post( url, anomaliasArrPost[ i ] ) )
                }
                ( async () =>
                {
                    await subiendo();
                    const anyIsFilled = promises.some( ( p ) => p !== null )
                    console.log( 'Vacio? => ', anomaliasArrPost, anyIsFilled )
                    if ( anyIsFilled )
                    {
                        Promise.all( promises ).then( ( res ) =>
                        {
                            message( '!Bien! redireccionado...' )
                            location.href = route[ 3 ].replace( ":id", id );
                        } ).catch( ( err ) => { console.error( err ) } )
                    }
                    else
                    {
                        message( '!Bien! redireccionado...' )
                        location.href = route[ 3 ].replace( ":id", id );
                    }
                } )()
            }

            // EL REPORTE YA EXISTE
            else if ( data.response === false && data.errors === undefined )
            {
                message( 'Este reporte ya ha sido guardado...' )
                
                setTimeout( () =>
                {
                    location.href = route[ 3 ].replace( ":id", id );
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
                        if ( input.disabled == false )
                        {
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
                            console.log( input )
                            $( input ).addClass( 'is-valid' )
                            $( input ).removeClass( 'is-invalid' )
                        }
                    }
                    // si no tiene clase invalida signidica que no tiene errores, por lo tanto se le agrega la clase is-valid
                    else
                    {
                        if ( input.disabled == false )
                        {
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

    let anomaliaData = new FormData( $( '#form-anomalias' )[ 0 ] );
    anomaliaData.append( 'cosa', anomalia )
    const i = anomaliasArr.indexOf(anomalia)
    if( i > -1){
        anomaliasArrPost.push(anomaliaData)

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

//DESHABILITAR INPUTS DONDE SE SUBE LA ANOMALIA
function disabledAnomalias()
{
    let anomaliaTipo = $( '#form-anomalias' ).attr( 'data-anomalia' )
    // remove the last character
    anomaliaTipo = anomaliaTipo.substring( 0, anomaliaTipo.length - 4 );


    console.log('ANOMALIA TIPO AQUIIIII', anomaliaTipo)
    //EXCEPCIONES CON LOS CAMPOS DE LA BD YA QUE NO TIENEN TERMINACION 'EDO'
    if ( anomaliaTipo === 'int' )
    {
        anomaliaTipo = 'int_edo'
    }
    if ( anomaliaTipo === 'acc_subterraneo' )
    {
        anomaliaTipo = 'acc_subterraneo_edo'
    }
    if(anomaliaTipo === 'bt_cableado_cable_aco'){
        console.log('AQUI ENTRA JAJAJJAS')
        anomaliaTipo ='bt_cableado_cable_acomodo'
    }
    if(anomaliaTipo === 'bt_cableado_conexi'){
        anomaliaTipo = 'bt_cableado_conexiones'
    }


    const inputsToDisabled = $( `input[tipo="${anomaliaTipo}"], label[tipo="${anomaliaTipo}"]` )
    inputsToDisabled.each( function ( i, e )
    {
        $( e ).attr( 'disabled', true ).addClass( 'opacity-50' )
    } )
}

function tipoCanalizacion()
{
    $( '#tipo_canalizacion_otro_input' ).attr( 'disabled', true )
    $( '#tipo_canalizacion_otro_input' ).removeClass( 'is-invalid' ).removeClass( 'is-valid' ).val( '' ).next().html( '' )
}

function activarEstadoDeNoCodosOCC(e){
    if(e.value > 0 ){

        if($('#codos_occ_edo_no').prop('checked')===false){   
        $('input[name="codos_occ_edo"]').each((i,e) => {
            console.log(e)
            $(e).prop('disabled', false).prop('checked', false).next().removeClass('opacity-50')
        })
    }
    }
        else{
            if($('#codos_occ_edo_no').prop('checked') === false){   
            console.log('oa')
            $('input[name="codos_occ_edo"]').each((i,e) => {
                console.log(e)
                $(e).prop('disabled', true).prop('checked', false).next().addClass('opacity-50')
            }) }
    }
}

function activarEstadoDeNoInsertosOCC(e){
    if(e.value > 0 ){

        if($('#insertos_occ_edo_no').prop('checked')===false){   
        $('input[name="insertos_occ_edo"]').each((i,e) => {
            console.log(e)
            $(e).prop('disabled', false).prop('checked', false).next().removeClass('opacity-50')
        })
    }
    }
        else{
            if($('#insertos_occ_edo_no').prop('checked') === false){   
            console.log('oa')
            $('input[name="insertos_occ_edo"]').each((i,e) => {
                console.log(e)
                $(e).prop('disabled', true).prop('checked', false).next().addClass('opacity-50')
            }) }
    }
}

function activarEstadoDeAdptTiera(e){
    if(e.value > 0 ){

        if($('#adpt_tierra_edo_no').prop('checked')===false){   
        $('input[name="adpt_tierra_edo"]').each((i,e) => {
            console.log(e)
            $(e).prop('disabled', false).prop('checked', false).next().removeClass('opacity-50')
        })
    }
    }
        else{
            if($('#adpt_tierra_edo_no').prop('checked') === false){   
            console.log('oa')
            $('input[name="adpt_tierra_edo"]').each((i,e) => {
                console.log(e)
                $(e).prop('disabled', true).prop('checked', false).next().addClass('opacity-50')
            }) }
    }
}

function activarEstadoDeBarraTiera(e){
    if(e.value > 0 ){

        if($('#barras_tierra_edo_no').prop('checked')===false){   
        $('input[name="barras_tierra_edo"]').each((i,e) => {
            console.log(e)
            $(e).prop('disabled', false).prop('checked', false).next().removeClass('opacity-50')
        })
    }
    }
        else{
            if($('#barras_tierra_edo_no').prop('checked') === false){   
            console.log('oa')
            $('input[name="barras_tierra_edo"]').each((i,e) => {
                console.log(e)
                $(e).prop('disabled', true).prop('checked', false).next().addClass('opacity-50')
            }) }
    }
}


$('#btn-cerrar-popup').on('click', function(e) {
    e.preventDefault();
    overlay.classList.remove("active");
    popup.classList.remove("active");
    cleanAnomalia();
    uncheckedAnomalia()
})
