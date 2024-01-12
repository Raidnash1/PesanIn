

<section>

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
            .num--input button {
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
                            {{-- Check if cart is not empty --}}
    
        @if(Auth::guard('pelanggan')->check())
        <li class="nav-item me-2">
            <a href="{{ route('cart', Auth::guard('pelanggan')->id()) }}" class="nav-link link-dark text-grey px-2">Keranjang</a>
        </li>
        @else
        <li class="nav-item me-2">
            <a href="{{ route('pelanggan.login') }}" class="nav-link link-dark text-grey px-2">Keranjang</a>
        </li>
        @endif
                    </ul>
    
                    <span class="d-flex align-items-center mb-3 mb-lg-0 text-dark text-decoration-none">
                        {{-- <a class="nav-link link-dark text-grey px-2 me-2" href="{{ route('cart/id') }}">Keranjang</a> --}}
                    </span>
                    <span class="d-flex align-items-center mb-3 mb-lg-0 text-dark">
                        <a class="text-decoration-none" href="{{ route('logout') }}" onclick=" event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </span>
                @endauth
    
                @guest
                    <button class="btn btn-warning text-white me-2 px-5 fw-500"
                        onclick="location.href='{{ route('login') }}'" type="button">
                        <i class="fas"></i> Masuk </button>
                    <button class="btn btn-warning-outline text-warning me-2 px-5 fw-500"
                        onclick="location.href='{{ route('register') }}'" type="button"> <i class="fas"></i>
                        Daftar
                    </button>
                @endguest
            </div>
        </header>

    <div class="container-sm float-left pt-5">
        <div class="row">
            <div class="col-sm-8">
            <h4>Rincian Pesanan</h4>
            <div class="card">
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="table g-3" id="auto-fill">
                                    <thead>
                                        <tr>
                                        <th>User</th>
                                    <th>Paket</th>
                                    <th>Harga</th>
                                    <th>Tanggal Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>{{ $user['nama_user'] }}</td>
                                        <td>{{ $user['nama_paket'] }}</td>
                                        <td>{{ $user['price'] }}</td>
                                        <td>{{ $user['email_verified_at'] }}</td>
                                        {{-- <form id="myForm" action="{{ route('carts.berlangganan.succes') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_paketLangganan" value="{{ $user['id_paketLangganan'] }}">
                                            <input type="hidden" name="price" value="{{ $user['price'] }}">
                                            <input type="hidden" name="nama_user" value="{{ $user['nama_user'] }}">
                                            <input type="hidden" name="email" value="{{ $user['email'] }}">
                                            <input type="hidden" name="password" value="{{ $user['password'] }}">
                                            <input type="hidden" name="role" value="{{ $user['role'] }}">
                                        </form> --}}
                                    </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" id="pay-button">Pay Now</button>
            </div>
            <div  class="col-sm-4" id="snap-container"></div>
        </div>
        </div>

   
        
        <!-- Tambahkan jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                var payButton = document.getElementById('pay-button');
    
                payButton.addEventListener('click', function () {
                    console.log("Pay button clicked");
    
                    // Check if Snap.js is loaded
                    if (window.snap) {
                        console.log("Snap.js is loaded");
    
                        // Check if the snapToken is available
                        console.log("snapToken: ", '{{ $snapToken }}');
    
                        // Trigger snap popup
                        window.snap.embed('{{ $snapToken }}', {
                            embedId: 'snap-container',
                            onSuccess: function (result) {
                                window.location.href = '/admin'
                                console.log(result);
                                // alert("Payment success!");
                            },
                            onPending: function (result) {
                                console.log("Payment pending:", result);
                                alert("Waiting for your payment!");
                            },
                            onError: function (result) {
                                console.log("Payment failed:", result);
                                alert("Payment failed!");
                            },
                            onClose: function () {
                                console.log("Popup closed without finishing payment");
                                alert('You closed the popup without finishing the payment');
                            }
                        });
                    } else {
                        console.error("Snap.js is not loaded");
                    }
                });
            });
        </script>
        {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                var payButton = document.getElementById('pay-button');
    
                payButton.addEventListener('click', function () {
                    console.log("Pay button clicked");
    
                    // Check if Snap.js is loaded
                    if (window.snap) {
                        console.log("Snap.js is loaded");
    
                        // Check if the snapToken is available
                        console.log("snapToken: ", '{{ $snapToken }}');
    
                        // Trigger snap popup
                        window.snap.embed('{{ $snapToken }}', {
                            embedId: 'snap-container',
                            onSuccess: function (result) {
                                var formData = $('#myForm').serialize();
                                
                                $.ajax({
                                    type: 'POST',
                                    url: $('#myForm').attr('action'), // Menggunakan URL tindakan formulir
                                    data: formData,
                                    success: function(response) {
                                        // Tanggapan dari server (response) dapat ditangani di sini
                                        console.log(response);

                                        // Jika syarat terpenuhi, submit formulir secara otomatis
                                        document.getElementById('myForm').submit();
                                        window.location.href = '/carts/berlangganan/succes';
                                    },
                                    error: function(error) {
                                        // Penanganan kesalahan
                                        console.error(error);
                                    }
                                });

                            },
                            onPending: function (result) {
                                console.log("Payment pending:", result);
                                alert("Waiting for your payment!");
                            },
                            onError: function (result) {
                                console.log("Payment failed:", result);
                                alert("Payment failed!");
                            },
                            onClose: function () {
                                console.log("Popup closed without finishing payment");
                                alert('You closed the popup without finishing the payment');
                            }
                        });
                    } else {
                        console.error("Snap.js is not loaded");
                    }
                });
            });
        </script> --}}
        </section>
