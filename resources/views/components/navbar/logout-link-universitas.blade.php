<a href="{{ url('/logout-universitas') }}" onclick="return confirm('Yakin ingin logout?')" {{ $attributes->merge(['class' => "nav-link mt-auto"]) }}>
    {{ $slot }}
</a>