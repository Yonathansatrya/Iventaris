<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth/side.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="https://smkbagimunegeriku.sch.id/" target="_blank">
                        <img src="{{ asset('school.png') }}" alt="Logo">
                    </a>
                </span>
                <div class="text logo-text">
                    <span class="name">Inventory</span>
                    <span class="profession">System RPL</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('laboran.dashboard') }}">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="collapse"
                            data-bs-target="#stokBarangDropdown" aria-expanded="false">
                            <i class='bx bx-package icon'></i>
                            <span class="text nav-text">Stok Barang</span>
                            <i class='bx bx-chevron-down icon dropdown-toggle-icon'></i>
                        </a>
                        <div class="collapse" id="stokBarangDropdown">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('items_in.inventaris') }}" class="btn btn-link">
                                        <i class="bx bx-box icon"></i>
                                        <span>Inventaris</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('items_in.bahan') }}" class="btn btn-link">
                                        <i class="bx bx-package icon"></i>
                                        <span>Bahan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('items.repair.index') }}" class="btn btn-link">
                                        <i class="bx bx-wrench icon"></i>
                                        <span>Perbaikan Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-link">
                        <a class="cokk button" data-bs-toggle="collapse"
                            data-bs-target="#loansDropdown" aria-expanded="false" aria-controls="loansDropdown">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Peminjaman</span>
                            <i class='bx bx-chevron-down icon dropdown-toggle-icon'></i>
                        </a>
                        <div class="collapse" id="loansDropdown">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('loans.index') }}" class="btn btn-link">
                                        <i class="bx bx-briefcase icon"></i>
                                        <span>Peminjaman</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('loans_conditions.index') }}" class="btn btn-link">
                                        <i class="bx bx-arrow-back icon"></i>
                                        <span>Pengembalian</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('responsibility_loans.index') }}" class="btn btn-link">
                                        <i class="bx bx-repost icon"></i>
                                        <span>Penggantian Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('items.damage.index') }}">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Barang Rusak</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('items.use.index') }}">
                            <i class='bx bx-wrench icon'></i>
                            <span class="text nav-text">Penggunaan Barang</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <ul>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>

                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="home">
        @yield('content')
    </section>

    <script>
        // JavaScript to toggle dropdown in sidebar
        document.querySelectorAll('.sidebar li .dropdown-toggle').forEach(item => {
        item.addEventListener('click', function() {
        const parent = this.closest('.dropdown');
        parent.classList.toggle('open'); // Toggle open class to show/hide dropdown menu
        });
        });

        const body = document.querySelector('body'),
              sidebar = body.querySelector('nav'),
              toggle = body.querySelector(".toggle"),
              searchBtn = body.querySelector(".search-box");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        });
    </script>
</body>

</html>
