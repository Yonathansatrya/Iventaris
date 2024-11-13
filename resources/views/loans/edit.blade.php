@extends('layout.side_nav')

@section('content')
<link rel="stylesheet" href="{{ asset('css/loans/edit.css') }}">
<div class="loan-edit-container">
    <h1>Edit Loan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $loan->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $loan->item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->item_name }} ({{ $item->item_number }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="borrow_date">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ old('borrow_date', $loan->borrow_date->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Loan</button>
            <a href="{{ route('loans.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
