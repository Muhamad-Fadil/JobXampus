<x-app-layout-pelamar>
    @section('lowongan-pelamar')
    
      <section class="header text-center mt-5">
        <h1 class="judul-header">Lowongan di Kampus</h1>
        <p class="deskripsi-header">Jelajahi berbagai lowongan pekerjaan menarik yang tersedia di kampusmu!</p>
      </section>

      <section class="container py-5">
        <div class="d-flex align-items-center mb-5 gap-4">
          <h1 class="fw-bold mb-0">Daftar Lowongan</h1>
        </div>
        <div class="mb-4">
          <select id="filterKategori" class="form-select w-auto mb-4" onchange="filterKategori()">
            <option value="Semua">Semua Kategori</option>
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
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show mt-5 mx-5" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show mt-5 mx-5" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        <div class="row">
          <!-- Kolom kiri -->
          <div class="col-12 col-md-5 mb-4 mb-md-0">
            <div id="daftar-lowongan" style="max-height: 500px; overflow-y: auto;">
              @foreach($lowongan as $l)
              <div class="mb-3"
                  onclick="tampilkanDetail('{{ $l->id_lowongan }}', this)" 
                  data-kategori="{{ strtolower($l->kategori ?? 'lainnya') }}"
                  style="cursor: pointer;">
                <div class="card h-100 shadow-sm border-0 p-3">
                  <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('img/' . ($l->universitas->logo ?? 'default.png')) }}"
                        alt="Logo Universitas"
                        style="width: 70px; height: 70px; object-fit: contain;">
                    <div>
                      <h5 class="fw-bold mb-1 text-dark">{{ $l->nama_lowongan }}</h5>
                      <small class="text-muted">{{ $l->universitas->nama_universitas ?? '-' }}</small><br>
                      <span class="badge bg-secondary text-capitalize mt-1">{{ $l->kategori ?? 'Lainnya' }}</span>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Kolom kanan -->
          <div class="col-12 col-md-7">
            <div class="card shadow-sm border-0 rounded-4 p-4">
              <div class="card-body" id="detail-lowongan">
                @foreach($lowongan as $l)
                <div id="detail-{{ $l->id_lowongan }}" class="d-none">
                  <h4 class="fw-bold">{{ $l->nama_lowongan }}</h4>
                  <p class="text-muted">{{ $l->universitas->nama_universitas ?? '' }} • {{ $l->universitas->kota ?? '' }}</p>
                  <span class="badge bg-primary mb-2">{{ $l->waktu_kerja }}</span>
                  <ul class="list-unstyled">
                    <li><strong>Jabatan:</strong> {{ $l->jabatan }}</li>
                    <li><strong>Website:</strong> <a href="{{ $l->universitas->alamat_website }}" target="_blank">{{ $l->universitas->alamat_website }}</a></li>
                    <li><strong>Deskripsi:</strong> {{ $l->deskripsi }}</li>
                    <li><strong>Kualifikasi:</strong> {{ $l->kualifikasi }}</li>
                    <li><strong>Gaji:</strong> Rp{{ number_format($l->gaji, 0, ',', '.') }}</li>
                  </ul>
                  <form action="{{ route('lamar.lowongan', ['id' => $l->id_lowongan]) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary">Lamar Sekarang</button>
                  </form>
                </div>
                @endforeach
                <h6 class="text-muted" id="default-text">Klik salah satu lowongan untuk melihat detail.</h6>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>
        function tampilkanDetail(id, element = null) {
          const semuaDetail = document.querySelectorAll('#detail-lowongan > div');
          semuaDetail.forEach((el) => el.classList.add('d-none'));

          const detail = document.getElementById('detail-' + id);
          if (detail) {
            detail.classList.remove('d-none');
          }

          const items = document.querySelectorAll('.list-group-item');
          items.forEach((el) => el.classList.remove('active'));

          // Kalau element diberikan (dari klik user), highlight langsung
          if (element) {
            element.classList.add('active');
          } else {
            // Kalau tidak, cari item dari id (dipakai saat redirect)
            const autoItem = document.querySelector(`[onclick*="${id}"]`);
            if (autoItem) {
              autoItem.classList.add('active');
              autoItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
          }

          const defaultText = document.getElementById('default-text');
          if (defaultText) {
            defaultText.classList.add('d-none');
          }
        }

        function filterKategori() {
        const selectedKategori = document.getElementById('filterKategori').value.toLowerCase();
        const daftarLowongan = document.querySelectorAll('#daftar-lowongan > div');

        daftarLowongan.forEach(item => {
          const kategori = (item.getAttribute('data-kategori') || 'lainnya').toLowerCase(); 
          const id = item.getAttribute('onclick').match(/'(\d+)'/)[1];
          const detail = document.getElementById('detail-' + id);

          if (selectedKategori === 'semua' || kategori === selectedKategori) {
            item.style.display = '';
          } else {
            item.style.display = 'none';
            if (detail) detail.classList.add('d-none');
          }
        });

        document.querySelectorAll('#detail-lowongan > div').forEach(el => el.classList.add('d-none'));
        document.getElementById('default-text')?.classList.remove('d-none');
      }



        // Jalankan otomatis saat halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", function () {
          const params = new URLSearchParams(window.location.search);
          const idLowongan = params.get("lowongan");
          const kategori = params.get("kategori");

          // Set dropdown kategori jika ada di URL
          if (kategori) {
            const select = document.getElementById('filterKategori');
            if (select) {
              select.value = kategori;
              filterKategori();
            }
          }

          // Tampilkan detail lowongan jika ada id di URL
          if (idLowongan) {
            tampilkanDetail(idLowongan);
          }
        });
      </script>

      @endsection
</x-app-layout-pelamar>
