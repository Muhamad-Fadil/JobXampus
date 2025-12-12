<x-app-layout-pelamar>
    @section('profile-pelamar')
<div class="container py-4" style="margin-top: 5rem">
      <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-md-3 container-side">
          <div class="text-center mb-3">
            @if ($pelamar->profile_pic)
                    <img src="{{ asset('img/' . $pelamar->profile_pic) }}" alt="Profile Picture" class="profile-pic" />
                @else
                    <h6>Foto belum diunggah</h6>
                @endif
            <h5 class="my-3">{{ $pelamar->nama }}</h5>
          </div>
          <div class="d-grid gap-2 mb-3">
            <a href="{{ route('cv.preview') }}" class="btn btn-cv" target="_blank">Preview CV</a>
            <a href="{{ route('cv.download') }}" class="btn btn-secondary mt-2">Download CV</a>
          </div>
          <div class="left-nav p-2" id="sidebar">
            <div class="sidebar-item active" data-target="biodata">
              <i class="bi bi-person-vcard-fill me-3"></i>Biodata Diri
            </div>
            <div class="sidebar-item" data-target="pengalaman">
              <i class="bi bi-laptop me-3"></i>Pengalaman Kerja
            </div>
            <div class="sidebar-item" data-target="pendidikan">
              <i class="bi bi-backpack me-3"></i>Pendidikan
            </div>
            <div class="sidebar-item" data-target="cv">
              <i class="bi bi-file-earmark me-3"></i>CV
            </div>
          </div>
        </div>

        <!-- Main Section -->
        <div class="col-md-9 container-right">
          <!-- Dynamic Content Area -->
          <div id="content">
            <!-- Biodata Section -->
            <div class="card-section content-section active" id="biodata">
              <div class="d-flex justify-content-between mb-3">
                <h5>Biodata Diri</h5>
                  @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                <a href="{{ route('edit-pelamar') }}" style="color: #00adb5"
                  ><i class="bi bi-pencil"></i> Edit</a
                >
              </div>
              <div class="d-flex align-items-center mb-3">
                @if ($pelamar->profile_pic)
                    <img src="{{ asset('img/' . $pelamar->profile_pic) }}" alt="Profile Picture" class="profile-pic me-3" />
                @else
                    <h6>Foto belum diunggah</h6>
                @endif


                <div>
                  <h6 class="mb-0">{{ $pelamar->nama }}</h6>
                  <small class="text-muted"
                    >{{ $pelamar->email }}</small
                  >
                </div>
              </div>
              <div class="row py-1">
                <div class="col-md-6">
                  <strong>Alamat</strong>
                  <p>
                    {{ $pelamar->alamat }}
                  </p>
                </div>
                <div class="col-md-3">
                  <strong>Tanggal Lahir</strong>
                  <p>{{ $pelamar->tanggal_lahir }}</p>
                </div>
                <div class="col-md-3">
                  <strong>Jenis Kelamin</strong>
                  <p>{{ $pelamar->jenis_kelamin }}</p>
                </div>
              </div>
              <div class="row py-1">
                <div class="col-md-6">
                  <strong>Agama</strong>
                  <p>{{ $pelamar->agama }}</p>
                </div>
                <div class="col-md-6">
                  <strong>Status</strong>
                  <p>{{ $pelamar->status }}</p>
                </div>
              </div>
              <div class="py-1">
                <strong>Ringkasan Profile</strong>
                <p>
                  {{ $pelamar->ringkasan_profil }}
                </p>
              </div>
            </div>

            <!-- Pengalaman Section -->
            <!-- Pengalaman Kerja -->
            <div class="card-section content-section" id="pengalaman">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-1 mb-4">
                <h5>Pengalaman Kerja</h5>
                  @if(session('success-pengalaman'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success-pengalaman') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                <div>
                  <a href="{{ route('pengalaman.tambah') }}" style="color: #00adb5; text-decoration: none; margin-right: 10px">
                    <i class="bi bi-plus-square"></i> Tambah
                  </a>
                </div>
              </div>

              <ul class="list-group list-group-flush">
                @if ($pengalamanKerja->isEmpty())
                  <li class="list-group-item">Belum ada pengalaman kerja.</li>
                @else
                  @foreach ($pengalamanKerja as $pengalaman)   
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div>
                        <strong>{{ $pengalaman->posisi }}</strong><br />
                        {{ $pengalaman->nama_instansi }} – {{ $pengalaman->tahun_mulai }} – {{ $pengalaman->tahun_selesai }}<br />
                        <small>{{ $pengalaman->deskripsi }}</small>
                      </div>
                      <div class="d-flex align-items-start gap-2">
                        <a href="{{ route('pengalaman.edit', $pengalaman->id_pengalaman) }}" style="color: #00adb5;" title="Edit">
                          <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('pengalaman.hapus', $pengalaman->id_pengalaman) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengalaman ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-link btn-sm text-danger p-0" title="Hapus">
                            <i class="bi bi-trash-fill"></i>
                          </button>
                        </form>
                      </div>
                    </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <!-- Pendidikan Section -->
            <div class="card-section content-section" id="pendidikan">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-1 mb-4">
                <h5>Pendidikan</h5>
                  @if(session('success-pendidikan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success-pendidikan') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                <div>
                  <a href="{{ route('pendidikan.tambah') }}" style="color: #00adb5; text-decoration: none; margin-right: 10px">
                    <i class="bi bi-plus-square"></i> Tambah
                  </a>
                </div>
              </div>
              <ul class="list-group list-group-flush">
                 @if ($pendidikan->isEmpty())
                  <li class="list-group-item">Belum ada Pendidikan.</li>
                @else
                  @foreach ( $pendidikan as $pendi)
                  <li class="list-group-item d-flex justify-content-between align-items-start"> 
                    <div>
                      <strong>{{$pendi->jurusan}}</strong><br />
                      {{ $pendi->nama_institusi }}, {{ $pendi->tahun_masuk }} – {{ $pendi->tahun_lulus }}
                    </div>
                    <div class="d-flex align-items-start gap-2">
                        <a href="{{ route('pendidikan.edit', $pendi->id_pendidikan) }}" style="color: #00adb5;" title="Edit">
                          <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('pendidikan.hapus', $pendi->id_pendidikan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pendidikan ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-link btn-sm text-danger p-0" title="Hapus">
                            <i class="bi bi-trash-fill"></i>
                          </button>
                        </form>
                      </div>
                  </li>
                  @endforeach
                @endif
              </ul>
            </div>

            <!-- CV Section -->
            <div class="card-section content-section" id="cv">
              <h5>CV</h5>
                    @if(session('success-cv'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success-cv') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

              {{-- Info CV Terakhir --}}
              <p>
                  File CV terakhir:
                  @if ($pelamar->cv_file && file_exists(public_path($pelamar->cv_file)))
                      <a href="{{ asset($pelamar->cv_file) }}" class="btn btn-primary" target="_blank">
                          {{ basename($pelamar->cv_file) }}
                      </a>
                  @else
                      <span class="text-muted">Belum ada CV</span>
                  @endif
              </p>

              {{-- Form Upload CV --}}
              <form action="{{ route('cv.upload') }}" method="POST" enctype="multipart/form-data" class="mt-2">
                  @csrf
                  <div class="mb-2">
                      <label for="cv_file" class="form-label">Unggah CV Baru (PDF):</label>
                      <input type="file" name="cv_file" id="cv_file" class="form-control" accept=".pdf" required>
                  </div>
                  <button type="submit" class="btn mt-3" style="background-color: #00adb5; color:white">Upload CV Manual</button>
              </form>

              {{-- Tombol Hapus CV --}}
              @if ($pelamar->cv_file)
                  <form action="{{ route('cv.delete') }}" method="POST" class="mt-2" onsubmit="return confirm('Yakin ingin menghapus CV?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Hapus CV</button>
                  </form>
              @endif
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Script -->
    <script>
      const sidebarItems = document.querySelectorAll(".sidebar-item");
      const contentSections = document.querySelectorAll(".content-section");

      sidebarItems.forEach((item) => {
        item.addEventListener("click", () => {
          // Hapus active di sidebar
          sidebarItems.forEach((i) => i.classList.remove("active"));
          item.classList.add("active");

          // Tampilkan section yang dipilih
          const target = item.getAttribute("data-target");
          contentSections.forEach((section) => {
            section.classList.remove("active");
            if (section.id === target) {
              section.classList.add("active");
            }
          });
        });
      });
    </script>
    @endsection
</x-app-layout-pelamar>