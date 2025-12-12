<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JobX</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/crud.css" />
  </head>
  <body>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card shadow-sm rounded-4">
            <div class="card-body p-4">
              <h3 class="mb-4 text-center fs-2">Edit Lowongan</h3>

                <form action="{{ route('lowongan.update', ['id' => $lowongan->id_lowongan]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nama_lowongan" class="form-label"
                    >Nama Lowongan</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="nama_lowongan"
                    placeholder=""
                    name="nama_lowongan"
                    required="required"
                    value="{{ $lowongan->nama_lowongan }}"
                  />
                </div>

                <div class="mb-3">
                  <label for="kategori" class="form-label">Kategori</label>
                  <select class="form-control" id="kategori" name="kategori" required>
                      <option value="IT" {{ $lowongan->kategori == 'IT' ? 'selected' : '' }}>IT</option>
                      <option value="Finance" {{ $lowongan->kategori == 'Finance' ? 'selected' : '' }}>Finance</option>
                      <option value="Marketing" {{ $lowongan->kategori == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                      <option value="Design" {{ $lowongan->kategori == 'Design' ? 'selected' : '' }}>Design</option>
                      <option value="HR" {{ $lowongan->kategori == 'HR' ? 'selected' : '' }}>HR</option>
                      <option value="Legal" {{ $lowongan->kategori == 'Legal' ? 'selected' : '' }}>Legal</option>
                      <option value="Management" {{ $lowongan->kategori == 'Management' ? 'selected' : '' }}>Management</option>
                      <option value="Customer Service" {{ $lowongan->kategori == 'Customer Service' ? 'selected' : '' }}>Customer Service</option>
                      <option value="Logistics" {{ $lowongan->kategori == 'Logistics' ? 'selected' : '' }}>Logistics</option>
                      <option value="General" {{ $lowongan->kategori == 'General' ? 'selected' : '' }}>General</option>
                      <option value="Lainnya" {{ $lowongan->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                  </select>
              </div>

                <div class="mb-3">
                  <label for="jabatan" class="form-label"
                    >Jabatan</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="jabatan"
                    placeholder=""
                    name="jabatan"
                    required="required"
                    value="{{ $lowongan->jabatan }}"
                  />
                </div>

                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input
                    class="form-control"
                    id="deskripsi"
                    placeholder=""
                    name="deskripsi"
                    required="required"
                    value="{{ $lowongan->deskripsi }}"
                  />
                </div>

                <div class="mb-3">
                  <label for="waktu_kerja" class="form-label">Waktu Kerja</label>
                  <input
                    class="form-control"
                    id="waktu_kerja"
                    placeholder=""
                    name="waktu_kerja"
                    required="required"
                    value="{{ $lowongan->waktu_kerja }}"
                  />
                </div>

                <div class="mb-3">
                  <label for="kualifikasi" class="form-label"
                    >Kualifikasi</label
                  >
                  <input
                    class="form-control"
                    id="kualifikasi"
                    placeholder=""
                    name="kualifikasi"
                    required="required"
                    value="{{ $lowongan->kualifikasi }}"
                  />
                </div>

                <div class="mb-3">
                  <label for="gaji" class="form-label"
                    >Gaji</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="gaji"
                    placeholder=""
                    name="gaji"
                    required="required"
                    value="{{ $lowongan->gaji }}"
                  />
                </div>

                <div class="d-grid">
                  <input
                    type="submit"
                    name="simpan"
                    value="Simpan"
                    class="btn mt-3"
                    style="background-color: rgb(57, 62, 70); color: white"
                    />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
