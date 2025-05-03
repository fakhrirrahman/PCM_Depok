<section id="blog-posts" class="blog-posts section py-5 bg-white text-black">
    <div class="container">
        <div class="shadow-lg rounded-4 p-4" style="background-color: #f9f9f9;">
            <div class="section-title text-center mb-4">
                <h2>Kegiatan Terbaru Kami</h2>
                <p>Kami melakukan banyak kegiatan. Selengkapnya pada halaman kegiatan.</p>
            </div>

            <div class="row gy-4">
                @foreach ($kegiatans as $blog)
                <div class="col-lg-4">
                    <article class="position-relative rounded-3 overflow-hidden h-100 bg-white p-3 shadow-sm">
                        <div class="post-img position-relative overflow-hidden rounded-3" style="height: 250px;">
                            @foreach ($blog->mediaUrls as $mediaUrl)
                            <img src="{{ $mediaUrl }}" class="img-fluid w-100 h-100 object-fit-cover"
                                alt="{{ $blog->title }}">
                            @endforeach
                            <span
                                class="post-date position-absolute bottom-0 end-0 bg-success text-white px-2 py-1 small">
                                {{ $blog->tanggal }}
                            </span>
                        </div>

                        <div class="post-content d-flex flex-column mt-3">
                            <h3 class="post-title">{{ $blog->nama_kegiatan }}</h3>

                            <div class="meta d-flex align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">{{$blog->creator->name ?? 'Tidak
                                        diketahui'}}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Kegiatan Terbaru</span>
                                </div>
                            </div>

                            <p>{{ Str::limit($blog->deskripsi, 120, '...') }}</p>

                            <hr>

                            <a href="{{ route('kegiatan.show', $blog->id) }}" class="readmore stretched-link">
                                <span>Selengkapnya</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{-- {{ $blogs->links() }} --}}
            </div>
        </div>
    </div>
</section>