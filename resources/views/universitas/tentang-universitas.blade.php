<x-app-layout-universitas>
    @section('tentang-universitas')
    <div class="header-top">
      <h2 class="fw-bold mb-4 header-univ">Tentang Universitas</h2>
    </div>

      <div class="overview-card">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h4 class="fw-semibold mb-3">{{ $universitas->nama_universitas }}</h4>
        <p>{{ $universitas->deskripsi }}</p>

        <hr />

        <div class="row row-cols-1 row-cols-md-2 mt-4">
          <div class="col-md-6 mb-3">
            <p>
              <i class="bi bi-geo-alt-fill icon"></i>
              <strong>Lokasi:</strong> {{ $universitas->alamat }}
            </p>
            <p>
              <i class="bi bi-envelope-fill icon"></i>
              <strong>Email:</strong> {{ $universitas->email }}
            </p>
            <p>
              <i class="bi bi-globe icon"></i>
              <strong>Website:</strong>
              <a href="{{ $universitas->alamat_website }}" target="_blank">{{ $universitas->alamat_website }}</a>
            </p>
          </div>

          <div class="col-md-6 mb-3">
            <p>
              <i class="bi bi-people-fill icon"></i>
              <strong>Kota:</strong> {{ $universitas->kota }}
            </p>
          </div>
        </div>

        <div class="mt-4">
          <a href="{{ route('edit-profile') }}" class="btn btn-primary">Edit Profil</a>
        </div>
      </div>
    @endsection
</x-app-layout-universitas>