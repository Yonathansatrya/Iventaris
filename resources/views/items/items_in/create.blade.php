@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Item</h1>
    <form action="{{ route('items_in.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="specification" class="form-label">Specification</label>
            <textarea name="specification" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="procurement_sources" class="form-label">Procurement Sources</label>
            <input type="text" name="procurement_sources" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total_item" class="form-label">Total Items</label>
            <input type="number" name="total_item" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <select name="condition" class="form-control" required>
                <option value="Good">Good</option>
                <option value="Damaged">Damaged</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="type_item" class="form-label">Type</label>
            <input type="text" name="type_item" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
