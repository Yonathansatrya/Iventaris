@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item</h1>
    <form action="{{ route('items_in.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}" required>
        </div>
        <div class="mb-3">
            <label for="specification" class="form-label">Specification</label>
            <textarea name="specification" class="form-control" rows="3" required>{{ $item->specification }}</textarea>
        </div>
        <div class="mb-3">
            <label for="procurement_sources" class="form-label">Procurement Sources</label>
            <input type="text" name="procurement_sources" class="form-control" value="{{ $item->procurement_sources }}" required>
        </div>
        <div class="mb-3">
            <label for="total_item" class="form-label">Total Items</label>
            <input type="number" name="total_item" class="form-control" value="{{ $item->total_item }}" required>
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <select name="condition" class="form-control" required>
                <option value="Good" {{ $item->condition == 'Good' ? 'selected' : '' }}>Good</option>
                <option value="Damaged" {{ $item->condition == 'Damaged' ? 'selected' : '' }}>Damaged</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="type_item" class="form-label">Type</label>
            <select name="type_item" id="type_item" class="form-control" required>
                <option value="inventaris" {{ $item->type_item == 'inventaris' ? 'selected' : '' }}>Inventaris</option>
                <option value="bahan" {{ $item->type_item == 'bahan' ? 'selected' : '' }}>Bahan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
