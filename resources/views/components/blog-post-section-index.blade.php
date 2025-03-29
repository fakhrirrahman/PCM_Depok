<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">

    <div class="container">
        <div class="row gy-4">
            <div class="section-title text-center mb-4">
                <h2>kegiatan terbaru kami</h2>
                <p>kami melakukan banyak kegiatan selengkapnya pada halaman kegiatan.</p>
            </div>
            @foreach ( $kegiatans as $blog )

            <div class="col-lg-4">
                <article class="position-relative h-100">
                    <div class="post-img position-relative overflow-hidden" style="height: 250px;">

                        @foreach ($blog->mediaUrls as $mediaUrl)
                        <img src={{$mediaUrl}} class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $blog->title }}">
                        @endforeach
                        <span
                            class="post-date position-absolute bottom-0 end-0 bg-success text-white px-2 py-1 small">{{
                            $blog->tanggal }}</span>
                    </div>


                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title">{{ $blog->nama_kegiatan}}</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Kegiatan terbaru</span>
                            </div>
                        </div>

                        <p>
                            {{ Str::limit($blog->deskripsi, 120, '...') }}
                        </p>

                        <hr>

                        <a href="{{ route('kegiatan.show', $blog->id) }}" class="readmore stretched-link">
                            <span>Selengkapnya</span><i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>
            </div><!-- End post list item -->

            @endforeach

        </div>
        <div class="d-flex justify-content-center mt-4">
            {{-- {{ $blogs->links() }} --}}
        </div>
    </div>

</section><!-- /Blog Posts Section -->