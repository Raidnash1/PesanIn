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
                <!-- Start loop -->
                <div class="container mb-3">
                    <hr>
                        <div class="row">

                            
                        
                                <div class="col">
                                    <h5>{{ $order->pelanggan }}</h5>
                                    <h5>Rp. {{ number_format($order->total_harga, 2, ',', '.') }}</h5>
                                    <h5>{{ $order->quantity }}</h5>
                                    <h5>{{ $order->status }}
                                    </h5>
                                    <input type="text" placeholder="Tulis catatan" style="border:0">
                                </div>
                        
                           


                        </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
</x-guest-layout>
