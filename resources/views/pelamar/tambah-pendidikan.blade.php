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
              <h3 class="mb-4 text-center fs-2">Tambah Pendidikan</h3>

                <form action="{{ route('pendidikan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nama_institusi" class="form-label"
                    >Nama Institusi</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="nama_institusi"
                    placeholder=""
                    name="nama_institusi"
                    required="required"
                  />
                </div>

                <div class="mb-3">
                  <label for="jurusan" class="form-label"
                    >Jurusan</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="jurusan"
                    placeholder=""
                    name="jurusan"
                    required="required"
                  />
                </div>


                <div class="mb-3">
                  <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                  <input
                    class="form-control"
                    id="tahun_masuk"
                    placeholder=""
                    name="tahun_masuk"
                    required="required"
                  />
                </div>
                
                <div class="mb-3">
                  <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                  <input
                    class="form-control"
                    id="tahun_lulus"
                    placeholder=""
                    name="tahun_lulus"
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
