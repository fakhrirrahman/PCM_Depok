<div class="container py-5">
    <div class="row">
        <!-- Main Content (8 columns) -->
        <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="card shadow-sm border-0">
                <!-- Detail Kegiatan Section -->
                <div class="card-body p-4">
                    <h2 class="card-title mb-3 fw-bold">{{ $kegiatan->nama_kegiatan }}</h2>
                    <ul class="list-unstyled mb-3">
                        <li class="mb-2">
                            <i class="bi bi-calendar-event me-2"></i>
                            <strong>Tanggal:</strong> {{ $kegiatan->tanggal }}
                        </li>
                        <li>
                            <i class="bi bi-geo-alt me-2"></i>
                            <strong>Lokasi:</strong> {{ $kegiatan->lokasi }}
                        </li>
                    </ul>
                    <div class="border-top pt-3">
                        <p class="card-text">{{ $kegiatan->deskripsi }}</p>
                    </div>
                </div>

                <!-- Galeri Foto Kegiatan Section -->
                <div class="card-body p-4 border-top">
                    <h4 class="mb-3 fw-semibold">
                        <i class="bi bi-images me-2"></i>Galeri Kegiatan
                    </h4>

                    @if (!empty($kegiatan->mediaUrls) && count($kegiatan->mediaUrls) > 0)
                    <div class="row g-2">
                        @foreach ($kegiatan->mediaUrls as $index => $url)
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $index }}">
                                <div class="border rounded overflow-hidden" style="height: 120px;">
                                    <img src="{{ $url }}" class="img-fluid w-100 h-100" style="object-fit: cover;"
                                        alt="Foto Kegiatan">
                                </div>
                            </a>
                        </div>

                        <!-- Modal untuk Zoom Gambar -->
                        <div class="modal fade" id="fotoModal{{ $index }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <img src="{{ $url }}" class="img-fluid w-100" alt="Foto Kegiatan">
                                    </div>
                                    <div class="modal-footer justify-content-center border-top py-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-dismiss="modal">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-3">
                        <img src="{{ asset('default.png') }}" class="img-fluid rounded" style="max-height: 150px;"
                            alt="Default Image">
                        <p class="text-muted mt-2">Belum ada foto kegiatan tersedia.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Kegiatan Lainnya (4 columns) -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="fw-semibold mb-3">
                        <i class="bi bi-collection me-2"></i>Kegiatan Lainnya
                    </h4>

                    <div class="list-group list-group-flush">
                        @foreach($semuaKegiatan->where('id', '!=', $kegiatan->id)->take(3) as $kegiatanLain)
                        <a href="{{ route('kegiatan.show', $kegiatanLain->id) }}"
                            class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex align-items-center">
                                @if($kegiatanLain->mediaUrls && count($kegiatanLain->mediaUrls) > 0)
                                <img src="{{ $kegiatanLain->mediaUrls[0] }}" class="rounded me-3" width="60" height="60"
                                    style="object-fit: cover;" alt="{{ $kegiatanLain->nama_kegiatan }}">
                                @else
                                <img src="{{ asset('default.png') }}" class="rounded me-3" width="60" height="60"
                                    style="object-fit: cover;" alt="Default Image">
                                @endif
                                <div>
                                    <h6 class="mb-1 fw-semibold">{{ $kegiatanLain->nama_kegiatan }}</h6>
                                    <small class="text-muted">{{ $kegiatanLain->tanggal }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    @if($semuaKegiatan->count() > 1)
                    <div class="text-center mt-3">
                        <a href="{{ route('kegiatan.semua') }}" class="btn btn-outline-primary btn-sm">Lihat Semua
                            Kegiatan</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>