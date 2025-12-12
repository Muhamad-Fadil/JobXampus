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
                        <h3 class="mb-4 text-center fs-2">Edit Pengalaman Kerja</h3>

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

                        <form method="POST" action="{{ route('pengalaman.update', $pengalaman_kerja->id_pengalaman) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_instansi" class="form-label">Nama Instansi</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_instansi"
                                    name="nama_instansi"
                                    value="{{ old('nama_instansi', $pengalaman_kerja->nama_instansi) }}"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <label for="posisi" class="form-label">Posisi</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="posisi"
                                    name="posisi"
                                    value="{{ old('posisi', $pengalaman_kerja->posisi) }}"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <label for="tahun_mulai" class="form-label">Tahun Mulai</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tahun_mulai"
                                    name="tahun_mulai"
                                    value="{{ old('tahun_mulai', $pengalaman_kerja->tahun_mulai) }}"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <label for="tahun_selesai" class="form-label">Tahun Selesai</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tahun_selesai"
                                    name="tahun_selesai"
                                    value="{{ old('tahun_selesai', $pengalaman_kerja->tahun_selesai) }}"
                                    required
                                />
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea
                                    class="form-control"
                                    id="deskripsi"
                                    name="deskripsi"
                                    rows="4"
                                    required
                                >{{ old('deskripsi', $pengalaman_kerja->deskripsi) }}</textarea>
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
