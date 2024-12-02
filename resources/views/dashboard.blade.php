@extends('layouts.app')

@section('title', 'Dashboard')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')
    <h2 class="text-center mb-4 welcome-text">
        <span id="animated-text">Selamat Datang, {{ Auth::user()->full_name }}!</span>
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
        <div></div>
    </div>
@endsection
