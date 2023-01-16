function edificio( id )
{
    const url = route[ 0].replace( ":id", id );
    console.log( "url con id", url );
    location.href = url;
}

function electrica( id )
{
    const url = route[5].replace( ":id", id );
    console.log( "url con id", url );
    location.href = url;
}


function transformador( id )
{
    const url = route[7].replace( ":id", id );
    console.log( "url con id", url );
    location.href = url;
}

    let rep_edificio = JSON.parse(document.querySelector('#data-rep-edificio').innerHTML)
    let rep_ransformador = JSON.parse(document.querySelector('#data-rep-transformador').innerHTML)
    let rep_electrico = JSON.parse(document.querySelector('#data-rep-electrico').innerHTML)

    const nav_edificio = document.querySelector('#nav_edificio')
    const nav_transformador = document.querySelector('#nav_transformador')
    const nav_electrico = document.querySelector('#nav_electrico')

    console.log(nav_electrico)
    document.addEventListener('DOMContentLoaded', () => {

        if(rep_edificio?.status_id === 5 ){
            console.log('cinco')
            nav_edificio.classList.add('completed')
            nav_edificio.classList.remove('hover:bg-amber-100')
            nav_edificio.classList.remove('cursor-pointer')
            nav_edificio.setAttribute('onclick', 'alert("Ya has completado esta sección")')
            
        }
        if(rep_ransformador?.status_id === 5 ){
            console.log('cinco')
            nav_transformador.classList.add('completed')
            nav_transformador.classList.remove('hover:bg-amber-100')
            nav_transformador.classList.remove('cursor-pointer')
            nav_transformador.setAttribute('onclick', 'alert("Ya has completado esta sección")')   
        }
        if(rep_electrico?.status_id === 5 ){
            console.log('cinco')
            nav_electrico.classList.add('completed')
            nav_electrico.classList.remove('hover:bg-amber-100')
            nav_electrico.classList.remove('cursor-pointer')
            nav_electrico.setAttribute('onclick', 'alert("Ya has completado esta sección")')   
        }
    })
 

   