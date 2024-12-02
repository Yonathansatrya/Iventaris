@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Perbaikan Item</h1>

    <form action="{{ route('repair-damaged-items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="damaged_item_id">Item Rusak</label>
            <select name="damaged_item_id" id="damaged_item_id" class="form-control" required>
                @foreach($damagedItems as $damagedItem)
                    <option value="{{ $damagedItem->id }}">{{ $damagedItem->item->name }} - Kerusakan: {{ $damagedItem->damage_description }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="repair_quantity">Jumlah Perbaikan</label>
            <input type="number" name="repair_quantity" id="repair_quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="repair_date">Tanggal Perbaikan</label>
            <input type="date" name="repair_date" id="repair_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="repair_description">Deskripsi Perbaikan</label>
            <textarea name="repair_description" id="repair_description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
