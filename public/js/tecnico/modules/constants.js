
var anomaliasArr = [
    'ten_media_soporteria_edo',
    'sis_tierra_edo',
    'conex_tierra_edo',
    'sellado_ducteria_edo',
    'tipo_canalizacion',
    'bt_soporteria_edo',
    'int_senalizacion_edo',
    'int_edo',
    'circuitos_edo',
    'acc_subterraneo_edo',
    'codos_edo',
    'terminales_edo',
    'bt_cableado_cable_acomodo',
    'codos_occ_edo',
    'insertos_occ_edo',
    'adpt_tierra_edo',
    'se_cable_acomodo_edo',
    'barras_tierra_edo',
    'marbete_edo',
    'codos',
    'terminales',
    'fusibles',
    'mecanismo_edo',
];

var anomaliasArrPost = []
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

$( '#tipo_canalizacion_otro' ).on( 'click', () =>
{
    $( '#tipo_canalizacion_otro_input' ).attr( 'disabled', false )
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

$( '#int_senalizacion_si' ).on( 'click', () =>
{
    $( '#int_senalizacion_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#int_senalizacion_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#int_senalizacion_no' ).on( 'click', () =>
{
    $( '#int_senalizacion_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#int_senalizacion_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )


$( '#circuitos_si' ).on( 'click', () =>
{
    $( '#circuitos_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#circuitos_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#circuitos_no' ).on( 'click', () =>
{
    $( '#circuitos_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#circuitos_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$( '#marbete_si' ).on( 'click', () =>
{
    $( '#marbete_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#marbete_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#marbete_no' ).on( 'click', () =>
{
    $( '#marbete_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#marbete_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )


$( '#terminales_si' ).on( 'click', () =>
{
    $( '#terminales_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#terminales_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#terminales_no' ).on( 'click', () =>
{
    $( '#terminales_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#terminales_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$( '#terminales_si' ).on( 'click', () =>
{
    $( '#terminales_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#terminales_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#terminales_no' ).on( 'click', () =>
{
    $( '#terminales_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#terminales_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )

$( '#fusibles_si' ).on( 'click', () =>
{
    $( '#fusibles_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#fusibles_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#fusibles_no' ).on( 'click', () =>
{
    $( '#fusibles_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-70' ).prop( 'checked', false )

    $( '#fusibles_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-70' )

    $('#capacidad_fusibles_label').addClass( 'opacity-70' )
    $('#capacidad_fusibles_input').attr('disabled', true).addClass( 'opacity-70' ).val('')
    
} )



$( '#fusibles_si' ).on( 'click', () =>
{
    $( '#fusibles_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-70' )
    $( '#fusibles_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-70' )
    $('#capacidad_fusibles_label').removeClass( 'opacity-70' )
    $('#capacidad_fusibles_input').attr('disabled', false).removeClass( 'opacity-70' )
} )

$( '#codos_si' ).on( 'click', () =>
{
    $( '#codos_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#codos_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#codos_no' ).on( 'click', () =>
{
    $( '#codos_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#codos_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )


$( '#mecanismo_si' ).on( 'click', () =>
{
    $( '#mecanismo_edo_si' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
    $( '#mecanismo_edo_no' ).attr( 'disabled', false ).next().removeClass( 'opacity-50' )
} )

$( '#mecanismo_no' ).on( 'click', () =>
{
    $( '#mecanismo_edo_si' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' ).prop( 'checked', false )

    $( '#mecanismo_edo_no' ).attr( 'disabled', true ).prop( 'checked', false ).next().addClass( 'opacity-50' )
} )