<x-guest-layout>
<section class="py-5 my-5">
    <div class="container py-5 my-5">
        <h1 class="mt-5 mb-3 text-center">Berlangganan</h1>
        <div class="row">
            @foreach($paketLangganan as $paket)
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $paket->nama_paket }}</h5>
                            <p class="card-text">{{ $paket->description }}</p>
                            <p class="card-text">{{ $paket->price }}</p>
                            <form action="{{ route('cart.berlangganan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_paketLangganan" value="{{ $paket->id }}">
                                <input type="hidden" name="nama_paket" value="{{ $paket->nama_paket }}">
                                <input type="hidden" name="price" value="{{ $paket->price }}">
                                <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                                <input type="hidden" name="nama_user" value="{{ $user['nama_user'] }}">
                                <input type="hidden" name="email" value="{{ $user['email'] }}">
                                <input type="hidden" name="password" value="{{ $user['password'] }}"> 
                                <input type="hidden" name="role" value="{{ $user['role'] }}">
                                @if($paket->id == 1)
                                <button type="submit" class="btn btn-primary">Berlangganan</button>
                                @else
                                <button disabled class="btn btn-secondary">Berlangganan</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- --------------------------- Footer Section ---------------------------- -->
</section>
</x-guest-layout>


