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
                        <h3 class="mb-4 text-center fs-2">Edit Profile Pelamar</h3>

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

                        <form method="POST" action="{{ route('update-pelamar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama"
                                    id="nama"
                                    value="{{ $pelamar->nama }}"
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
                                    value="{{ $pelamar->email }}"
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
                                    value="{{ $pelamar->alamat }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <textarea
                                    class="form-control"
                                    name="tanggal_lahir"
                                    id="tanggal_lahir"
                                >{{ $pelamar->tanggal_lahir }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="jenis_kelamin"
                                    id="jenis_kelamin"
                                    value="{{ $pelamar->jenis_kelamin }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="agama"
                                    id="agama"
                                    value="{{ $pelamar->agama }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="status"
                                    id="status"
                                    value="{{ $pelamar->status }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="ringkasan_profil" class="form-label">Ringkasan Profile</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="ringkasan_profil"
                                    id="ringkasan_profil"
                                    value="{{ $pelamar->ringkasan_profil }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="profile_pic" class="form-label">Profile Picture (Unggah gambar)</label>
                                <input type="file" class="form-control" name="profile_pic" id="profile_pic" accept="image/*" />
                                @if ($pelamar->profile_pic  )
                                    <small>Profile Picture saat ini:</small><br/>
                                    <img src="{{ asset('img/' . $pelamar->profile_pic   ) }}" alt="Profile Picture" style="max-width: 200px; max-height: 150px;" />
                                @endif
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn">
                                    Update Profile
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

