<x-guest-layout>

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

                <!-- Start loop -->
                <div class="container mb-3">
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ url('images/menu/pawon-jinawi/baso.png') }}" alt="" style="width: 100px;">
                        </div>
                        <div class="col">
                            <h5>Bakso</h5>
                            <h5>10.000</h5>
                            <input type="text" placeholder="Tulis catatan" style="border:0">
                        </div>

                    

                        <div class="col-3 position-relative">
                            <div class="position-absolute top-50 end-0">
                                <!-- <form action="" method=""> -->
                                    <input type="hidden" name="id_item" value="id_item">
                                        <button class="btn btn-danger d-inline">Hapus</button>
                                        <div class="number-input d-inline">
                                            <button class="btn btn-secondary" onclick="decrementValue()"><</button>
                                            <span class="number-display" id="numberDisplay">0</span>
                                            <button class="btn btn-secondary" onclick="incrementValue()">></button>
                                        </div>
                                </form>     
                            </div>
                        </div>
                    

                    </div>
                </div>

                <div class="container mb-3">
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ url('images/menu/pawon-jinawi/baso.png') }}" alt="" style="width: 100px;">
                        </div>
                        <div class="col">
                            <h5>Bakso</h5>
                            <h5>10.000</h5>
                            <input type="text" placeholder="Tulis catatan" style="border:0">
                        </div>
                        <div class="col-3 position-relative">
                            <div class="position-absolute top-50 end-0">
                                <button class="btn btn-danger d-inline">Hapus</button>
                                <div class="number-input d-inline">
                                    <button class="btn btn-secondary" onclick="decrementValue()"><</button>
                                    <span class="number-display" id="numberDisplay">0</span>
                                    <button class="btn btn-secondary" onclick="incrementValue()">></button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="container mb-3">
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ url('images/menu/pawon-jinawi/baso.png') }}" alt="" style="width: 100px;">
                        </div>
                        <div class="col">
                            <h5>Bakso</h5>
                            <h5>10.000</h5>
                            <input type="text" placeholder="Tulis catatan" style="border:0">
                        </div>
                        <div class="col-3 position-relative">
                            <div class="position-absolute top-50 end-0">
                                <button class="btn btn-danger d-inline">Hapus</button>
                                <div class="number-input d-inline">
                                    <button class="btn btn-secondary" onclick="decrementValue()"><</button>
                                    <span class="number-display" id="numberDisplay">0</span>
                                    <button class="btn btn-secondary" onclick="incrementValue()">></button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- End loop -->
            </div>

            <div class="col-lg-3">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 rounded-0" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-warning">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative mb-3"><span class="bg-light pe-3">Ringkasan Pesanan</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rp 50.000</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total Harga</h5>
                            <h5>Rp 55.000</h5>
                        </div>
                            <button class="btn btn-warning px-5" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Beli</button>
        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-2  ">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Metode Pembayaran</h6>
                            <a data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Lihat <u>Semua</u></a>
                        </div>
                        
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault1">
                                BRI Virtual Account
                            </label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault2">
                                BNI Virtual Account
                            </label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        </div>
                        <hr>

                        <div class="d-flex justify-content-between mb-3">
                            <h6>Ringkasan Pesanan<br>Total harga</h6>
                            <h6>Rp 50.000</h6>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <h6>Total Tagihan<br>Rp. 50.000</h6>
                            <button class="btn btn-warning px-5 font-weight-bold">Beli</button>
                        </div>
            </div>
            </div>
        </div>
        </div>
        <div class="modal fade m-2" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Lanjut</button>
            </div>
            </div>
        </div>
        </div>

</x-guest-layout>
