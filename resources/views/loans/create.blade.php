@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/loans/create.css') }}">
<div class="loan-create-container">
    <h1>Create New Loan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                <option value="">Select Item</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->item_name }} ({{ $item->item_number }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="borrow_date">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ old('borrow_date') }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Loan</button>
        </div>
    </form>
</div>
@endsection
