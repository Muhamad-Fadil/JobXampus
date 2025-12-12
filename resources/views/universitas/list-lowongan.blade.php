<x-app-layout-universitas>
  @section('list-lowongan')
    <div class="header-top d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-1 mb-4">
        <h2 class="fw-bold header-univ">List Lowongan</h2>
        <a href="{{ route('lowongan.tambah') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Lowongan
        </a>
    </div>

    <div class="row g-4">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @forelse ($lowongan as $low)
      <div class="col-12 col-md-6">
        <div class="job-card position-relative border rounded p-3 shadow-sm">
<div class="position-relative">
  <h5 class="pe-5">{{ $low->nama_lowongan }}</h5>
  <div class="position-absolute top-0 end-0 d-flex gap-2">
    <a href="{{ route('lowongan.edit', $low->id_lowongan) }}" class="text-primary" title="Edit">
      <i class="bi bi-pencil-square"></i>
    </a>
    <form action="{{ route('lowongan.hapus', $low->id_lowongan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Hapus">
        <i class="bi bi-trash-fill"></i>
      </button>
    </form>
  </div>
</div>
          <p>
            <i class="bi bi-building me-1"></i>
            <strong>Universitas: </strong> {{ $low->universitas->nama_universitas }}
          </p>
          <p>
            <i class="bi bi-tag me-1"></i>
            <strong>Kategori: </strong> {{ $low->kategori }}
          </p>
          <p>
            <i class="bi bi-person-vcard me-1"></i>
            <strong>Jabatan: </strong>{{ $low->jabatan }}
          </p>
          <p>
            <i class="bi bi-clock me-1"></i>
            <strong>Waktu Kerja: </strong>{{ $low->waktu_kerja }}
          </p>
          <p>
            <i class="bi bi-stars me-1"></i>
            <strong>Kualifikasi: </strong>{{ $low->kualifikasi }}
          </p>
          <p>
            <i class="bi bi-cash me-1"></i>
            <strong>Gaji: </strong>Rp. {{ number_format($low->gaji, 0, ',', '.') }}
          </p>
          <p class="text-muted small">
            <i class="bi bi-text-left me-1"></i> {{ $low->deskripsi }}
          </p>
        </div>
      </div>
      @empty
        <p class="text-muted">Belum ada lowongan.</p>
      @endforelse
    </div>
  @endsection
</x-app-layout-universitas>
