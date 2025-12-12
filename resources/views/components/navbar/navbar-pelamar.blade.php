<nav class="navbar navbar-expand-lg shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand judul-web" href="#">Job<span>Xampus</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
            <li class="nav-item">
                <x-navbar.link href='/home-pelamar'>Home</x-navbar.link>
            </li>
            <li class="nav-item">
                <x-navbar.link href='/lowongan-pelamar'>Lowongan</x-navbar.link>
            </li>
            <li class="nav-item">
                <x-navbar.link href='/universitas-pelamar'>Universitas</x-navbar.link>
            </li>
          </ul>
          @php
              $notifikasi = session('notifikasi_lamaran') ?? [];
          @endphp

          <div class="dropdown">
            <button class="btn btn-dropdown position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-bell-fill fs-4"></i>
              @if($notifikasi && count($notifikasi) > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{ count($notifikasi) }}
                </span>
              @endif
            </button>
            <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 300px;">
              <li><strong>Notifikasi Lamaran</strong></li>
              @forelse($notifikasi as $notif)
                <li class="small mt-2 d-flex justify-content-between align-items-start">
                  <div style="max-width: 240px;">
                    Lamaran ke <strong>{{ $notif->lowongan->nama_lowongan }}</strong> telah
                    <strong class="{{ $notif->status == 'Diterima' ? 'text-success' : 'text-danger' }}">
                      {{ strtoupper($notif->status) }}
                    </strong>
                  </div>
                  <form method="POST" action="{{ url('/hapus-notifikasi/' . $notif->id_lamaran) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-link text-danger p-0 ms-2" style="font-size: 0.8rem;" title="Hapus Notifikasi">×</button>
                  </form>
                </li>
              @empty
                <li class="text-muted mt-2">Tidak ada notifikasi baru</li>
              @endforelse
            </ul>
          </div>
          <div class="dropdown">
            <button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-fill fs-3"></i>
            </button>
            <ul class="dropdown-menu">
              <li><x-navbar.edit href='#'>
                @if(session('pelamar'))
                    <h6>{{ session('pelamar') }}</h6>
                @endif</x-navbar.edit></li>
              <li><x-navbar.edit href='/profile-pelamar'>Profile</x-navbar.edit></li>
              <li><x-navbar.logout-link href="{{ url('/logout') }}">Logout</x-navbar.logout-link></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>