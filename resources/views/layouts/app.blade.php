<x-layouts::app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts::app.sidebar>

@if (session()->has('toast'))
    <script>
        showToast('{{ session('toast.message') }}', '{{ session('toast.type') }}');
    </script>
@endif

<script>
    window.addEventListener('show-toast', event => {
        showToast(event.detail.message, event.detail.type);
    });
</script>
