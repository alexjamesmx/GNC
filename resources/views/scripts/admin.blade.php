@if ($role_type === 1)
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
