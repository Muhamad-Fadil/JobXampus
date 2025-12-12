<x-app-layout-universitas>
    @section('home-universitas')
<!-- Header Atas -->
          <div class="header-top mb-4 d-flex flex-wrap justify-content-between align-items-start align-items-md-center">
            <h2 class="fw-bold header-univ mb-3 mb-md-0">Overview</h2>
            <div class="user-section d-flex flex-wrap gap-2 justify-content-end align-items-center w-100 w-md-auto">
              <form method="GET" action="{{ route('home-universitas') }}" class="d-flex align-items-center flex-md-grow-0">
                  <input
                      type="text"
                      name="search"
                      class="form-control input-search w-100"
                      placeholder="Search"
                      value="{{ request('search') }}"
                  />
                  <button type="submit" class="btn btn-outline-secondary ms-2"><i class="bi bi-search"></i></button>
              </form>
            </div>
          </div>

            @if (session('success-login'))
              <div class="alert alert-success alert-dismissible fade show mt-5 mx-5" role="alert">
                  {{ session('success-login') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

          @if(request('search'))
            {{-- Kalau sedang search --}}
            @if($lowongan->count())
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title mb-4">
                    <i class="bi bi-search me-2"></i>Hasil Pencarian untuk: "{{ request('search') }}"
                  </h5>
                  <ul class="list-group list-group-flush">
                    @foreach ($lowongan as $low)
                      <li class="list-group-item py-2 px-3">
                        <div class="mb-1">
                          <div class="job-title fw-semibold">{{ $low->nama_lowongan }}</div>
                          <div class="job-subtitle text-muted small">Jabatan: {{ $low->jabatan }}</div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @else
              <div class="alert alert-warning mt-4">
                Tidak ditemukan lowongan dengan kata kunci: <strong>{{ request('search') }}</strong>
              </div>
            @endif
            @else
            {{-- Kalau tidak sedang search, tampilkan lowongan terbaru --}}
            @if ($lowonganTerbaru->count())
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title mb-4">
                    <i class="bi bi-briefcase-fill me-2"></i>List Lowongan Terbaru
                  </h5>
                  <ul class="list-group list-group-flush">
                    @foreach ($lowonganTerbaru as $low)
                      <li class="list-group-item py-2 px-3">
                        <div class="mb-1">
                          <div class="job-title fw-semibold">{{ $loop->iteration }} . {{ $low->nama_lowongan }}</div>
                          <div class="job-subtitle text-muted small">Jabatan: {{ $low->jabatan }}</div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endif
          @endif
        </div>
      </div>
    @endsection
</x-app-layout-universitas>