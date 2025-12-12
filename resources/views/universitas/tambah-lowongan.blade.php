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
              <h3 class="mb-4 text-center fs-2">Tambah Lowongan</h3>

              <form action="/lowongan/store" method="post" enctype="multipart/form-data">
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
                  />
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" name="kategori" id="kategori" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Design">Design</option>
                        <option value="HR">HR</option>
                        <option value="Legal">Legal</option>
                        <option value="Management">Management</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Logistics">Logistics</option>
                        <option value="General">General</option>
                        <option value="Lainnya">Lainnya</option>
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
                  />
                </div>

                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea
                    class="form-control"
                    id="deskripsi"
                    rows="3"
                    placeholder=""
                    name="deskripsi"
                    required="required"
                  ></textarea>
                </div>

                <div class="mb-3">
                  <label for="waktu_kerja" class="form-label">Waktu Kerja</label>
                  <input
                    class="form-control"
                    id="waktu_kerja"
                    placeholder=""
                    name="waktu_kerja"
                    required="required"
                  />
                </div>

                <div class="mb-3">
                  <label for="kualifikasi" class="form-label"
                    >Kualifikasi</label
                  >
                  <textarea
                    class="form-control"
                    id="kualifikasi"
                    rows="3"
                    placeholder=""
                    name="kualifikasi"
                    required="required"
                  ></textarea>
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
