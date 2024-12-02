@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content-header mb-4">
        <h1>Tambah Item Rusak</h1>
    </div>

    <div class="form-container">
        <form action="{{ route('items.damage.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="item_id">Barang</label>
                <select name="item_id" id="item_id" class="form-control" required>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Jumlah Kerusakan</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="damage_date">Tanggal Kerusakan</label>
                <input type="date" name="damage_date" id="damage_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="damage_description">Deskripsi Kerusakan</label>
                <textarea name="damage_description" id="damage_description" class="form-control" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="type_item">Tipe Barang</label>
                <input type="text" name="type_item" id="type_item" class="form-control" readonly>
            </div>            

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('items.damage.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/Item/damage/create.css') }}">
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
