<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Pengalaman Kerja</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" />
</head>
<body>
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4 text-center fs-2">Edit Pendidikan</h3>

                        {{-- Tampilkan error validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Tampilkan pesan sukses --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('pendidikan.update', $pendidikan->id_pendidikan) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_institusi" class="form-label">Nama Institusi</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_institusi"
                                    name="nama_institusi"
                                    value="{{ old('nama_institusi', $pendidikan->nama_institusi) }}"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="jurusan"
                                    name="jurusan"
                                    value="{{ old('jurusan', $pendidikan->jurusan) }}"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tahun_masuk"
                                    name="tahun_masuk"
                                    value="{{ old('tahun_masuk', $pendidikan->tahun_masuk) }}"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tahun_lulus"
                                    name="tahun_lulus"
                                    value="{{ old('tahun_lulus', $pendidikan->tahun_lulus) }}"
                                    required
                                />
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Update Pengalaman
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
