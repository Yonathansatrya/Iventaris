@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Item Rusak</h1>

    <form action="{{ route('damaged-items.update', $damagedItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $damagedItem->item_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah Kerusakan</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $damagedItem->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="damage_date">Tanggal Kerusakan</label>
            <input type="date" name="damage_date" id="damage_date" class="form-control" value="{{ $damagedItem->damage_date }}" required>
        </div>

        <div class="form-group">
            <label for="damage_description">Deskripsi Kerusakan</label>
            <textarea name="damage_description" id="damage_description" class="form-control" rows="4" required>{{ $damagedItem->damage_description }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('damaged-items.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        
        <div class="form-group">
            <label for="type_item">Tipe Barang</label>
            <input type="text" name="type_item" id="type_item" class="form-control" value="{{ old('type_item', $damagedItem->item->type_item) }}" readonly>
        </div>        
        
    </form>
</div>
<link rel="stylesheet" href="{{ asset('css/Item/damage/edit.css') }}">
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const itemSelect = document.getElementById('item_id');
        const typeItemInput = document.getElementById('type_item');

        // Function to update type item based on selected item
        itemSelect.addEventListener('change', function () {
            const selectedOption = itemSelect.options[itemSelect.selectedIndex];
            const typeItem = selectedOption.getAttribute('data-type');
            typeItemInput.value = typeItem;  // Set the type item field value
        });

        // Trigger change event on page load in case an item is already selected (for edit form)
        if (itemSelect.value) {
            itemSelect.dispatchEvent(new Event('change'));
        }
    });
</script>

@endsection
