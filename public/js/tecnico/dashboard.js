
const 
data = JSON.parse( document.querySelector( '#data-tecnico' ).getAttribute( 'data-data' ) ),
ins_activas = JSON.parse( document.querySelector( '#data-inspecciones' ).innerHTML ),
dashboard = document.querySelector( '.dashboard' ),
nav_dashboard = document.querySelector( '#nav_dashboard' ),
inspecciones_activas = document.querySelector( '.inspecciones-activas' ),
inspecciones_completas = document.querySelector( '.inspecciones-completas' )


function handle_inspecciones_activas()
{

    //mostrar inspecciones activas
    inspecciones_activas.classList.remove( 'oculto' )
    document.querySelector( '#nav_inspecciones' ).classList.add( 'active' )
    //ocultar otras secciones
    nav_dashboard.classList.remove( 'active' )
    dashboard.classList.add( "oculto" )
    !inspecciones_completas.classList.contains( "oculto" ) && inspecciones_completas.classList.add( "oculto" )

}

function handle_inspecciones_completas()
{

    //mostrar inspecciones completaa
    inspecciones_activas.classList.add( 'oculto' )
    document.querySelector( '#nav_inspecciones' ).classList.add( 'active' )
    document.querySelector( '#nav_dashboard' ).classList.contains( 'active' ) && document.querySelector( '#nav_dashboard' ).classList.remove( 'active' )
    //ocultar dashboard
    !dashboard.classList.contains( "oculto" ) && dashboard.classList.add( "oculto" )


    inspecciones_completas.classList.remove( "oculto" )

}
function handle_dashboard()
{

    document.querySelector( '#nav_inspecciones' ).classList.contains( 'active' ) && document.querySelector( '#nav_inspecciones' ).classList.remove( 'active' )
    !document.querySelector( '#nav_dashboard' ).classList.contains( 'active' ) && document.querySelector( '#nav_dashboard' ).classList.add( 'active' )


    !inspecciones_activas.classList.contains( "oculto" ) && inspecciones_activas.classList.add( "oculto" )
    !inspecciones_completas.classList.contains( "oculto" ) && inspecciones_completas.classList.add( "oculto" )

    dashboard.classList.add( "oculto" )
}

function ingresarInspeccion( id )
{

    console.log( route )
    const url = route[ 3 ].replace( ':id', id )
    console.log( 'url con id', url )
    location.href = url
}