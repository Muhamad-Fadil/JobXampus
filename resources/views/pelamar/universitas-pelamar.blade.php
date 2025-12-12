<x-app-layout-pelamar>
    @section('universitas-pelamar')

    <section class="header text-center mt-5">
        <h1 class="judul-header">Universitas Mitra Unggulan</h1>
        <p class="deskripsi-header">
            Jelajahi pilihan universitas terbaik untuk membuka peluang, memperluas wawasan, dan membentuk masa depan gemilangmu.
        </p>
    </section>

    <section class="container py-5">
        <div class="d-flex align-items-center mb-5 gap-4">
            <h1 class="fw-bold mb-0">Daftar Universitas</h1>
        </div>

        <div class="row">
            <!-- Daftar Universitas -->
            <div class="col-12 col-md-5 mb-4 mb-md-0">
                <div class="list-group" id="list-univ" style="max-height: 500px; overflow-y: auto;">
                    @foreach($universitas as $univ)
                        <div class="list-group-item d-flex align-items-center gap-3 p-3 border rounded shadow-sm mb-3"
                             style="cursor: pointer; transition: background-color 0.3s;"
                             onclick="tampilkanDetail('{{ $univ->id_universitas }}', this)">
                            <img src="{{ asset('img/' . $univ->logo) }}" alt="Logo {{ $univ->nama_universitas }}"
                                 style="width: 80px; height: 80px; object-fit: contain;" />
                            <div class="d-flex flex-column">
                                <h5 class="mb-1 fw-bold text-dark">
                                    <i class="bi bi-mortarboard-fill me-1 text-primary"></i>
                                    {{ $univ->nama_universitas }}
                                </h5>
                                <small class="text-muted">{{ $univ->kota }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Detail Universitas -->
            <div class="col-12 col-md-7">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <div class="card-body" id="detail-univ">
                        @foreach($universitas as $univ)
                            <div class="detail-item" id="detail-{{ $univ->id_universitas }}" style="display: none;">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('img/' . $univ->logo) }}" class="img-fluid" style="max-height: 120px;">
                                </div>
                                <h4 class="fw-bold text-center mb-3">{{ $univ->nama_universitas }}</h4>
                                <p><i class="bi fs-5 bi-info-circle-fill me-2 text-secondary"></i>
                                    <strong>Deskripsi:</strong><br>{{ $univ->deskripsi }}</p>
                                <p><i class="bi fs-5 bi-geo-alt-fill me-2 text-secondary"></i>
                                    <strong>Lokasi:</strong> {{ $univ->alamat }}</p>
                                <p><i class="bi fs-5 bi-envelope-fill me-2 text-secondary"></i>
                                    <strong>Email:</strong> {{ $univ->email }}</p>
                                <p><i class="bi fs-5 bi-globe2 me-2 text-secondary"></i>
                                    <strong>Website:</strong> 
                                    <a href="{{ $univ->alamat_website }}" target="_blank">{{ $univ->alamat_website }}</a>
                                </p>
                                <div class="row g-4 mt-2">
                                    @php
                                        $lowonganUniv = $lowongan->where('id_universitas', $univ->id_universitas);
                                    @endphp

                                    @if($lowonganUniv->count() > 0)
                                        @foreach($lowonganUniv as $l)
                                            <div class="col-md-6" style="cursor: pointer;">
                                                <div class="card-lowongan-coba px-4 bg-white shadow-sm rounded" onclick="window.location.href='{{ route('lowongan-pelamar') }}?lowongan={{ $l->id_lowongan }}'">
                                                    <h5 class="mt-3 mb-1 fw-bold">{{ $l->nama_lowongan }}</h5>
                                                    <p class="deskripsi">{{ $univ->nama_universitas }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted ps-3">Belum ada lowongan terdaftar.</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <h5 class="text-muted" id="default-detail">Klik salah satu universitas untuk melihat detail.</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JS interaksi -->
    <script>
        function tampilkanDetail(id_univ, element) {
            // aktifkan highlight di daftar
            const items = document.querySelectorAll(".list-group-item");
            items.forEach(i => i.classList.remove("active"));
            element.classList.add("active");

            // sembunyikan semua detail
            const detailItems = document.querySelectorAll(".detail-item");
            detailItems.forEach(d => d.style.display = "none");

            // tampilkan detail yang dipilih
            const target = document.getElementById("detail-" + id_univ);
            if (target) {
                target.style.display = "block";
                document.getElementById("default-detail").style.display = "none";
            }
        }
    </script>

    @endsection
</x-app-layout-pelamar>
