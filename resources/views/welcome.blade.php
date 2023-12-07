<x-guest-layout>

    <!-- ------------------------ Splide Hero Section ------------------------ -->
    <section class="splide my-4" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <a href="{{ url('/menus') }}">
                    <img src="{{ url('images/splide/landing-page/hero-slide.png') }}" class="d-block w-100"
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
    <!-- ------------------------ #1 Feature Section ------------------------ -->
    <section class="my-100" id="tentang-kami">
        <div class="container">
            <h1>Berlangganan</h1> <br><br>
            <div class="row">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Coba gratis</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Gratis</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Biaya Bulanan</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Berlangganan</a>
                        </div>
                      </div>
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
