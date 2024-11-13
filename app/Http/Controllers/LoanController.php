<?php

namespace App\Http\Controllers;

use App\Models\Loan; // Import Loan model
use App\Models\User; // Import User model
use App\Models\Item; // Import Item model
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'item'])->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $users = User::all();
        $items = Item::where('status', 'available')->get();
        return view('loans.create', compact('users', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'borrow_date' => 'required|date',
        ]);

        $loan = Loan::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'borrow_date' => $request->borrow_date,
            'status' => 'borrowed',
        ]);

        // Update item status to 'borrowed'
        $loan->item->update(['status' => 'borrowed']);

        return redirect()->route('loans.index')->with('success', 'Loan created successfully!');
    }

    public function returnItem(Loan $loan)
    {
        $loan->update(['return_date' => now(), 'status' => 'returned']);
        $loan->item->update(['status' => 'available']);
        return redirect()->route('loans.index');
    }
}
