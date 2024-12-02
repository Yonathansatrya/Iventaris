@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/Item/use/edit.css') }}">

@section('content')
<div class="container" style="padding: 0 100px;">
    <h1 class="mb-4">Edit Penggunaan Item</h1>

    <form action="{{ route('items.use.update', $itemUse->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $itemUse->item_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_use">Jumlah Penggunaan</label>
            <input type="number" name="total_use" id="total_use" class="form-control" value="{{ $itemUse->total_use }}" required>
        </div>

        <div class="form-group">
            <label for="date_use">Tanggal Penggunaan</label>
            <input type="date" name="date_use" id="date_use" class="form-control" value="{{ $itemUse->date_use }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $itemUse->description }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('items.use.index') }}" class="btn btn-primary">Kembali</a>a
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</div>
@endsection
