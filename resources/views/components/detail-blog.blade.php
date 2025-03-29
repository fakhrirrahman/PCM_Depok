<section class="kegiatan-detail section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    @if(!empty($kegiatan->mediaUrls))
                    <img src="{{ $kegiatan->mediaUrls[0] }}" class="img-fluid w-60 h-40 object-fit-cover"
                        alt="{{ $kegiatan->title }}">
                    @else
                    <img src="{{ asset('default.png') }}" class="img-fluid w-100 h-100 object-fit-cover"
                        alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{ $kegiatan->nama_kegiatan }}</h3>
                        <p class="card-text">{{ $kegiatan->deskripsi }}</p>
                        <p><strong>Tanggal:</strong> {{ $kegiatan->tanggal }}</p>
                        <p><strong>Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-3">
                    <h5>Informasi Lainnya</h5>
                    <p><strong>Penyelenggara:</strong> Pimpinan Cabang Muhammadiyah Depok</p>
                    <p><strong>Anggota yang ikut:</strong>
                        @foreach($kegiatan->anggota as $anggota)
                        {{ $anggota->nama }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </p>

                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('kegiatan') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</section>