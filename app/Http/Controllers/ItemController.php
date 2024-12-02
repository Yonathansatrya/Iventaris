<?php

namespace App\Http\Controllers;

use App\Models\ItemsIn;
use App\Models\ItemUse;
use App\Models\DamageItem;
use App\Models\RepairDamageItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // CRUD untuk ItemsIn
    public function indexInventaris()
    {
        $items = Item::where('type_item', 'inventaris')->get();
        return view('items_in.index_inventaris', compact('items'));
    }

    public function indexBahan()
    {
        $items = Item::where('type_item', 'bahan')->get();
        return view('items_in.index_bahan', compact('items'));
    }


    public function createItemsIn()
    {
        return view('items.items_in.create');
    }
    public function storeItemsIn(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|unique:items_in,item_name',
            'specification' => 'required|unique:items_in,specification',
            'procurement_sources' => 'required',
            'total_item' => 'required|integer',
            'condition' => 'required',
            'type_item' => 'required|in:inventaris,bahan',
        ]);

        ItemsIn::create($validated);

        return redirect()->route('items_in.index')->with('success', 'Item berhasil ditambahkan');
    }

    public function editItemsIn($id)
    {
        $item = ItemsIn::findOrFail($id);
        return view('items.items_in.edit', compact('item'));
    }

    public function updateItemsIn(Request $request, $id)
    {
        $item = ItemsIn::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('items_in.index')->with('success', 'Item berhasil diperbarui');
    }

    public function showItemsIn($id)
    {
        $item = ItemsIn::findOrFail($id);
        return view('items.items_in.show', compact('item'));
    }

    public function deleteItemsIn($id)
    {
        ItemsIn::destroy($id);
        return redirect()->route('items_in.index')->with('success', 'Item berhasil dihapus');
    }

    // ----- Item Use -----
    public function indexItemUse()
    {
        $itemUses = ItemUse::with('item')->get();
        return view('items.item_use.index', compact('itemUses'));
    }

    public function createItemUse()
    {
        $items = ItemsIn::all();
        return view('items.item_use.create', compact('items'));
    }

    public function storeItemUse(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items_in,id',
            'total_use' => 'required|integer|min:1',
            'date_use' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        ItemUse::create($validated);

        return redirect()->route('items.use.index')->with('success', 'Penggunaan item berhasil ditambahkan');
    }

    public function editItemUse($id)
    {
        $itemUse = ItemUse::findOrFail($id);
        $items = ItemsIn::all();
        return view('items.item_use.edit', compact('itemUse', 'items'));
    }

    public function updateItemUse(Request $request, $id)
    {
        $itemUse = ItemUse::findOrFail($id);

        $validated = $request->validate([
            'item_id' => 'required|exists:items_in,id',
            'total_use' => 'required|integer|min:1',
            'date_use' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        $itemUse->update($validated);

        return redirect()->route('items.use.index')->with('success', 'Penggunaan item berhasil diperbarui');
    }

    // ----- Damage Item -----
    public function indexDamageItem()
    {
        $damages = DamageItem::with('item')->get();
        return view('items.damage_items.index', compact('damages'));
    }

    public function createDamageItem()
    {
        $items = ItemsIn::all();
        return view('items.damage_items.create', compact('items'));
    }

    public function storeDamageItem(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items_in,id',
            'date_damage' => 'required|date',
            'total_item' => 'required|integer|min:1',
            'type_item' => 'required|in:inventaris,bahan',
        ]);

        DamageItem::create($validated);

        return redirect()->route('items.damage.index')->with('success', 'Kerusakan item berhasil ditambahkan');
    }

    public function editDamageItem($id)
    {
        $damage = DamageItem::findOrFail($id);
        $items = ItemsIn::all();
        return view('items.damage_items.edit', compact('damage', 'items'));
    }

    public function updateDamageItem(Request $request, $id)
    {
        $damage = DamageItem::findOrFail($id);

        $validated = $request->validate([
            'item_id' => 'required|exists:items_in,id',
            'date_damage' => 'required|date',
            'total_item' => 'required|integer|min:1',
            'type_item' => 'required|in:inventaris,bahan',
        ]);

        $damage->update($validated);

        return redirect()->route('items.damage.index')->with('success', 'Kerusakan item berhasil diperbarui');
    }

    // ----- Repair Damage Item -----
    public function indexRepairDamageItem()
    {
        $repairs = RepairDamageItem::with('damage')->get();
        return view('items.repair_damaged_items.index', compact('repairs'));
    }

    public function createRepairDamageItem()
    {
        $damages = DamageItem::all();
        return view('items.repair_damage_items.create', compact('damages'));
    }

    public function storeRepairDamageItem(Request $request)
    {
        $validated = $request->validate([
            'damage_item_id' => 'required|exists:damage_items,id',
            'information' => 'nullable|string|max:255',
            'repair_completion_date' => 'required|date',
            'name_technician' => 'required|string|max:255',
        ]);

        RepairDamageItem::create($validated);

        return redirect()->route('items.repair.index')->with('success', 'Perbaikan item berhasil ditambahkan');
    }

    public function editRepairDamageItem($id)
    {
        $repair = RepairDamageItem::findOrFail($id);
        $damages = DamageItem::all();
        return view('items.repair_damage_items.edit', compact('repair', 'damages'));
    }

    public function updateRepairDamageItem(Request $request, $id)
    {
        $repair = RepairDamageItem::findOrFail($id);

        $validated = $request->validate([
            'damage_item_id' => 'required|exists:damage_items,id',
            'information' => 'nullable|string|max:255',
            'repair_completion_date' => 'required|date',
            'name_technician' => 'required|string|max:255',
        ]);

        $repair->update($validated);

        return redirect()->route('items.repair.index')->with('success', 'Perbaikan item berhasil diperbarui');
    }
}
