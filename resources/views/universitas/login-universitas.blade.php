<!-- resources/views/login-universitas.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Universitas - JOBX</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
</head>
<body>
  <div class="login-container">
    <div class="left-pane">
      <div class="form-box">
        <h2 class="text-center">JOB<span>Xampus</span></h2>

        @if ($errors->has('login-universitas'))
          <div class="alert alert-danger">{{ $errors->first('login-universitas') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login-universitas') }}">
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person"></i></span>
              <input type="text" class="form-control" name="nama_universitas" id="nama_universitas" required />
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" class="form-control" name="password" id="password" required />
            </div>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Log in</button>
          </div>
        </form>

        <div class="login-options">
          <a href="/login"><i class="bi bi-person"></i> Login sebagai Pelamar</a>
        </div>
        <div class="login-link">
          <span>Belum punya akun? <a href="/register-universitas">Daftar di sini</a></span>
        </div>
      </div>
    </div>
    <div class="right-pane d-none d-md-block">
      <div class="admin-label"></div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
