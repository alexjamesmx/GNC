// const data = "{{@json($data)}}";

console.log('primer')

const data= JSON.parse(document.querySelector('#data-tecnico').getAttribute('data-data'))
const ins_activas= JSON.parse(document.querySelector('#data-inspecciones').innerHTML)


console.log(data)
console.log(ins_activas)



const inspeccion_test = document.querySelector('.inspeccion-test')
const dashboard = document.querySelector('.dashboard')
const inspecciones_activas = document.querySelector('.inspecciones-activas')


function handle_inspecciones_activas(){

    //mostrar inspecciones activas
    inspecciones_activas.classList.remove('oculto')
    document.querySelector('#nav_inspecciones').classList.add('active')
    document.querySelector('#nav_dashboard').classList.contains('active') && document.querySelector('#nav_dashboard').classList.remove('active')
    //ocultar dashboard
    !dashboard.classList.contains("oculto") &&  dashboard.classList.add("oculto")

    // document.querySelector(".inspecciones_activas").classList.remove("oculto")
  

}
function handle_dashboard(){

    document.querySelector('#nav_inspecciones').classList.contains('active') && document.querySelector('#nav_inspecciones').classList.remove('active')
    !document.querySelector('#nav_dashboard').classList.contains('active') && document.querySelector('#nav_dashboard').classList.add('active')


    !inspecciones_activas.classList.contains("oculto") &&  inspecciones_activas.classList.add("oculto")

    dashboard.classList.add("oculto")
}

function ingresarInspeccion(id){

    console.log(route)
    const url = route[3].replace(':id', id) 
    console.log('url con id', url)
    location.href = url    
}