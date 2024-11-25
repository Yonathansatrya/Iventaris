@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Catat Penggunaan Barang</h1>

        <form method="POST" action="{{ route('items.storeUse', $item) }}">
            @csrf

            <div class="form-group">
                <label for="total_use">Total Penggunaan</label>
                <input type="number" name="total_use" id="total_use" class="form-control" value="{{ old('total_use') }}" required>
                @error('total_use')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Penggunaan</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Penggunaan</button>
        </form>
    </div>
@endsection
