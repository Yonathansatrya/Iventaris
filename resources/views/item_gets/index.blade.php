@extends('layouts.app')

@section('content')
    <h2>Item Gets List</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('item_gets.create') }}" class="btn btn-primary">Add New Item</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Total Item</th>
                <th>Date In</th>
                <th>Type Item</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itemGets as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->total_item }}</td>
                    <td>{{ $item->date_in }}</td>
                    <td>{{ $item->type_item }}</td>
                    <td>
                        <a href="{{ route('item_gets.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('item_gets.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
