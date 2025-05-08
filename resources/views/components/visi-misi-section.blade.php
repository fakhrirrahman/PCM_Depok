<section id="tentang-kami" class="py-5 bg-white">
    <div class="container" data-aos="fade-up">
        <div class="p-4 bg-light">
            <div class="section-title text-center">
                <h2 class="fw-bold">Tentang Kami</h2>
                <p class="text-muted">Profil Singkat Pimpinan Cabang Muhammadiyah Depok</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <p class="text-muted fs-5">
                        Pimpinan Cabang Muhammadiyah (PCM) Depok merupakan bagian dari organisasi Muhammadiyah yang
                        bergerak dalam bidang keagamaan, pendidikan, sosial, dan kemasyarakatan di wilayah Depok.
                        Dengan berlandaskan pada nilai-nilai Islam yang berkemajuan, PCM Depok berkomitmen untuk
                        memberikan kontribusi nyata dalam pembangunan umat dan bangsa melalui berbagai program
                        strategis.
                    </p>
                    <p class="text-muted fs-5">
                        Melalui kolaborasi antar amal usaha Muhammadiyah, kader, dan masyarakat luas, kami terus
                        mengembangkan dakwah dan pemberdayaan masyarakat secara berkelanjutan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="video-profil" class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="p-4 bg-white">
            <div class="section-title text-center mb-4">
                <h2 class="fw-bold">Video Profil</h2>
                <p class="text-muted">Saksikan profil singkat PCM Depok dalam video berikut:</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/UnOuI5kht2k" title="Video Profil PCM Depok"
                            allowfullscreen
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="visi-misi" class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="p-4 bg-white">
            <div class="section-title text-center mb-5">
                <h2 class="fw-bold">Visi & Misi</h2>
                <p class="text-muted">Landasan dan arah gerak organisasi kami</p>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="border p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-eye-fill fs-4 text-primary me-2"></i>
                            <h4 class="mb-0 fw-semibold">Visi</h4>
                        </div>
                        @php $lastVisi = null; @endphp
                        @foreach($visimisi as $vm)
                        @if(!empty($vm->visi))
                        @php $lastVisi = $vm->visi; @endphp
                        @endif
                        @endforeach
                        @if($lastVisi)
                        <p class="mt-2 text-muted">{{ $lastVisi }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="border p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-bullseye fs-4 text-success me-2"></i>
                            <h4 class="mb-0 fw-semibold">Misi</h4>
                        </div>
                        <ul class="list-unstyled mt-2">
                            @foreach($visimisi as $vm)
                            @if(!empty($vm->misi))
                            <li class="mb-2 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                <span class="text-muted">{{ $vm->misi }}</span>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>