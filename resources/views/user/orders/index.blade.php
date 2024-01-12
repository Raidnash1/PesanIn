

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
                                    <th>Menu</th>
                                <th>Banyak</th>
                                <th>Total Price</th>
                                <th>Date Transaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($carts as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <div class="flex-fill">
                                                        <div class="font-weight-bold">&nbsp; {{ $order->menu->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $order->quantity }}
                                            </td>
                                            <td>Rp{{ number_format($order->menu->price * $order->quantity, 2, ',', '.') }}</td>
                                            <td>

                                                <a href="{{ route('admin.menus.edit', $order->id) }}"
                                                    class="btn btn-info px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3">
                                                        </path>
                                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                                        <line x1="16" y1="5" x2="19" y2="8">
                                                        </line>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('admin.menus.destroy', $order->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash" width="16"
                                                            height="16" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="4" y1="7" x2="20"
                                                                y2="7"></line>
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17"></line>
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17"></line>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
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
                            window.location.href = '/invoice/{{$order->id}}'
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
    </section>