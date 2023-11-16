<div class="sidebar-wrapper h-100">
    <nav class="sidebar-main">
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#">
                        <img class="img-fluid" src="#" alt="">
                    </a>
                    <div class="mobile-back text-right">
                        <span>Back</span>
                        <i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </div>
                </li>

                <li class="sidebar-main-title pt-0">
                    <div>
                        <h6>Halaman Utama</h6>
                        <p>Dashboard & Overview</p>
                    </div>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin') }}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ url('/admin/menus') }}">
                        <i data-feather="coffee"></i>
                        <span>Menu</span>
                    </a>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                        <i data-feather="users"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="/transaction">
                                Tambah Transaksi
                            </a>
                        </li>
                        <li>
                            <a href="/transaction">
                                Menunggu Pembayaran
                            </a>
                        </li>
                        <li>
                            <a href="/transaction">
                                Antri
                            </a>
                        </li>
                        <li>
                            <a href="/transaction">
                                Dimasak
                            </a>
                        </li>
                        <li>
                            <a href="/transaction">
                                Selesai
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>
