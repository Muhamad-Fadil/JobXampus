<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Universitas</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    />
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  </head>

  <body>
    <!-- Hamburger Button (visible on small screens) -->
    <button class="btn toggle-sidebar d-md-none">
      <i class="bi bi-list fs-3"></i>
    </button>

    <div id="sidebar" class="sidebar-wrapper">
      <div class="p-4 d-flex flex-column align-items-center text-white bg-dark"
        style="min-height: 100vh">
        <h4 class="text-center mb-4 judul">Job<span>Xampus</span></h4>
        <div class="text-center mb-4">
          @if(session('universitas_logo'))
          <img src="{{ asset('img/' . session('universitas_logo')) }}" class="img-fluid rounded-circle mb-4" alt="Logo Universitas" style="max-width: 120px" />
          @else
          <h6>Logo Kosong</h6>
          @endif
          <div class="nama-universitas pt-3">
            @if(session('universitas'))
            <h6>{{ session('universitas') }}</h6>
            @endif
          </div>
        </div>
        
        <nav class="nav flex-column w-100">
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
    </div>

    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <x-navbar.navbar-universitas/>
        <!-- Main Content -->
        <div class="col-md-10 p-4 main-content">
          @yield('home-universitas')
          @yield('tentang-universitas')
          @yield('list-lowongan')
          @yield('list-pelamar')
          @yield('list-karyawan')
        </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const toggleBtn = document.querySelector(".toggle-sidebar");
      const sidebar = document.getElementById("sidebar");

      // Toggle sidebar saat tombol diklik
      toggleBtn.addEventListener("click", (e) => {
        e.stopPropagation(); // Mencegah event bubbling ke document
        sidebar.classList.toggle("active");
        document.body.classList.toggle("sidebar-open");
      });

      // Cegah penutupan saat klik di dalam sidebar
      sidebar.addEventListener("click", (e) => {
        e.stopPropagation();
      });

      // Tutup sidebar saat klik di mana saja di luar sidebar dan tombol
      document.addEventListener("click", () => {
        if (sidebar.classList.contains("active")) {
          sidebar.classList.remove("active");
          document.body.classList.remove("sidebar-open");
        }
      });
    </script>
  </body>
</html>
