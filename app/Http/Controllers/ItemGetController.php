<?php

namespace App\Http\Controllers;

use App\Models\ItemGet;
use Illuminate\Http\Request;

class ItemGetController extends Controller
{
    public function index()
    {
        $itemGets = ItemGet::all();
        return view('item_gets.index', compact('itemGets'));
    }


    public function create()
    {
        return view('item_gets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'item_name' => 'required|string|max:255',
            'total_item' => 'required|integer',
            'date_in' => 'required|date',
            'type_item' => 'required|in:inventaris,bahan',
        ]);
        ItemGet::create($request->all());
        return redirect()->route('item_gets.index')
            ->with('success', 'Item created successfully.');
    }

    public function edit(ItemGet $itemGet)
    {
        return view('item_gets.edit', compact('itemGet'));
    }
    public function update(Request $request, ItemGet $itemGet)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'item_name' => 'required|string|max:255',
            'total_item' => 'required|integer',
            'date_in' => 'required|date',
            'type_item' => 'required|in:inventaris,bahan',
        ]);
        $itemGet->update($request->all());
        return redirect()->route('item_gets.index')
            ->with('success', 'Item updated successfully.');
    }
    public function destroy(ItemGet $itemGet)
    {
        $itemGet->delete();
        return redirect()->route('item_gets.index')
            ->with('success', 'Item deleted successfully.');
    }
}
