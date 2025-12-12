<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Universitas</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  </head>
<body>
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4 text-center fs-2">Edit Profil Universitas</h3>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_universitas" class="form-label">Nama Universitas</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama_universitas"
                                    id="nama_universitas"
                                    value="{{ $universitas->nama_universitas }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    value="{{ $universitas->email }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="alamat"
                                    id="alamat"
                                    value="{{ $universitas->alamat }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea
                                    class="form-control"
                                    name="deskripsi"
                                    id="deskripsi"
                                >{{ $universitas->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_website" class="form-label">Alamat Website</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="alamat_website"
                                    id="alamat_website"
                                    value="{{ $universitas->alamat_website }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="kota"
                                    id="kota"
                                    value="{{ $universitas->kota }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo (Unggah gambar)</label>
                                <input type="file" class="form-control" name="logo" id="logo" accept="image/*" />
                                @if ($universitas->logo)
                                    <small>Logo saat ini:</small><br/>
                                    <img src="{{ asset('img/' . $universitas->logo) }}" alt="Logo Universitas" style="max-width: 200px; max-height: 150px;" />
                                @endif
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn">
                                    Update Profil
                                </button>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </section>
</body>
</html>

