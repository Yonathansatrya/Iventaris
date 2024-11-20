@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-center mb-4 welcome-text">
        <span id="animated-text">Selamat Datang, {{ Auth::user()->name }}!</span>
    </h2>

    <div class="row">
        <!-- Statistik Barang -->
        <div class="col-md-4">
            <div class="stat-box">
                <i class="fas fa-box"></i>
                <h3>Total Barang</h3>
                <p>250 Item</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-box">
                <i class="fas fa-check-circle"></i>
                <h3>Barang Tersedia</h3>
                <p>200 Item</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-box">
                <i class="fas fa-exclamation-triangle" style="color: #ffc107;"></i>
                <h3>Stok Habis</h3>
                <p>50 Item</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Form Input Barang -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Input Barang Baru</div>
                <div class="card-body">
                    <input type="text" class="form-control mb-2" placeholder="Nama Barang">
                    <input type="number" class="form-control mb-2" placeholder="Jumlah Stok">
                    <button class="btn btn-primary btn-block">Tambah Barang</button>
                </div>
            </div>
        </div>

        <!-- Daftar Barang -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Barang</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Barang A</td>
                                <td>20</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Barang B</td>
                                <td>0</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    /* Animasi teks bergerak */
    #animated-text {
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        width: 100%;
        animation: slide-text 5s linear infinite;
        font-weight: bold;
        font-size: 24px;
        color: #007bff;
    }

    @keyframes slide-text {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .stat-box {
        text-align: center;
        padding: 20px;
        border: 2px solid #007bff;
        background-color: white;
        border-radius: 10px;
        transition: transform 0.3s;
    }

    .stat-box:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.2);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }
</style>
<style>
    body {
        background-color: #f7f7f7;
        font-family: 'Arial', sans-serif;
    }
    .card {
        border-radius: 10px;
        margin-bottom: 30px;
    }
    .card-header {
        background-color: #007bff;
        color: white;
        border-radius: 10px 10px 0 0;
        font-size: 18px;
    }
    .card-body {
        background-color: white;
        padding: 30px;
        border-radius: 0 0 10px 10px;
    }
    .card-icon {
        font-size: 30px;
        color: #007bff;
    }
    .stat-box {
        border: 2px solid #007bff;
        border-radius: 10px;
        padding: 20px;
        background-color: white;
        margin-right: 15px;
        text-align: center;
    }
    .stat-box h3 {
        font-size: 24px;
        margin-bottom: 10px;
    }
    .stat-box p {
        font-size: 18px;
    }
    .violation-box {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        border: 2px solid #f8d7da;
        color: #721c24;
    }
    .violation-box ul {
        list-style-type: none;
        padding: 0;
    }
    .violation-box li {
        margin-bottom: 10px;
    }
    .dashboard-container {
        padding: 30px;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
    }
    .col-md-4 {
        flex: 1 1 30%;
    }
    .col-md-8 {
        flex: 1 1 66%;
    }
</style>
@endsection
