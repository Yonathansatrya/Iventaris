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
    public function indexItemsIn()
    {
        $items = ItemsIn::all();
        return view('items.items_in.index', compact('items'));
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

    // CRUD untuk ItemUse
    public function indexItemUse()
    {
        $itemUses = ItemUse::all();
        return view('items.item_use.index', compact('itemUses'));
    }

    public function createItemUse()
    {
        $items = ItemsIn::all(); // Untuk select item
        return view('items.item_use.create', compact('items'));
    }

    public function storeItemUse(Request $request)
    {
        ItemUse::create($request->all());
        return redirect()->route('item_use.index')->with('success', 'Penggunaan item berhasil ditambahkan');
    }

    public function editItemUse($id)
    {
        $itemUse = ItemUse::findOrFail($id);
        $items = ItemsIn::all(); // Untuk select item
        return view('items.item_use.edit', compact('itemUse', 'items'));
    }

    public function updateItemUse(Request $request, $id)
    {
        $itemUse = ItemUse::findOrFail($id);
        $itemUse->update($request->all());
        return redirect()->route('item_use.index')->with('success', 'Penggunaan item berhasil diperbarui');
    }

    public function showItemUse($id)
    {
        $itemUse = ItemUse::findOrFail($id);
        return view('items.item_use.show', compact('itemUse'));
    }

    public function deleteItemUse($id)
    {
        ItemUse::destroy($id);
        return redirect()->route('item_use.index')->with('success', 'Penggunaan item berhasil dihapus');
    }

    // CRUD untuk DamageItem
    public function indexDamageItem()
    {
        $damages = DamageItem::all();
        return view('items.damage_item.index', compact('damages'));
    }

    public function createDamageItem()
    {
        $items = ItemsIn::all();
        return view('items.damage_item.create', compact('items'));
    }

    public function storeDamageItem(Request $request)
    {
        DamageItem::create($request->all());
        return redirect()->route('damage_item.index')->with('success', 'Kerusakan item berhasil ditambahkan');
    }

    public function editDamageItem($id)
    {
        $damage = DamageItem::findOrFail($id);
        $items = ItemsIn::all();
        return view('items.damage_item.edit', compact('damage', 'items'));
    }

    public function updateDamageItem(Request $request, $id)
    {
        $damage = DamageItem::findOrFail($id);
        $damage->update($request->all());
        return redirect()->route('damage_item.index')->with('success', 'Kerusakan item berhasil diperbarui');
    }

    public function showDamageItem($id)
    {
        $damage = DamageItem::findOrFail($id);
        return view('items.damage_item.show', compact('damage'));
    }

    public function deleteDamageItem($id)
    {
        DamageItem::destroy($id);
        return redirect()->route('damage_item.index')->with('success', 'Kerusakan item berhasil dihapus');
    }

    // CRUD untuk RepairDamageItem
    public function indexRepairDamageItem()
    {
        $repairs = RepairDamageItem::all();
        return view('items.repair_damage_item.index', compact('repairs'));
    }

    public function createRepairDamageItem()
    {
        $damages = DamageItem::all();
        return view('items.repair_damage_item.create', compact('damages'));
    }

    public function storeRepairDamageItem(Request $request)
    {
        RepairDamageItem::create($request->all());
        return redirect()->route('repair_damage_item.index')->with('success', 'Perbaikan item berhasil ditambahkan');
    }

    public function editRepairDamageItem($id)
    {
        $repair = RepairDamageItem::findOrFail($id);
        $damages = DamageItem::all();
        return view('items.repair_damage_item.edit', compact('repair', 'damages'));
    }

    public function updateRepairDamageItem(Request $request, $id)
    {
        $repair = RepairDamageItem::findOrFail($id);
        $repair->update($request->all());
        return redirect()->route('repair_damage_item.index')->with('success', 'Perbaikan item berhasil diperbarui');
    }

    public function showRepairDamageItem($id)
    {
        $repair = RepairDamageItem::findOrFail($id);
        return view('items.repair_damage_item.show', compact('repair'));
    }

    public function deleteRepairDamageItem($id)
    {
        RepairDamageItem::destroy($id);
        return redirect()->route('repair_damage_item.index')->with('success', 'Perbaikan item berhasil dihapus');
    }
}
