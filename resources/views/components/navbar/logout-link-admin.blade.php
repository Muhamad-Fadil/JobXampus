<a href="{{ url('/logout-admin') }}" onclick="return confirm('Yakin ingin logout?')" {{ $attributes->merge(['class' => "nav-link mt-auto"]) }}>
    {{ $slot }}
</a>