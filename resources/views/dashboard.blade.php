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
    </div>

    <div class="row mt-4">
        <!-- Form Input Barang -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Input Barang Baru</div>
                <div class="card-body">
                    <form action="{{ route('items.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="code_item">Kode Barang</label>
                            <input type="text" name="code_item" id="code_item" class="form-control" value="{{ old('code_item') }}" required>
                            @error('code_item')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="item_name">Nama Barang</label>
                            <input type="text" name="item_name" id="item_name" class="form-control" value="{{ old('item_name') }}" required>
                            @error('item_name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="type_item">Tipe Barang</label>
                            <select name="type_item" id="type_item" class="form-control" required>
                                <option value="inventaris" {{ old('type_item') == 'inventaris' ? 'selected' : '' }}>Inventaris</option>
                                <option value="bahan" {{ old('type_item') == 'bahan' ? 'selected' : '' }}>Bahan</option>
                            </select>
                            @error('type_item')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="total_item">Total Barang</label>
                            <input type="number" name="total_item" id="total_item" class="form-control" value="{{ old('total_item') }}" required>
                            @error('total_item')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="date_in_item">Tanggal Masuk Barang</label>
                            <input type="date" name="date_in_item" id="date_in_item" class="form-control" value="{{ old('date_in_item') }}" required>
                            @error('date_in_item')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Tambah Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
