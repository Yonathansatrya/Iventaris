@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Barang Baru</h1>

        <form method="POST" action="{{ route('items.store') }}">
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

            <div class="form-group">
                <label for="status">Status Barang</label>
                <select name="status" id="status" class="form-control" required>
                    @foreach(\App\Models\Item::getStatuses() as $value => $label)
                        <option value="{{ $value }}" {{ old('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
