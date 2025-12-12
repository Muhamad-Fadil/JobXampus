<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - JOBX</title>
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
</head>
<body>
  <div class="login-container">
  <div class="left-pane d-none d-md-block">
    <div class="admin-label"></div>
  </div>
  <div class="right-pane">
    <div class="form-box">
      <h2 class="text-center">JOB<span>Xampus</span></h2>

      @if ($errors->has('login'))
        <div class="alert alert-danger">{{ $errors->first('login') }}</div>
      @endif

      @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" id="nama" name="nama" class="form-control" required />
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input type="password" id="password" name="password" class="form-control" required />
          </div>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary w-100">Log in</button>
        </div>
      </form>

      <div class="login-options mt-3">
        <a href="/login-universitas"><i class="bi bi-building"></i> Login sebagai Universitas</a>
      </div>

      <div class="login-link mt-2">
        <span>Belum punya akun? <a href="/register-pelamar">Daftar di sini</a></span>
      </div>
    </div>
  </div>
</div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
