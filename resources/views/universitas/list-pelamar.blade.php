<x-app-layout-universitas>
  @section('list-pelamar')
    <div class="header-top d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
        <h2 class="fw-bold header-univ mb-2 mb-md-0">List Pelamar</h2>
    </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pelamar</th>
                    <th>Lowongan</th>
                    <th>Status</th>
                    <th>CV Pelamar</th>
                    <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach ($lamaran as $item)
                <tr>
                    <td>{{ $item->pelamar->nama ?? '-' }}</td>
                    <td>{{ $item->lowongan->nama_lowongan ?? '-' }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if ($item->pelamar->cv_file)
                        <a href="{{ asset($item->pelamar->cv_file) }}" target="_blank" class="btn btn-primary">
                            Lihat CV
                        </a>
                        @else
                        <span class="text-muted">Tidak ada CV</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 'Menunggu')
                        <form action="{{ url('/lamaran/terima/' . $item->id_lamaran) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-success btn-sm" type="submit">Terima</button>
                        </form>
                        <form action="{{ url('/lamaran/tolak/' . $item->id_lamaran) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Tolak</button>
                        </form>
                        @else
                        <span class="text-muted">Sudah {{ $item->status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</x-app-layout-universitas>
    