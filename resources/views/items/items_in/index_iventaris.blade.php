@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Items - Inventaris</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('items_in.create') }}" class="btn btn-primary mb-3">Add New Item</a>

    @if($items->isEmpty())
        <div class="alert alert-warning">No Inventaris items available.</div>
    @else
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specification</th>
                    <th>Source</th>
                    <th>Total</th>
                    <th>Condition</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->specification }}</td>
                        <td>{{ $item->procurement_sources }}</td>
                        <td>{{ $item->total_item }}</td>
                        <td>{{ $item->condition }}</td>
                        <td>
                            <a href="{{ route('items_in.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('items_in.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('items_in.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
