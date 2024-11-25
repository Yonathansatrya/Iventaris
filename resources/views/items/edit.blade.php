@extends('layout.side_nav')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Item/edit.css') }}">
<div class="container">
    <h1>Edit Item</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('item.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="item_number">Item Number</label>
            <input type="text" id="item_number" name="item_number" value="{{ old('item_number', $item->item_number) }}" required>
            @error('item_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" id="item_name" name="item_name" value="{{ old('item_name', $item->item_name) }}" required>
            @error('item_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $item->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="">Select Status</option>
                <option value="available" {{ $item->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ $item->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                <option value="damaged" {{ $item->status == 'damaged' ? 'selected' : '' }}>Damaged</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Update Item</button>
            <a href="{{ route('item.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
