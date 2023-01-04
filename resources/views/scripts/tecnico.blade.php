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
    </script>
@endif
@if ($role === 'tecnico' && $section === 'dashboard')
    <div hidden id="data-tecnico" data-data=@json($data)></div>
    <div hidden id="data-inspecciones">@json($inspecciones_activas)</div>
    <script src="{{ asset('js/tecnico/dashboard.js') }}"></script>
@endif
@if ($role === 'tecnico' && $section === 'test' && $subsection === '')
    <div hidden id="data-rep-edificio">@json($rep_enterprise)</div>
    {{-- <div id="data-rep-eletrcia">@json($rep_enterprise)</div> --}}
    <div hidden id="data-rep-transformador">@json($rep_transformador)</div>
    <script src="{{ asset('js/tecnico/test_navigation.js') }}"></script>
@endif
@if ($role === 'tecnico' && $section === 'test' && $subsection === 'edificio')
    <script src="{{ asset('js/tecnico/test_edificio.js') }}"></script>
@endif
@if ($role === 'tecnico' && $section === 'test' && $subsection === 'transformador')
    <script src="{{ asset('js/tecnico/test_transformador.js') }}"></script>
@endif
@if ($role === 'tecnico' && $section === 'test' && $subsection === 'electrica')
    <script>
        route = [
            "{{ route('tecnico.electrica_subir') }}",
        ];
    </script>
    <script src="{{ asset('js/tecnico/test_electrico.js') }}"></script>
@endif
