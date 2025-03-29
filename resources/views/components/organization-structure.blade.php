<section id="struktur-organisasi" class="struktur-organisasi section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Hierarki Organisasi</h2>
            <p class="text-muted">Struktur organisasi yang jelas untuk efektivitas dan koordinasi tim.</p>
        </div>
        <div class="row gy-4">
            @foreach ($StrukturOrganisasi as $member)
            <div class="col-md-4">
                <div class="card shadow-lg text-center p-4">
                    <div class="card-body">
                        <i class="fas {{ $member['icon'] }} fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">{{ $member['nama'] }}</h5>
                        <p class="card-text text-muted">{{ $member['jabatan'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>