<div class="col-md-2 sidebar p-4 d-flex flex-column">
  <h4 class="text-center mb-4 judul">Job<span>Xampus</span></h4>
    <div class="text-center mb-4">
         @if(session('universitas_logo'))
                <img src="{{ asset('img/' . session('universitas_logo')) }}" alt="Logo Universitas" style="max-width: 200px; max-height: 150px;" />
            @else
                <h6>Logo Kosong</h6>
            @endif
            <div class="nama-universitas pt-3">
                @if(session('universitas'))
                    <h6>{{ session('universitas') }}</h6>
                @endif
            </div>
    </div>

      <nav class="nav flex-column flex-grow-1">
          <x-navbar.link href='/home-universitas'>
              <i class="bi bi-speedometer2 me-2"></i>Beranda
            </x-navbar.link>
            <x-navbar.link href='/tentang-universitas'>
                <i class="bi bi-file-earmark-medical me-2"></i>Profile Universitas
            </x-navbar.link>
            <x-navbar.link href="{{ url('/list-lowongan/' . session('id_universitas')) }}" class="nav-link">
                <i class="bi bi-list-task me-2"></i>List Lowongan
            </x-navbar.link> 
            <x-navbar.link href="{{ url('/list-pelamar/' . session('id_universitas')) }}" class="nav-link">
                <i class="bi bi-list-task me-2"></i>List Pelamar
            </x-navbar.link> 
            <x-navbar.link href="{{ url('/list-karyawan/' . session('id_universitas')) }}" class="nav-link">
                <i class="bi bi-list-task me-2"></i>List Karyawan
            </x-navbar.link> 
            <x-navbar.logout-link-universitas href="{{ url('/logout') }}"><i class="bi bi-box-arrow-left me-2"></i>Logout</x-navbar.logout-link-universitas>
        </nav>
</div>