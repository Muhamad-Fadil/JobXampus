<x-app-layout-universitas>
  @section('list-karyawan')
    <div class="header-top d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
        <h2 class="fw-bold header-univ">List Karyawan</h2>
    </div>

    <div class="row g-4">
      @forelse ($lamaran as $item)
      <div class="col-md-6">
        <div class="job-card position-relative border rounded p-3 shadow-sm">
          <div class="d-flex gap-3 align-items-center mb-3">
            @if ($item->pelamar->profile_pic)
              <img src="{{ asset('img/' . $item->pelamar->profile_pic) }}" alt="Profile Picture"
                  class="img-thumbnail rounded"
                  style="width: 80px; height: 80px; object-fit: cover;" />
            @else
              <div class="text-muted">Foto belum diunggah</div>
            @endif
            <h4 class="mb-0">{{ $item->pelamar->nama }}</h4>
          </div>
          <p>
            <i class="bi bi-building me-1"></i>
            <strong>Pekerjaan: </strong> {{ $item->lowongan->nama_lowongan }}
          </p>
          <p>
            <i class="bi bi-person-vcard me-1"></i>
            <strong>Jabatan: </strong>{{ $item->lowongan->jabatan }}
          </p>
          <p>
            <i class="bi bi-clock me-1"></i>
            <strong>Waktu Kerja: </strong>{{ $item->lowongan->waktu_kerja }}
          </p>
          <p>
            <i class="bi bi-cash me-1"></i>
            <strong>Gaji: </strong>Rp. {{ number_format($item->lowongan->gaji, 0, ',', '.') }}
          </p>
        </div>
      </div>
      @empty
        <p class="text-muted">Belum ada karyawan.</p>
      @endforelse
    </div>
  @endsection
</x-app-layout-universitas>