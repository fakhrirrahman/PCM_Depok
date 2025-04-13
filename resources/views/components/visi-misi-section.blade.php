<section id="visi-misi" class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="shadow-lg rounded-4 p-5 bg-white">
            <div class="section-title text-center mb-5">
                <h2 class="fw-bold">Visi & Misi</h2>
                <p class="text-muted">Landasan dan arah gerak organisasi kami</p>
            </div>
            <div class="row">
                <!-- Visi -->
                <div class="col-md-6 mb-4">
                    <div class="border rounded-3 p-4 h-100 bg-light-subtle">
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

                <!-- Misi -->
                <div class="col-md-6 mb-4">
                    <div class="border rounded-3 p-4 h-100 bg-light-subtle">
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