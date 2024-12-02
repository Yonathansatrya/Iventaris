@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Item Rusak</h1>

    <form action="{{ route('damaged-items.update', $damagedItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $damagedItem->item_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah Kerusakan</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $damagedItem->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="damage_date">Tanggal Kerusakan</label>
            <input type="date" name="damage_date" id="damage_date" class="form-control" value="{{ $damagedItem->damage_date }}" required>
        </div>

        <div class="form-group">
            <label for="damage_description">Deskripsi Kerusakan</label>
            <textarea name="damage_description" id="damage_description" class="form-control" rows="4" required>{{ $damagedItem->damage_description }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
