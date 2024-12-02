@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Penggunaan Item</h1>

    <form action="{{ route('item_use.update', $itemUse->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $itemUse->item_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $itemUse->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="user_id">Pengguna</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $itemUse->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="use_date">Tanggal Penggunaan</label>
            <input type="date" name="use_date" id="use_date" class="form-control" value="{{ $itemUse->use_date }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
