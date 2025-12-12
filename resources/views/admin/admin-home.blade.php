<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>Admin - JobXampus</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand judul-web text-white" href="#">
          Job<span>Xampus</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Right Side -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <div class="d-flex align-items-center gap-4">
            <!-- Notification Dropdown -->
            <div class="dropdown position-relative">
              <button
                class="btn btn-link text-white position-relative"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-bell fs-4"></i>
                  <span class="visually-hidden">Notifikasi baru</span>
              </button>

              <ul
                class="dropdown-menu dropdown-menu-end shadow-sm p-2"
              >
                <li><h6 class="dropdown-header">Notifikasi</h6></li>

                <!-- Notifikasi 1 -->
                @foreach($pendingPelamar as $p)
                <li class="notif-item mb-2">
                  <div class="d-flex flex-column">
                    <span>{{ $p->nama }} mendaftar sebagai akun Pelamar</span>

                    <div class="d-flex gap-2 mt-1">
                      <form method="POST" action="{{ route('admin.konfirmasi', $p->id_pelamar) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary" type="submit">Konfirmasi</button>
                      </form>

                      <form method="POST" action="{{ route('admin.tolak', $p->id_pelamar) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger" type="submit">Tolak</button>
                      </form>
                    </div>
                  </div>
                </li>
                @endforeach
                @foreach($pendingUniversitas as $pu)
                <li class="notif-item mb-2">
                  <div class="d-flex flex-column">
                    <span>{{ $pu->nama_universitas }} mendaftar sebagai akun Universitas</span>

                    <div class="d-flex gap-2 mt-1">
                      <form method="POST" action="{{ route('admin.konfirmasiUniversitas', $pu->id_universitas) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary" type="submit">Konfirmasi</button>
                      </form>

                      <form method="POST" action="{{ route('admin.tolakUniversitas', $pu->id_universitas) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger" type="submit">Tolak</button>
                      </form>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>

            <!-- Admin Info -->
            <div class="text-white">Beranda - Admin</div>
            <div class="text-white"><x-navbar.logout-link-admin href="{{ url('/logout-admin') }}">Logout</x-navbar.logout-link-admin></div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Tabs -->
    <div class="container" style="margin-top: 5rem">
      <div class="d-flex justify-content-evenly gap-5 border-bottom pb-2">
        <div class="tab-button text-center" onclick="showTab('pelamar')">
          <i class="bi bi-person-lines-fill"></i>
          <div>Pelamar</div>
        </div>
        <div class="tab-button text-center" onclick="showTab('universitas')">
          <i class="bi bi-building"></i>
          <div>Universitas</div>
        </div>
      </div>

      <!-- Judul -->
      <div class="text-center mt-4">
        <h3 class="fw-bold">Akun yang Tersedia</h3>
      </div>

      <!-- Pelamar List -->
      <div class="row g-3 mt-3 tab-content-area" id="pelamar-list">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @foreach ($pelamar as $p)
              @if ($p->status_akun == 'active') {{-- Tampilkan hanya pelamar yang sudah dikonfirmasi --}}
              <div class="col-md-4">
                  <div class="account-card">
                      <div class="d-flex align-items-center">
                          @if ($p->profile_pic)
                              <img src="{{ asset('img/' . $p->profile_pic) }}" alt="Profile Picture" class="profile-pic me-3" style="width: 50px; height: 50px;" />
                          @else
                              <h6>Logo Kosong</h6>
                          @endif
                          <div class="nama-universitas pt-3 ms-2">
                              <h6>{{ $p->nama }}</h6>
                          </div>      
                      </div>
                      <form action="{{ route('pelamar.hapus', $p->id_pelamar) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelamar ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-link btn-sm text-danger p-0" title="Hapus">
                              <i class="bi bi-trash delete-icon"></i>
                          </button>
                      </form>
                  </div>
              </div>
              @endif
          @endforeach
      </div>

      <!-- Universitas List -->
      <div class="row g-3 mt-3 tab-content-area" id="universitas-list">
          @foreach ($universitas as $u)
              @if ($u->status == 'active') {{-- Tampilkan hanya universitas yang sudah dikonfirmasi --}}
              <div class="col-md-4">
                  <div class="account-card">
                      <div class="d-flex align-items-center">
                          @if ($u->logo)
                              <img src="{{ asset('img/' . $u->logo) }}" alt="Logo" style="width: 50px; height: 50px; object-fit: contain;" />
                          @else
                              <h6>Logo Kosong</h6>
                          @endif
                          <div class="nama-universitas pt-3 ms-2">
                              <h6>{{ $u->nama_universitas }}</h6>
                          </div>      
                      </div>
                      <form action="{{ route('universitas.hapus', $u->id_universitas) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus universitas ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-link btn-sm text-danger p-0" title="Hapus">
                              <i class="bi bi-trash delete-icon"></i>
                          </button>
                      </form>
                  </div>
              </div>
              @endif
          @endforeach
      </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toggle Tab with Transition -->
    <script>
      function showTab(tabName) {
        const pelamar = document.getElementById("pelamar-list");
        const universitas = document.getElementById("universitas-list");

        // Reset both
        pelamar.classList.remove("active");
        universitas.classList.remove("active");

        // Delay to allow transition
        setTimeout(() => {
          if (tabName === "pelamar") {
            pelamar.classList.add("active");
          } else {
            universitas.classList.add("active");
          }
        }, 100); // Delay 100ms for smooth transition
      }

      // Default tab
      window.onload = () => {
        showTab("universitas");
      };
    </script>
  </body>
</html>
