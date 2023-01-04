// const   formInspecciones = document.querySelector( "#form-inspecciones" ),

$('#ten_media_soporteria_si').on('click',()=>{
    $('#ten_media_soporteria_edo_si').attr('disabled',false).next().removeClass('opacity-50') 
    $('#ten_media_soporteria_edo_no').attr('disabled',false).next().removeClass('opacity-50') 
})

$('#ten_media_soporteria_no').on('click',()=>{
    $('#ten_media_soporteria_edo_si').attr('disabled',true).prop('checked',false).next().addClass('opacity-50').prop('checked',false)

    $('#ten_media_soporteria_edo_no').attr('disabled',true).prop('checked',false).next().addClass('opacity-50')
})


function saveInspeccion( id )
{
    const body = new FormData( $('#form-inspecciones')[ 0 ] );
    // console.log(body)    
    const url = route[ 0 ];
    axios
        .post( url, body )
        .then( ( res ) =>
        {
            // console.log(res.data.errors)
            if ( !res.data.errors && res.data.response == true )
            {
            //     cleanFormErrors();
            //     const anomaliasArr = [
            //         lamparas,
            //         lamparas_emergencia,
            //         senalizacion,
            //         pintura,
            //         herreria,
            //     ];
            //     const url = route[ 2 ];
            //     let promises = [];
            //     for ( i = 0; i < anomaliasArr.length; i++ )
            //     {
            //         anomaliasArr[ i ] !== null && promises.push( axios.post( url, anomaliasArr[ i ] ) )
            //     }
            //     ( async () =>
            //     {
            //         await subiendo();
            //         Promise.all( promises ).then( ( res ) =>
            //         {
            //             message( '!Bien! redireccionado...' )
            //             location.href = route[ 3 ].replace( ":id", id );
            //         } ).catch( ( err ) => { console.error( err ) } )

            //     } )()
            } 
            // HUBO ALGUN ERROR DE VALIDACION
            else
            {

                Object.entries(res.data.errors).forEach(([key, value]) => {
                    console.log( $(`.${key}`))
                    $(`.${key}`).addClass('is-invalid').next().html(value)
                })

         

                // $("input[existe='1'], textarea ").each(function(i, input){
                //     if($(input).hasClass('is-invalid')){
                //                // si el input tiene la clase is-invalid y no esta en el array de errores entonces le quitamos la clase is-invalid y le ponemos la clase is-valid
                //             if(!Object.keys(res.data.errors).includes($(input).attr('id'))){
                //             $(input).addClass('is-valid')    
                //             $(input).removeClass('is-invalid') 
                //         }
                //     }
                //     // si no tiene clase invalida signidica que no tiene errores, por lo tanto se le agrega la clase is-valid
                //     else{
                //         $(input).addClass('is-valid')
                //         $(input).removeClass('is-invalid')    
                //     }
            
                // })
                // if()

                
            //     let x = 0;
            //     if ( extintores_aro_seguridad_err )
            //     {
            //         extintores_aro_seguridad.classList.remove( "is-valid" );
            //         extintores_aro_seguridad.classList.add( "is-invalid" );
            //         extintores_aro_seguridad_error.innerHTML =
            //             extintores_aro_seguridad_err;
            //     } else
            //     {
            //         extintores_aro_seguridad.classList.remove( "is-invalid" );
            //         extintores_aro_seguridad.classList.add( "is-valid" );
            //         extintores_aro_seguridad_error.innerHTML = "";
            //     }
          
                // if ( img1_err )
                // {
                //     img1.classList.remove( "is-valid" );
                //     img1.classList.add( "is-invalid" );
                //     img1_error.innerHTML = img1_err;
                // } else
                // {
                //     img1.classList.remove( "is-invalid" );
                //     img1.classList.add( "is-valid" );
                //     img1_error.innerHTML = "";
                // }
                // if ( img2_err )
                // {
                //     img2.classList.remove( "is-valid" );
                //     img2.classList.add( "is-invalid" );
                //     img2_error.innerHTML = img2_err;
                // } else
                // {
                //     img2.classList.remove( "is-invalid" );
                //     img2.classList.add( "is-valid" );
                //     img2_error.innerHTML = "";
                // }
                // if ( img3_err )
                // {
                //     img3.classList.remove( "is-valid" );
                //     img3.classList.add( "is-invalid" );
                //     img3_error.innerHTML = img3_err;
                // } else
                // {
                //     img3.classList.remove( "is-invalid" );
                //     img3.classList.add( "is-valid" );
                //     img3_error.innerHTML = "";
                // }
                // if ( img4_err )
                // {
                //     img4.classList.remove( "is-valid" );
                //     img4.classList.add( "is-invalid" );
                //     img4_error.innerHTML = img4_err;
                // } else
                // {
                //     img4.classList.remove( "is-invalid" );
                //     // img4.classList.add('is-valid')
                //     img4_error.innerHTML = "";
                // }
                // if ( img5_err )
                // {
                //     img5.classList.remove( "is-valid" );
                //     img5.classList.add( "is-invalid" );
                //     img5_error.innerHTML = img5_err;
                // } else
                // {
                //     img5.classList.remove( "is-invalid" );
                //     // img5.classList.add('is-valid')
                //     img5_error.innerHTML = "";
                // }
                // if ( img6_err )
                // {
                //     img6.classList.remove( "is-valid" );
                //     img6.classList.add( "is-invalid" );
                //     img6_error.innerHTML = img6_err;
                // } else
                // {
                //     img6.classList.remove( "is-invalid" );
                //     // img6.classList.add('is-valid')
                //     img6_error.innerHTML = "";
                // }
            //     if ( lamparas_estado_err && x === 0 )
            //     {
            //         x = 1;
            //         alert( "Por favor, indica el estado de las lámparas" );
            //     }
         
            }
        } )
        .catch( ( err ) => console.error( err ) );
}