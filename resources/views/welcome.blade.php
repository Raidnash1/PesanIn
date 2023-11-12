<x-guest-layout>

    <!-- ------------------------ Splide Hero Section ------------------------ -->
    <section class="splide my-4" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <a href="{{ url('/menus') }}">
                    <img src="{{ url('images/splide/landing-page/groub-142.png') }}" class="d-block w-100"
                        style="border-radius:8px;">
                </a>
            </ul>
        </div>
    </section>

    <!-- ------------------------ #1 Feature Section ------------------------ -->
    <section class="my-100" id="tentang-kami">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-7 mb-4 mb-lg-0 my-auto">
                    <div class="splide splide2">
                        <div class="splide__track">
                            <div class="splide__list">
                                <img src="{{ url('images/landing-page/image8.png') }}" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="
                    col-6 col-md-6 col-lg-4
                    ms-auto
                    text-center text-md-start text-lg-start
                    my-auto
                  ">
                    <p class="mb-0 fw-bold text-warning">FITUR PESAN DIMEJA</p>
                    <h2 class="fw-bold">Customer tidak perlu antri saat memesan dan karyawan tidak perlu mencatat
                        pesanan!</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ Menu Card Section ------------------------ -->
    <section class="my-100">
        <div class="container">
            <div class="row mt-5 text-center">
                <small class="text-warning text-uppercase fw-bold">Hidangan Spesial buat Kamu dan Orang Spesial</small>
                <h1 class="fw-bold">Coba menu spesial di kedai kesayangan mu hari ini!</h1>
                <p>Jangan lupa buat pesan di website kami ya, kalau masih kepo sama kedai yang ada bisa liat liat
                    dulu kok</p>
            </div>
            <div class="row mt-4">
                <div class="container">
                    <div class="swiper menu-swiper">
                        <div class="swiper-wrapper">
                            @forelse ($menus as $menu)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img src="{{ Storage::url($menu->image) }}"
                                            class="card-img-top card-img-top-landing-page" />
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"> {{ $menu->name }}</h5>
                                            <div class="category-card-description-wrapper">
                                                <p class="card-text category-card-description" style="font-size: 13px;">
                                                    {{ $menu->description }}
                                                </p>
                                            </div>
                                            <hr>
                                            <h5 class="fw-semibold">Rp.{{ $menu->price }}.000,00</h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>gak ada kedai euy</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        <a href="{{ url('/menus') }}"
                            class="btn btn-warning text-white px-4 mx-auto text-center col-10 col-md-3 my-3 fw-bold">Lihat
                            Semua
                            &nbsp; <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------ CTA Social Media Section ------------------------ -->
    <section>
        <div class="container mb-5">
            <div class="row rounded mx-auto " style="background-color: #fcca29">
                <div class="col-md-7 my-auto text-white px-5 py-5">
                    <h2 class="fw-bold text-black">Jangan lewatkan promo dari kami</h2>
                    <p class="text-black">
                        Pastikan kalian follow instagram dan twitter kami untuk informasi terkait promo, event, menu
                        baru atau giveaway bagi kalian para restawvers di seluruh Indonesia!
                    </p>
                    <a href='#' target="_blank" class="btn btn-outline-dark mt-2 px-4 py-2"
                        style="font-weight:500;">Follow Instagram
                        ⇾</a>
                </div>
                <div class="col-md-4 background-cta ms-auto">
                </div>
            </div>
        </div>
    </section>


</x-guest-layout>
