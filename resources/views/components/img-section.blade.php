<section class="bg-white text-black py-5">
    <div class="container">
        <div class="row g-4">

            @foreach ($galeri as $gambar)
            <div class="col-md-4">
                <div class="position-relative shadow rounded-4 overflow-hidden" style="height: 300px;">
                    @foreach ($gambar->mediaUrls as $mediaUrl)
                    <img src="{{ $mediaUrl }}" alt="Galeri" class="w-100 h-100 object-fit-cover">
                    @endforeach


                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>