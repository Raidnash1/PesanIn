<x-guest-layout>
    @push('datatable-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/scrollable.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatable-extension.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.3.1/dist/css/splide.min.css">
    @endpush

    <div class="row py-4">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pelanggan</h4>
                <p class="card-description">
                    Daftar antrian yang belum diproses.
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Pelanggan</th>
                                <th>Quantity</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody id="tabelAntrian">
                            
                            <tr>
                                <td>{{ $orders->id }}</td>
                                <td>{{ $order->menu->name }}</td>
                                <td>{{ $order->pelanggan->nama }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_harga }}</td>
                                @if ($order->status == 1)
                                    <td>Menunggu Pembayaran</td>
                                @elseif ($order->status == 2)
                                    <td>Lunas</td>
                                @endif
                                <td><button class="btn btn-success text-dark">Ubah</button></td>
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-guest-layout>
