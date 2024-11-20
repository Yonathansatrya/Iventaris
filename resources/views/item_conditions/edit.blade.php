@extends('layouts.app')

@section('content')
    <h2>Edit Item Condition</h2>
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
    <form action="{{ route('item_conditions.update', $itemCondition->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="loan_id">Loan ID:</label>
        <input type="number" name="loan_id" value="{{ $itemCondition->loan_id }}" required>

        <label for="condition_status">Condition Status:</label>
        <select name="condition_status">
            <option value="normal" {{ $itemCondition->condition_status == 'normal' ? 'selected' : '' }}>Normal</option>
            <option value="rusak_ringan" {{ $itemCondition->condition_status == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="rusak_berat" {{ $itemCondition->condition_status == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
        </select>

        <label for="description">Description:</label>
        <textarea name="description">{{ $itemCondition->description }}</textarea>

        <label for="damage_report">Damage Report:</label>
        <input type="text" name="damage_report" value="{{ $itemCondition->damage_report }}">

        <label for="responsibility">Responsibility:</label>
        <input type="text" name="responsibility" value="{{ $itemCondition->responsibility }}">

        <button type="submit">Update</button>
    </form>
@endsection
