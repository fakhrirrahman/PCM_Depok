<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">

    <div class="container">
        <div class="row gy-4">
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
                                <i class="bi bi-folder2"></i> <span class="ps-2">Kegiatan Kami</span>
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

<!-- Blog Pagination Section -->
<section id="blog-pagination" class="blog-pagination section">
    <div class="container">
        <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    {{-- Tombol Previous --}}
                    @if ($kegiatans->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="bi bi-chevron-left"></i></span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $kegiatans->previousPageUrl() }}">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                    @endif

                    {{-- Nomor Halaman --}}
                    @foreach ($kegiatans->links()->elements[0] as $page => $url)
                    @if ($page == $kegiatans->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach

                    {{-- Tombol Next --}}
                    @if ($kegiatans->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $kegiatans->nextPageUrl() }}">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="bi bi-chevron-right"></i></span>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</section><!-- /Blog Pagination Section -->