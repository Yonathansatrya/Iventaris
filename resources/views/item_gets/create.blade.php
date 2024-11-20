@extends('layouts.app')

@section('content')
    <h2>Add New Item</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('item_gets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_item">Total Item:</label>
            <input type="number" name="total_item" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_in">Date In:</label>
            <input type="date" name="date_in" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="type_item">Type Item:</label>
            <select name="type_item" class="form-control">
                <option value="inventaris">Inventaris</option>
                <option value="bahan">Bahan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('item_gets.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
@endsection
