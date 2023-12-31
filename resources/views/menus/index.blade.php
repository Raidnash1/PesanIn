<x-guest-layout>
    <!-------------------------- Menu Hero Section -------------------------->
    <section>
        <div class="container">
            <div class="mt-4 mt-md-0 mb-3 bg-warning text-white rounded-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 p-5 my-auto align-center text-black">
                            <h1 class="display-5 fw-bold">Katalog Menu Makanan & Minuman PesanIn</h1>
                            <p class="col-md-10">
                                Disini kalian bisa nemuin semua menu dengan berbagai macam kategori yang dapat kalian
                                pesan
                                di restoran kami, scroll kebawah ya!
                            </p>
                            <button class="btn btn-outline-dark text-black px-4 fw-bold" type="button">
                                Lihat semua &nbsp; <i class="fas fa-arrow-down"></i>
                            </button>
                        </div>
                        <div class="col-md-4 my-auto p-0">
                            <img src="{{ url('images/landing-page/user-listing-images-removebg-preview-2.png') }}"
                                class="img-fluid img-jumbotron d-none d-md-block" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------------- Menu Main Content [Filter & Menu Card] Section ------------------------ -->
    <section>
        <div class="container" style="margin-bottom: 100px">
            <div class="row g-3">
                <div class="col-md-3 mb-3 d-none d-md-block">
                    <div class="flex-shrink-0 p-3 bg-warning rounded-3 sticky-top menu-filter">
                        <a href="/"
                            class="
                    d-flex
                    align-items-center
                    pb-3
                    mb-3
                    link-light
                    text-decoration-none
                    border-bottom
                  ">
                            <span class="fs-5 fw-semibold">Filter</span>
                        </a>
                        <ul class="list-unstyled ps-0">
                            <li class="mb-1">
                                <button
                                    class="
                        btn btn-toggle
                        align-items-center
                        text-white
                        rounded
                        collapsed
                      "
                                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                    &nbsp; Kategori
                                </button>
                                <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="1" />
                                                    <label class="form-check-label" for="1">
                                                        Makanan
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="2" />
                                                    <label class="form-check-label" for="2">
                                                        Minuman
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="3" />
                                                    <label class="form-check-label" for="3">
                                                        Dessert
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="4" />
                                                    <label class="form-check-label" for="4">
                                                        Seblak
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="5" />
                                                    <label class="form-check-label" for="5">
                                                        Snack
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="6" />
                                                    <label class="form-check-label" for="6">
                                                        Cocktail
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="border-top my-3"></li>
                            <li class="mb-1">
                                <button
                                    class="
                        btn btn-toggle
                        align-items-center
                        rounded
                        text-white
                        collapsed
                      "
                                    data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                                    &nbsp; Urutan Harga
                                </button>
                                <div class="collapse show" id="dashboard-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked" />
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Terendah — Tertinggi
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="link-light rounded">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked" />
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Tertinggi — Terendah
                                                    </label>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row g-3">
                        <!-- START LOOP -->
                        @foreach ($menus as $menu)
                        <div class="col-md-3 float-left position-relative">
                            <form action="{{ route('cart.addToCart') }}" method="POST">
                                @csrf
                                <div class="card card-borderless-shadow card-min-height">
                                    <a href="{{ route('menus.show', $menu) }}"><img src="{{ url($menu->image) }}" class="card-img-top" width="100%" height="200"/></a>
                                    <div class="card-body">
                                        <a class="card-title fs-5 text-black" href="{{ route('menus.show', $menu) }}" style="text-decoration: none;">{{ $menu->name }}</a>
                                        <h5 class="card-title fw-bold">Rp.{{ $menu->price }}</h5>
                                        <div class="position-absolute bottom-0 end-0 mb-3 p-2">
                                            <input type="hidden" name="quantity" id="qtyInput" value="1">
                                            <input type="hidden" name="id_menu" value="{{ $menu->id }}">
                                            <input type="hidden" name="id_pelanggan" value="{{ Auth::guard('pelanggan')->id() }}">
                                            @if(Auth::guard('pelanggan')->check())
                                            <button type="submit" class="btn text-black bg-warning me-2 addCart" style="font-size: 18px">+</button>
                                            @else
                                            <a href="{{ route('pelanggan.login') }}" class="btn text-black bg-warning me-2 addCart" style="font-size: 18px;text-decoration:none;">+</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                        <!-- END LOOP -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
