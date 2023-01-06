@if ($role_type === 1 && $section !== 'calendario')
    <script>
        var route = [
            "{{ route('inspeccion.store') }}",
            "{{ route('inspeccion.delete', ['id' => ':id']) }}",
            "{{ route('inspeccion.getParques') }}",
            "{{ route('inspeccion.getSubestaciones') }}",
            "{{ route('message') }}",
        ];
    </script>
@endif

@if ($role_type === 1 && $section === 'calendario')
    <script src="{{ asset('js/admin/calendario.js') }}"></script>
    <script>
        var route = [
            "{{ route('calendario.c_parques') }}",
            "{{ route('calendario.c_empresas') }}",
            "{{ route('calendario.c_inpecciones') }}",
            "{{ route('reportes.enterprise', ['id' => ':id']) }}",
            "{{ route('reportes.transformador', ['id' => ':id']) }}",
            "{{ route('reportes.electrica', ['id' => ':id']) }}",
        ];
        var img_url = [
            "{{ asset('images/gnc/building-news-svgrepo-com.svg') }}",
            "{{ asset('images/gnc/electric-signal-svgrepo-com.svg') }}",
            "{{ asset('images/gnc/tesla-coil-svgrepo-com.svg') }}",
        ];
    </script>
@endif
