<?php

namespace App\Http\Controllers;

use App\Models\Item; // Import the Item model
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Display a listing of items
    public function index()
    {
        $items = Item::all(); // Get all items
        return view('items.index', compact('items')); // Return view with items
    }

    // Show the form for creating a new item
    public function create()
    {
        return view('items.create'); // Show create item form
    }

    // Store a newly created item in storage
    public function store(Request $request)
    {
        // Validate and store the item
        $validatedData = $request->validate([
            'item_number' => 'required|string|max:255|unique:items',
            'item_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        Item::create($validatedData); // Create the item

        return redirect()->route('items.index')->with('success', 'Item created successfully.'); // Redirect with success message
    }

    // Display the specified item
    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Show item details
    }

    // Show the form for editing the specified item
    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Show edit item form
    }

    // Update the specified item in storage
    public function update(Request $request, Item $item)
    {
        // Validate and update the item
        $validatedData = $request->validate([
            'item_number' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        $item->update($validatedData); // Update the item

        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Redirect with success message
    }

    // Remove the specified item from storage
    public function destroy(Item $item)
    {
        $item->delete(); // Delete the item

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Redirect with success message
    }
}

