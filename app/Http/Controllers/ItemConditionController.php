<?php

namespace App\Http\Controllers;

use App\Models\ItemCondition;
use Illuminate\Http\Request;

class ItemConditionController extends Controller
{
    public function index()
    {
        $itemConditions = ItemCondition::all();
        return view('item_conditions.index', compact('itemConditions'));
    }
    public function create()
    {
        return view('item_conditions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'condition_status' => 'required|in:normal,rusak_ringan,rusak_berat',
            'description' => 'nullable|string',
            'damage_report' => 'nullable|string',
            'responsibility' => 'nullable|string'
        ]);

        ItemCondition::create($request->all());

        return redirect()->route('item_conditions.index')
                         ->with('success', 'Item condition created successfully.');
    }

    public function edit(ItemCondition $itemCondition)
    {
        return view('item_conditions.edit', compact('itemCondition'));
    }

    public function update(Request $request, ItemCondition $itemCondition)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'condition_status' => 'required|in:normal,rusak_ringan,rusak_berat',
            'description' => 'nullable|string',
            'damage_report' => 'nullable|string',
            'responsibility' => 'nullable|string'
        ]);

        $itemCondition->update($request->all());

        return redirect()->route('item_conditions.index')
                         ->with('success', 'Item condition updated successfully.');
    }
    public function destroy(ItemCondition $itemCondition)
    {
        $itemCondition->delete();

        return redirect()->route('item_conditions.index')
                         ->with('success', 'Item condition deleted successfully.');
    }
}

