<a href="{{ url('/logout') }}" onclick="return confirm('Yakin ingin logout?')" {{ $attributes->merge(['class' => "dropdown-item"]) }}>
    {{ $slot }}
</a>
