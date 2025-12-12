<x-app-layout-pelamar>
    @section('home-pelamar')
    <section>
        <div class="d-flex justify-content-center carosel">
          <div id="carouselExampleIndicators" class="carousel slide w-100">
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../img/carousel-1.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../img/carousel-2.jpg" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="../img/carousel-3.jpg" class="d-block w-100" alt="..." />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="judul-client text-center">
            @if (session('success-login'))
              <div class="alert alert-success alert-dismissible fade show mt-5 mx-5" role="alert">
                  {{ session('success-login') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        <h2>Universitas Mitra Kami</h2>
        <p>Kami telah menjalin kerja sama dengan berbagai universitas ternama di Indonesia.</p>
      </div>
      <div class="client">
        <div class="container">
            <div
            class="row justify-content-center align-items-center text-center g-4"
            >
            <div class="col-4 col-sm-3 col-md-2">
              <img
              src="../img/itb.png"
              alt="Avoksin"
              class="img-fluid brand-logo"
              />
            </div>
            <div class="col-4 col-sm-3 col-md-2">
              <img src="../img/unpad.png" alt="Emina" class="img-fluid brand-logo" />
            </div>
            <div class="col-4 col-sm-3 col-md-2">
              <img
              src="../img/ipb.png"
              alt="La Tulipe"
              class="img-fluid brand-logo"
              />
            </div>
            <div class="col-4 col-sm-3 col-md-2">
              <img src="../img/ugm.png" alt="Safi" class="img-fluid brand-logo" />
            </div>
            <div class="col-4 col-sm-3 col-md-2">
              <img
              src="../img/ui.png"
              alt="Wardah"
              class="img-fluid brand-logo"
              />
            </div>
            <div class="col-4 col-sm-3 col-md-2">
              <img
              src="../img/brawijaya.png"
              alt="Shopie"
              class="img-fluid brand-logo"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="judul-lowongan text-center">
        <h2>Job Favorit Mahasiswa</h2>
        <p>Lowongan kerja yang banyak dicari lulusan baru.</p>
      </div>

      <div class="container my-5">
        <div class="row g-4">
          @foreach($lowongan as $item)
          <div class="col-md-6 col-lg-4">
            <div class="job-card job-card-dark">
              <img src="{{ asset('img/' . ($item->universitas->logo ?? 'default.png')) }}" alt="Logo {{ $item->universitas->nama_universitas }}" class="univ-logo" />
              <div class="univ-name">{{ $item->universitas->nama_universitas }}</div>
              <div class="job-title">{{ $item->nama_lowongan }}</div>
              <div class="job-field">{{ $item->bidang }}</div>
              <div class="learn-more" onclick="window.location.href='{{ route('lowongan-pelamar') }}?lowongan={{ $item->id_lowongan }}'" style="cursor: pointer;">
                <i class="bi bi-arrow-right-circle"></i> Pelajari lebih lanjut
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

    </section>

    <section class="py-5">
      <div class="container">
        <h2 class="text-center mb-5 fw-bold">Tips & Artikel Karier</h2>
        <div class="row text-center">
          <div class="col-md-4">
            <h5><a href="https://youtu.be/5UFhwdpbhGk?si=HIYjPpoVtzLHdeBM" target="_blank">Cara Membuat CV yang Menarik</a></h5>
            <p>Pelajari bagaimana membuat CV yang menonjol di mata HRD.</p>
          </div>
          <div class="col-md-4">
            <h5><a href="https://youtu.be/9WsRvH1BSJQ?si=3sltW_TYE6UEzUzF" target="_blank">Tips Lolos Interview Kerja</a></h5>
            <p>Persiapkan diri menghadapi wawancara kerja dengan percaya diri.</p>
          </div>
          <div class="col-md-4">
            <h5><a href="https://suteki.co.id/peran-pusat-karir-di-perguruan-tinggi-bagi-mahasiswa/" target="_blank">Karier di Dunia Kampus</a></h5>
            <p>Kenali berbagai peluang kerja di lingkungan universitas.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="text-center py-5" style="background-color: #00adb5; color: white;">
      <div class="container">
        <h2 class="fw-bold mb-3">Siap Mulai Kariermu?</h2>
        <p class="fs-5">Buat akun dan temukan peluang terbaik dari berbagai universitas mitra kami.</p>
        <a href="/lowongan-pelamar" class="btn btn-outline-light btn-lg mt-3 rounded-pill px-4 py-2">
          Lamar Sekarang
        </a>
      </div>
    </section>
    @endsection
</x-app-layout-pelamar>