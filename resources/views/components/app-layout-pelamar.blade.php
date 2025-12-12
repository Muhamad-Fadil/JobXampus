<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>Pelamar</title>
</head>
<body class="content-pelamar">

    <x-navbar.navbar-pelamar/>

        @yield('home-pelamar')
        @yield('universitas-pelamar')
        @yield('lowongan-pelamar')
        @yield('profile-pelamar')

        <footer class="text-white pt-5 pb-2">
      <div class="container">
        <div class="row text-center text-md-start">
          <div class="col-md-5 mb-3">
            <h5 class="fw-bold">JobXampus</h5>
            <p class="small">Platform yang menghubungkan mahasiswa dengan berbagai peluang karier di lingkungan kampus.</p>
          </div>
          <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Navigasi</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white text-decoration-none">Beranda</a></li>
              <li><a href="lowongan.html" class="text-white text-decoration-none">Lowongan</a></li>
              <li><a href="perusahaan.html" class="text-white text-decoration-none">Universitas</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-3">
            <h5 class="fw-bold">Kontak</h5>
            <p class="small mb-1"><i class="bi bi-envelope-fill me-2"></i>support@jobxampus.com</p>
            <p class="small mb-1"><i class="bi bi-telephone-fill me-2"></i>+62 895 1696 2776</p>
            <p class="small"><i class="bi bi-geo-alt-fill me-2"></i>Bogor, Indonesia</p>
          </div>
        </div>
        <hr class="bg-white opacity-25" />
        <div class="text-center small">
          &copy; 2025 JobXampus. Semua hak dilindungi.
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
