<section id="team" class="team py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-4">
            <h2>Anggota PCM Depok</h2>
            <p>Kami mempunyai anggota yang banyak datanya bisa dilihat pada selengkapnya</p>
        </div>
        <form method="GET" action="{{ route('anggota') }}" class="mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group shadow-sm">
                        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Profesi</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Tahun Pembuatan</th>
                        {{-- <th>NBM</th>
                        <th>NBM Depan</th> --}}
                        <th>Cabang</th>
                        {{-- <th>PDM</th>
                        <th>PWM</th> --}}
                        <th>Alamat</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Kelurahan</th>
                        <th>No HP</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $index => $member)
                    <tr>
                        <td>{{ $anggota->firstItem() + $index }}</td>
                        <td>{{ $member->nama }}</td>
                        <td>{{ $member->profesi }}</td>
                        <td>{{ $member->tempat_lahir }}</td>
                        <td>{{ $member->tanggal_lahir }}</td>
                        <td>{{ $member->tahun_pembuatan }}</td>
                        {{-- <td>{{ $member->nbm }}</td>
                        <td>{{ $member->nbm_depan }}</td> --}}
                        <td>{{ $member->cabang }}</td>
                        {{-- <td>{{ $member->pdm }}</td>
                        <td>{{ $member->pwm }}</td> --}}
                        <td>{{ $member->alamat }}</td>
                        <td>{{ $member->kabupaten_tinggal }}</td>
                        <td>{{ $member->provinsi_tinggal }}</td>
                        <td>{{ $member->kelurahan }}</td>
                        <td>{{ $member->no_hp }}</td>
                        <td>{{ $member->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center flex-wrap responsive">
            <nav class="w-100 text-center overflow-auto">
                <ul class="pagination pagination-white justify-content-center">
                    {!! $anggota->appends(['search' => request('search')])->links('pagination::bootstrap-4') !!}
                </ul>
            </nav>
        </div>


    </div>
</section>