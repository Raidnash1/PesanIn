<x-guest-layout>

    <section>

        <div class="d-flex justify-content-center my-5">
            <div style="width: 80%">

                <div class="row">
                    <div class="col">
                        <div class="holder position-relative">
                            @foreach ($menus as $menu)
                                <div class="slides">
                                    <img src="{{ Storage::url($menu->image) }}" height="480px" width="100%"
                                        style="object-fit: cover;" alt="{{ $menu->name }}" />
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <form class="col d-flex flex-column ms-3" action="" method="POST">
                        @csrf
                        <h2 style="; font-weight: 600">{{ $menu->name }}</h2>
                        <div class="d-flex flex-row justify-content-between w-100 mt-2 ">
                            <h3 class="m-0" style="font-weight:600 ">
                                @php
                                    echo 'Rp' . number_format($menu->price, 2, ',', '.');
                                @endphp
                            </h3>


                            <div class="d-flex flex-row align-items-center">
                                <div class="btn minus bg-light text-center align-self-center"
                                    style="font-size: 18px; width:35px">-</div>
                                <input class="num text-center border-0 mx-2" style="font-size: 18px; width: 25px"
                                    name="qty" value="1">
                                <div class="btn plus bg-light text-center align-self-center"
                                    style="font-size: 18px; width:35px">+</div>
                            </div>

                        </div>

                        <div class="d-flex flex-row align-items-center w-100 ms-0">
                            <form action="{{ url('/cart/add/' . $menu->id) }}" method="post">
                                @csrf
                                <button type="button" value="{{ $menu->id }}"
                                    class="btn text-white bg-secondary me-2 addCart"
                                    style="font-size: 18px">Keranjang</button>
                            </form>
                            <button type="submit" class="btn text-white bg-warning" name="id"
                                value="{{ $menu->id }}" style="font-size: 18px">Bayar</button>
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
            // Script untuk menambah dan mengurangi nilai pada input
            document.querySelector('.minus').addEventListener('click', function() {
                var value = parseInt(document.querySelector('.num').value, 10);
                value = isNaN(value) ? 0 : value;
                value--;
                document.querySelector('.num').value = value < 1 ? 1 : value;
            });

            document.querySelector('.plus').addEventListener('click', function() {
                var value = parseInt(document.querySelector('.num').value, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                document.querySelector('.num').value = value;
            });
        </script>
    </section>
</x-guest-layout>
