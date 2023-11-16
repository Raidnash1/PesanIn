<x-guest-layout>

    <!-- ------------------------ Menu Hero Section ------------------------ -->
    <section>
        <div class="container">
            <div class="mt-4 mt-md-0 mb-3 bg-warning text-white rounded-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 p-5 my-auto align-center">
                            <h1 class="display-5 fw-bold">Katalog Menu Makanan & Minuman Restawrant</h1>
                            <p class="col-md-10">
                                Disini kalian bisa nemuin semua menu dengan berbagai macam kategori yang dapat kalian
                                pesan
                                di restoran kami, scroll kebawah ya!
                            </p>
                            <button class="btn btn-outline-light text-white px-4 fw-bold" type="button">
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

@section('content.user')
    <div class="container mt-5">
          @include('user.orders.table_orders')
    </div>
@endsection
</x-guest-layout>