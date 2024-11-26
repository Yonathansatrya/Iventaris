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
    public function createItemIn(Request $request)
    {
        $item = ItemsIn::create($request->all());
        return response()->json($item);
    }

    public function getItemIn($id)
    {
        return ItemsIn::findOrFail($id);
    }

    public function updateItemIn(Request $request, $id)
    {
        $item = ItemsIn::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function deleteItemIn($id)
    {
        ItemsIn::destroy($id);
        return response()->json(['message' => 'Item deleted successfully']);
    }

    // CRUD untuk ItemUse
    public function createItemUse(Request $request)
    {
        $itemUse = ItemUse::create($request->all());
        return response()->json($itemUse);
    }

    public function getItemUse($id)
    {
        return ItemUse::findOrFail($id);
    }

    public function updateItemUse(Request $request, $id)
    {
        $itemUse = ItemUse::findOrFail($id);
        $itemUse->update($request->all());
        return response()->json($itemUse);
    }

    public function deleteItemUse($id)
    {
        ItemUse::destroy($id);
        return response()->json(['message' => 'ItemUse deleted successfully']);
    }

    // CRUD untuk DamageItem
    public function createDamageItem(Request $request)
    {
        $damageItem = DamageItem::create($request->all());
        return response()->json($damageItem);
    }

    public function getDamageItem($id)
    {
        return DamageItem::with('repairs')->findOrFail($id);
    }

    public function updateDamageItem(Request $request, $id)
    {
        $damageItem = DamageItem::findOrFail($id);
        $damageItem->update($request->all());
        return response()->json($damageItem);
    }

    public function deleteDamageItem($id)
    {
        DamageItem::destroy($id);
        return response()->json(['message' => 'DamageItem deleted successfully']);
    }

    // CRUD untuk RepairDamageItem
    public function createRepairDamageItem(Request $request)
    {
        $repairDamageItem = RepairDamageItem::create($request->all());
        return response()->json($repairDamageItem);
    }

    public function getRepairDamageItem($id)
    {
        return RepairDamageItem::findOrFail($id);
    }

    public function updateRepairDamageItem(Request $request, $id)
    {
        $repairDamageItem = RepairDamageItem::findOrFail($id);
        $repairDamageItem->update($request->all());
        return response()->json($repairDamageItem);
    }

    public function deleteRepairDamageItem($id)
    {
        RepairDamageItem::destroy($id);
        return response()->json(['message' => 'RepairDamageItem deleted successfully']);
    }
}
