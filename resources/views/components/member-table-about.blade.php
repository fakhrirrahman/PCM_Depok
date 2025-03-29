<section id="team" class="team py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-4">
            <h2>Beberapa Anggota Pada PCM Depok</h2>
            <p>Kami mempunyai anggota yang banyak datanya bisa dilihat pada daftar anggota</p>
        </div>
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
                        <td>{{ $index + 1 }}</td>
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
    </div>
</section>