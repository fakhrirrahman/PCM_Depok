<section id="visi-misi" class="py-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-4">
            <h2>Visi & Misi</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Visi</h3>
                <ul>
                    @php
                    $lastVisi = null;
                    @endphp

                    @foreach($visimisi as $vm)
                    @if(!empty($vm->visi))
                    @php $lastVisi = $vm->visi; @endphp
                    <p>{{ $lastVisi }}</p>
                    @endif
                    @endforeach
                </ul>
            </div>


            <div class="col-md-6">
                <h3>Misi</h3>
                <ul>
                    @php
                    $lastMisi = null;
                    @endphp

                    @foreach($visimisi as $vm)
                    @if(!empty($vm->misi))
                    @php $lastMisi = $vm->misi; @endphp
                    @endif

                    @if($lastMisi !== null)
                    <li>{{ $lastMisi }}</li>
                    @endif
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</section>