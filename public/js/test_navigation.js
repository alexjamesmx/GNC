function edificio( id )
{
    const url = route[ 0].replace( ":id", id );
    console.log( "url con id", url );
    location.href = url;
}





    let rep_edificio = JSON.parse(document.querySelector('#data-rep-edificio').innerHTML)
    const nav_edificio = document.querySelector('#nav_edificio')

    document.addEventListener('DOMContentLoaded', () => {

        if(rep_edificio?.status_id === 5 ){
            console.log('cinco')
            nav_edificio.classList.add('completed')
            nav_edificio.classList.remove('hover:bg-amber-100')
            nav_edificio.classList.remove('cursor-pointer')
            nav_edificio.setAttribute('onclick', 'alert("Ya has completado esta sección")')
            
        }

    })
 

    console.log(rep_edificio)
