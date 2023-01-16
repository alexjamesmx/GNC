{{-- rutas generales --}}
@if ($role === 'tecnico')
    <script>
        var route = [
            "{{ route('tecnico.ins_edificio', ['id' => ':id']) }}",
            "{{ route('tecnico.edificio_subir') }}",
            "{{ route('tecnico.anomalia') }}",
            "{{ route('tecnico.test', ['id' => ':id']) }}",
            "{{ route('tecnico.anomalia_validar') }}",
            "{{ route('tecnico.ins_electrica', ['id' => ':id']) }}",
            "{{ route('tecnico.electrica_subir') }}",
            "{{ route('tecnico.ins_transformador', ['id' => ':id']) }}",
            "{{ route('tecnico.ins_transformador_subir') }}"
        ];

        var test_url = "{{ route('tecnico.test', ['id' => ':id']) }}";
    </script>
@endif

{{-- Dentro de alguna inspeccion --}}
@if ($role === 'tecnico' && $section === 'test' && $subsection !== '')
    <script>
        //CANCELAR

        function cancelar(){
            const confirmar = confirm("Los cambios no se guardaran. Puedes ingresar más tarde");
            if (!confirmar) return false;
            console.log(route);
            const id = document.querySelector("#inspeccion_id").value;
            const url = test_url.replace(":id", id);
            console.log(url);
            window.location.href = url;
        }
    

        //MENSAJE SUBIENDO INSPECCION
        async function subiendo() {
            return new Promise(resolve => {
                message('Reporte guardado, por favor espere')
                setTimeout(() => {
                    resolve(true)
                }, 2000)
            })
        }

        function handleAnomalia(anomaliaTipo) {
            overlay.classList.add("active");
            popup.classList.add("active");
            formAnomalias.setAttribute("data-anomalia", anomaliaTipo);
        }

        
    </script>
@endif

{{-- en dasbhboard --}}
@if ($role === 'tecnico' && $section === 'dashboard')
    <div hidden id="data-tecnico" data-data=@json($data)></div>
    <div hidden id="data-inspecciones">@json($inspecciones_activas)</div>
    <script src="{{ asset('js/tecnico/dashboard.js') }}"></script>
    <script src="{{asset('js/tecnico/modal.js')}}"></script>
@endif
{{-- en el menu general de los test --}}
@if ($role === 'tecnico' && $section === 'test' && $subsection === '')
    <div hidden id="data-rep-edificio">@json($rep_enterprise)</div>
    <div hidden id="data-rep-electrico">@json($rep_electrico)</div>
    <div hidden id="data-rep-transformador">@json($rep_transformador)</div>
    <script src="{{ asset('js/tecnico/test_navigation.js') }}"></script>
@endif
{{-- dentro de test edificio --}}
@if ($role === 'tecnico' && $section === 'test' && $subsection === 'edificio')
    <script src="{{ asset('js/tecnico/test_edificio.js') }}"></script>
@endif
{{-- dentro de test transformador --}}
@if ($role === 'tecnico' && $section === 'test' && $subsection === 'transformador')
    <script src="{{ asset('js/tecnico/test_transformador.js') }}"></script>
@endif
{{-- dentro de test electrica --}}
@if ($role === 'tecnico' && $section === 'test' && $subsection === 'electrica')
    <script>
        route = [
            "{{ route('tecnico.electrica_subir') }}",
            "{{ route('tecnico.anomalia_validar') }}",
            "{{ route('tecnico.anomalia') }}",
               "{{ route('tecnico.test', ['id' => ':id']) }}",
        ];
    </script>
    <script src="{{ asset('js/tecnico/test_electrico.js') }}"></script>
    <script src="{{ asset('js/tecnico/modules/constants.js') }}"></script>
@endif
