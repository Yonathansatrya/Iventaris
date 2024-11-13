@extends('layout.side_nav')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Item/create.css') }}">
<div class="container">
    <h1>Create New Item</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_number">Item Number</label>
            <input type="text" id="item_number" name="item_number" required>
            @error('item_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" id="item_name" name="item_name" required>
            @error('item_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="">Select Status</option>
                <option value="available">Available</option>
                <option value="unavailable">Unavailable</option>
                <option value="damaged">Damaged</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Create Item</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
