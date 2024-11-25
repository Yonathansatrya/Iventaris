@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Item/index.css') }}">
<div class="container">
    <h1>Item List</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('item.create') }}" class="btn btn-create mb-3">Create Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>Item Number</th>
                <th>Item Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->item_number }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-edit btn-sm">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No items found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
