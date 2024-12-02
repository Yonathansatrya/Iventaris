@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Item Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $item->item_name }}</h5>
            <p class="card-text">Specification: {{ $item->specification }}</p>
            <p class="card-text">Procurement Sources: {{ $item->procurement_sources }}</p>
            <p class="card-text">Total Items: {{ $item->total_item }}</p>
            <p class="card-text">Condition: {{ $item->condition }}</p>
            <p class="card-text">Type: {{ $item->type_item }}</p>
        </div>
    </div>
    <a href="{{ route('items_in.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
