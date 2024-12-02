@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Item Rusak</h1>

    <form action="{{ route('damaged-items.store') }}" method="POST">
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
            <label for="quantity">Jumlah Kerusakan</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="damage_date">Tanggal Kerusakan</label>
            <input type="date" name="damage_date" id="damage_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="damage_description">Deskripsi Kerusakan</label>
            <textarea name="damage_description" id="damage_description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
