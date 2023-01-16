
@if ($role === 'empresa' && $section === 'dashboard')
    <script src="{{ asset('js/empresa/main.js') }}"></script>
    <script>
        var route = [
            "{{ route('reportes.enterpriseE', ['id' => ':id']) }}",
            "{{ route('reportes.transformadorE', ['id' => ':id']) }}",
            "{{ route('reportes.electricaE', ['id' => ':id']) }}",
        ];
        
    </script>
@endif


