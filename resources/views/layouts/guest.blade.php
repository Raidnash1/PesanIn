<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <title>PesanIn</title>

    <meta name="title" content="PesanIn">
    <link rel="icon" href="{{ url('cuba/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('cuba/assets/images/icon-192.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/plus-jakarta-display.min.css" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="icon" href="{{ url('cuba/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('cuba/assets/images/icon-192.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/4d516d4246.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/css/splide.min.css">

    <style>
        .number-input button {
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .number-display {
            font-size: 18px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <!-- ------------------------ Mobile Header Section ------------------------ -->
    <nav class="navbar navbar-light bg-white d-block d-sm-block d-md-block d-lg-none py-3 border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">PesanIn</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">
                        PesanIn
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" style="margin-top: -24px">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <hr />
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#tentang-kami">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menus.index') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#galeri-outlet">Galeri Outlet</a>
                        </li>
                    </ul>
                    <hr />
                    <div class="d-grid gap-2">
                        <button class="btn btn-warning text-white me-2 px-5 fw-500"
                            onclick="location.href='http://127.0.0.1:8000/reservation/step-one'" type="button"> <i
                                class="fas fa-calendar-plus"></i> &nbsp; &nbsp; Buat
                            Reservasi</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- ------------------------ Double Header Section ------------------------ -->
    <header class="py-3 border-bottom d-none d-sm-none d-md-none d-lg-block bg-white sticky-top">
        <div class="container d-flex flex-wrp justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <span class="fs-3 fw-bold">PesanIn</span>
            </a>

            @auth
                <ul class="nav me-auto">
                    <li class="nav-item me-2">
                        <a href="/" class="nav-link link-dark text-grey px-2 active" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="/" class="nav-link link-dark text-grey px-2">Dashboard</a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="{{ route('menus.index') }}" class="nav-link link-dark text-grey px-2">Menu</a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="/" class="nav-link link-dark text-grey px-2">Transaksi</a>
                    </li>
                    <li class="text-decoration-none">
                </ul>

                <span class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
                    {{-- <a class="nav-link link-dark text-grey px-2 me-2" href="{{ route('cart/id') }}">Keranjang</a> --}}
                </span>
                <span class="d-flex align-items-center mb-3 mb-lg-0 text-dark">
                    <a class="text-decoration-none" href="{{ route('logout') }}"
                        onclick=" event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </span>
            @endauth

            @guest
                <button class="btn btn-warning text-white me-2 px-5 fw-500"
                    onclick="location.href='{{ route('pelanggan.login') }}'" type="button">
                    <i class="fas"></i> Masuk </button>
                <button class="btn btn-warning-outline text-warning me-2 px-5 fw-500"
                    onclick="location.href='{{ route('register') }}'" type="button"> <i class="fas"></i>
                    Daftar
                </button>
            @endguest
        </div>
    </header>

    <!-- ------------------------ Main Content Section ------------------------ -->
    <main>
        {{ $slot }}
    </main>

    <!-- --------------------------- Footer Section ---------------------------- -->
    <footer class="py-5">
        <div class="container">
            <div class="row text-black">
                <div class="col-md-6">
                    <h4 class="fw-bold text-black">PesanIn - Makanan Segera dalam Genggaman Anda</h4>
                    <p class="text-black">
                        Website pemesanan makanan dine-in yang praktis bagi pelanggan dan mengurangi beban kerja
                        kasir
                        dengan otomatisasi proses pemesanan.
                    </p>
                    <small class="d-block mb-3">
                        &copy; Kelompok 32
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <!-- Splide JS -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/js/splide.min.js"></script>

    <!-- Initializing Hero Section Splide JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'loop',
                padding: '80px',
                gap: '24px',
                autoplay: true,
                arrows: false,
                breakpoints: {
                    576: {
                        type: 'loop',
                        perPage: 1,
                        gap: '8px',
                        padding: '8px',
                    },
                }
            });
            splide.mount();
        });
    </script>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('YOUR_SNAP_TOKEN', {
        embedId: 'snap-container',
        onSuccess: function (result) {
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    });
  </script>
    <!-- Initializing Feature Section Splide JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide2', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                arrows: false,
            });
            splide.mount();
        });
    </script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Testimonial Swiper -->
    <script>
        var swiper = new Swiper(".testimonial-swiper", {
            slidesPerView: 1,
            spaceBetween: 12,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 12,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 12,
                },
            },
        });
    </script>

    <!-- Initialize Menu Swiper -->
    <script>
        var swiper = new Swiper(".menu-swiper", {
            slidesPerView: 1,
            spaceBetween: 12,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 12,
                },
                1024: {
                    slidesPerView: 4.3,
                    spaceBetween: 12,
                },
            },
        });

        let currentValue = 0;
        const numberDisplay = document.getElementById('numberDisplay'); 
            function decrementValue() {
                // Mendapatkan elemen span yang menampilkan quantity
                var displayElement = document.getElementById('numberDisplay');

                // Mendapatkan nilai quantity saat ini
                var currentValue = parseInt(displayElement.innerHTML);

                // Mengurangkan nilai quantity jika tidak kurang dari 0
                if (currentValue > 0) {
                    currentValue -= 1;
                    displayElement.innerHTML = currentValue;
                }
            }

        function incrementValue() {
            // Mendapatkan elemen span yang menampilkan quantity
            var displayElement = document.getElementById('numberDisplay');

            // Mendapatkan nilai quantity saat ini
            var currentValue = parseInt(displayElement.innerHTML);

            // Menambahkan nilai quantity
            currentValue += 1;
            displayElement.innerHTML = currentValue;
        }
    </script>
    <script >
    function updateDisplay() {
    numberDisplay.textContent = currentValue;
    }

    function incrementValue() {
    currentValue++;
    updateDisplay();
    }

    function decrementValue() {
    if (currentValue > 0) {
    currentValue--;
    updateDisplay();
    }
    }
    </script>



</body>

</html>
