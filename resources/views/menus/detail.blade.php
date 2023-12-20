<x-guest-layout>

    <section>
        <div class="d-flex justify-content-center my-5 mb-5 pb-5">
            <div style="width: 80%">
                <div class="row">
                    <div class="col">
                        <div class="holder position-relative">
                            @foreach ($menus as $menu)
                            @endforeach
                                <div class="slides">
                                    <img src="{{ url($menu->image) }}" height="480px" width="100%" style="object-fit: cover;" alt="{{ $menu->name }}" />
                                </div>

                        </div>
                    </div>
                    <form class="col d-flex flex-column ms-3" action="{{ route('cart.addToCart') }}" method="POST">
                        @csrf
                        <h2 style="; font-weight: 600">{{ $menu->name }}</h2>
                        <div class="d-flex flex-row justify-content-between w-100 mt-2 ">
                            <h3 class="m-0" style="font-weight:600 ">
                                @php
                                    echo 'Rp' . number_format($menu->price);
                                @endphp
                            </h3>
                            <div class="d-flex flex-row align-items-center">
                                <div class="btn minus bg-light text-center align-self-center"
                                    style="font-size: 18px; width:35px" onclick="decrementQty()">-</div>
                                <input class="num text-center border-0 mx-2" style="font-size: 18px; width: 25px" name="quantity" id="qtyInput" value="1">
                                <div class="btn plus bg-light text-center align-self-center"
                                    style="font-size: 18px; width:35px" onclick="incrementQty()">+</div>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center w-100 ms-0">
                            @if (Auth::guard('pelanggan')->check())
                                <input type="hidden" name="id_pelanggan" value="{{ Auth::guard('pelanggan')->id() }}">
                                <input type="hidden" name="id_menu" value="{{ $menu->id }}">
                                <button type="submit" class="btn text-black bg-warning me-2 addCart" style="font-size: 18px">Tambahkan ke Keranjang</button>
                            @else
                                <a href="{{ route('pelanggan.login') }}" class="btn text-black bg-secondary me-2" style="font-size: 18px">Login untuk Tambahkan ke Keranjang</a>
                            @endif
                        </div>

                        <div class="mt-4">
                            <p style="font-weight: bold;font-size: 18px;">Description</p>
                            <p style="font-size: 16px;">{{ $menu->description }}</p>
                        </div>

                </div>
            </div>

            </form>
        </div>
        </div>
        </div>
        <script>
            function incrementQty() {
                var qtyInput = document.getElementById('qtyInput');
                qtyInput.value = parseInt(qtyInput.value) + 1;
            }

            function decrementQty() {
                var qtyInput = document.getElementById('qtyInput');
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                }
            }
        </script>
    </section>
</x-guest-layout>
