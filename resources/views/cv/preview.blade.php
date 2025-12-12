<!DOCTYPE html>
<html>
<head>
    <title>CV {{ $pelamar->nama }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            padding: 2rem;
            color: #333;
        }

        .cv-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .profile-pic {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #00adb5;
        }

        .cv-header {
            border-bottom: 3px solid #00adb5;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .section-title {
            color: #00adb5;
            margin-top: 2rem;
            border-bottom: 1px solid #ccc;
            padding-bottom: 0.3rem;
        }

        .cv-entry {
            margin-bottom: 1rem;
        }

        .no-data {
            color: #888;
            font-style: italic;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .biodata p {
            margin: 0;
            line-height: 1.5;
        }

        .biodata strong {
            width: 140px;
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="container cv-container">
        <div class="cv-header">
            <div class="profile-info">
                @if($pelamar->profile_pic)
                    <img src="{{ asset('img/' . $pelamar->profile_pic) }}" alt="Profile Picture" class="profile-pic" />
                @else
                    <img src="{{ public_path('default_profile.jpg') }}" class="profile-pic" alt="Foto Default">
                @endif
                <div>
                    <h1 class="mb-0">{{ $pelamar->nama }}</h1>
                    <p class="text-muted mb-1">{{ $pelamar->email }}</p>
                </div>
            </div>
        </div>

        <h4 class="section-title">Biodata</h4>
        <div class="biodata">
            <p><strong>Alamat:</strong> {{ $pelamar->alamat ?? '-' }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $pelamar->tanggal_lahir ?? '-' }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $pelamar->jenis_kelamin ?? '-' }}</p>
            <p><strong>Agama:</strong> {{ $pelamar->agama ?? '-' }}</p>
            <p><strong>Status:</strong> {{ $pelamar->status ?? '-' }}</p>
        </div>

        <h4 class="section-title">Tentang Saya</h4>
        <p>{{ $pelamar->ringkasan_profil ?? '-' }}</p>

        <h4 class="section-title">Pengalaman Kerja</h4>
        @forelse ($pengalamanKerja as $item)
            <div class="cv-entry">
                <strong>{{ $item->posisi }} | </strong>
                <span>{{ $item->nama_instansi }} | {{ $item->tahun_mulai }} - {{ $item->tahun_selesai }}</span>
                <p>{{ $item->deskripsi }}</p>
            </div>
        @empty
            <p class="no-data">Tidak ada pengalaman kerja.</p>
        @endforelse

        <h4 class="section-title">Pendidikan</h4>
        @forelse ($pendidikan as $item)
            <div class="cv-entry">
                <strong>{{ $item->jurusan }} | </strong>
                <span>{{ $item->nama_institusi }} | {{ $item->tahun_masuk }} - {{ $item->tahun_lulus }}</span>
            </div>
        @empty
            <p class="no-data">Tidak ada pendidikan.</p>
        @endforelse
    </div>

</body>
</html>
