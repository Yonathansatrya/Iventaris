@extends('layouts.app')

@section('content')
    <h2>Create Item Condition</h2>
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
    <form action="{{ route('item_conditions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="loan_id">Loan ID:</label>
            <input type="number" name="loan_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="condition_status">Condition Status:</label>
            <select name="condition_status" class="form-control">
                <option value="normal">Normal</option>
                <option value="rusak_ringan">Rusak Ringan</option>
                <option value="rusak_berat">Rusak Berat</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="damage_report">Damage Report:</label>
            <input type="text" name="damage_report" class="form-control">
        </div>

        <div class="form-group">
            <label for="responsibility">Responsibility:</label>
            <input type="text" name="responsibility" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('item_conditions.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
@endsection
