@extends('layouts.app')

@section('content')
    <h2>Item Conditions List</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('item_conditions.create') }}" class="btn btn-primary">Add New Condition</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loan ID</th>
                <th>Condition Status</th>
                <th>Description</th>
                <th>Damage Report</th>
                <th>Responsibility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itemConditions as $condition)
                <tr>
                    <td>{{ $condition->id }}</td>
                    <td>{{ $condition->loan_id }}</td>
                    <td>{{ $condition->condition_status }}</td>
                    <td>{{ $condition->description }}</td>
                    <td>{{ $condition->damage_report }}</td>
                    <td>{{ $condition->responsibility }}</td>
                    <td>
                        <a href="{{ route('item_conditions.edit', $condition->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('item_conditions.destroy', $condition->id) }}" method="POST" style="display:inline-block;">
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
