<x-guest-layout>
    <section>
        <div class="d-flex justify-content-center my-5 mb-5 pb-5">
            <div style="width: 80%">
                <div class="row">
                    <div class="col">
                        <div class="holder position-relative">
                            @foreach ($menu as $col)
                            @endforeach
                                <div class="slides">
                                    <img src="{{ url($col->image) }}" height="480px" width="100%" style="object-fit: cover;" alt="{{ $col->name }}" />
                                </div>
                        </div>
                    </div>
                    <form class="col d-flex flex-column ms-3" action="{{ route('cart.addToCart') }}" method="POST">
                        @csrf
                        <h2 style="; font-weight: 600">{{ $col->name }}</h2>
                        <div class="d-flex flex-row justify-content-between w-100 mt-2 ">
                            <h3 class="m-0" style="font-weight:600 ">
                                @php
                                    echo 'Rp' . number_format($col->price);
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
                                <input type="hidden" name="id_pelanggan" value="{{ route('menus.show', $col) }}">
                                <input type="hidden" name="id_menu" value="{{ $col->id }}">
                                <button type="submit" class="btn text-black bg-warning me-2 addCart" style="font-size: 18px">Tambahkan ke Keranjang</button>
                            @else
                                <a href="{{ route('pelanggan.login') }}" class="btn text-black bg-secondary me-2" style="font-size: 18px">Login untuk Tambahkan ke Keranjang</a>
                            @endif
                        </div>

                        <div class="mt-4">
                            <p style="font-weight: bold;font-size: 18px;">Description</p>
                            <p style="font-size: 16px;">{{ $col->description }}</p>
                        </div>

                </div>
            </div>

                    </form>
        </div>
        <div class="col-md-9 container">
            <div class="row g-3">
                <!-- START LOOP -->
                @foreach($menus as $sat)
                    @foreach($sat as $wah)
                        <div class="col-md-3 float-left">
                            <div class="card card-borderless-shadow card-min-height">
                                <a href="{{ route('menus.show', $wah->id) }}"><img src="{{ url($wah->image) }}" class="card-img-top" width="100%" height="200"/></a>
                                <div class="card-body">
                                    <a class="card-title fs-5 text-black" href="{{ route('menus.show', $wah->id) }}" style="text-decoration: none;">{{ $wah->name }}</a>
                                    <h5 class="card-title fw-bold">Rp.{{ $wah->price }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                <!-- END LOOP -->
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

