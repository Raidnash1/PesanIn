<x-guest-layout>
    @push('datatable-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/scrollable.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatable-extension.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.3.1/dist/css/splide.min.css">
    @endpush

    <!-- Cart Start -->
    <div class="container-lg">
        <div class="row px-xl-5 pt-5">

            <div class="col-lg-9 table-responsive mb-5">

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h3>Keranjang</h3>
                            <p>Tempat duduk<br>Meja nomor 1 (Raid)</p>
                        </div>
                        <div class="col position-relative">
                            <button class="btn btn-secondary position-absolute top-50 end-0">Pilih Meja Lain</button>
                        </div>
                    </div>
                </div>

                @if ($carts->isEmpty())
                        <p>Keranjang belanja Anda kosong.</p>
                    @else

                <!-- Start loop -->
                @foreach ($carts as $cart)
                <div class="container mb-3">
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ url($cart->menu->image) }}" class="card-img-top"
                                alt="{{ $cart->menu->name }}" style="width: 100px;">
                        </div>
                        <div class="col">
                            <h5>{{ $cart->menu->name }}</h5>
                            <h5>Rp. {{ number_format($cart->menu->price, 2, ',', '.') }}</h5>
                            <input type="text" placeholder="Tulis catatan" style="border:0">
                        </div>
                        <div class="col-3 position-relative">
                            <div class="position-absolute top-50 end-0">
                                <input type="hidden" name="id_item" value="id_item">
                                <button class="btn btn-danger d-inline">Hapus</button>
                                <div class="number-input d-inline">
                                    <button class="btn btn-secondary" onclick="decrementValue()">-</button>
                                    <span class="number-display" id="numberDisplay">{{ $cart->quantity }}</span>
                                    <button class="btn btn-secondary" onclick="incrementValue()">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-lg-3 mb-5 pb-2">
                <form action="{{ route('cart.checkout') }}" method="POST" class="bg-light">
                    @csrf <!-- Token CSRF Laravel -->

                    <div class="input-group mb-3">
                        <!-- Input hidden untuk menyimpan data -->
                        <input type="hidden" name="informasi_rahasia" value="Nilai Rahasia yang Tidak Terlihat">
                        <input type="hidden" name="total_harga" value="{{ number_format($totalHarga, 2, ',', '.') }}">
                        <!-- Anda mungkin perlu mengganti ini dengan data yang sesuai -->
                        <input type="hidden" name="quantity" value="{{ $carts->sum('quantity') }}">
                        <!-- Input hidden untuk menyimpan ID menu dan pelanggan -->
                        @foreach ($carts as $cart)
                            <input type="hidden" name="id_menu[]" value="{{ $cart->menu->id }}">
                        @endforeach
                        <input type="hidden" name="id_pelanggan" value="{{ Auth::guard('pelanggan')->id() }}">
                        <!-- Sesuaikan dengan logika autentikasi Anda -->

                        <!-- Tombol Hapus (Opsional) -->
                        <button class="btn btn-danger mb-2" onclick="clearCart()">Hapus Keranjang</button>
                    </div>

                    <h5 class="section-title position-relative mb-3"><span class="bg-light pe-3">Ringkasan
                            Pesanan</span></h5>
                    <div class=" p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>Rp. {{ number_format($totalHarga, 2, ',', '.') }}</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total Harga</h5>
                                <h5>Rp. {{ number_format($totalHarga, 2, ',', '.') }}</h5>
                            </div>
                            <button type="submit" class="btn btn-warning px-5 mt-3"
                                data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Beli</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
    </div>
</x-guest-layout>
