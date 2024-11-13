@extends('layout.side_nav')

@section('content')
<link rel="stylesheet" href="{{ asset('css/loans/tampilan.css') }}">
<div class="loan-records-container">
    <h1>Loan Records</h1>
    <a href="{{ route('loans.create') }}" class="create-button">Create New Loan</a>
    <table class="loan-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Item</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->user->username }}</td>
                    <td>{{ $loan->item->item_name }}</td>
                    <td>{{ $loan->borrow_date }}</td>
                    <td>{{ $loan->return_date ?? 'Not Returned' }}</td>
                    <td>{{ $loan->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
