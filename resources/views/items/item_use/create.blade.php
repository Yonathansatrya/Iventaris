@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/Item/use/create.css')}}">

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Penggunaan Item</h1>

    <form action="{{ route('items.use.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_use">Jumlah Penggunaan</label>
            <input type="number" name="total_use" id="total_use" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_use">Tanggal Penggunaan</label>
            <input type="date" name="date_use" id="date_use" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('items.use.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </form>
</div>
@endsection
