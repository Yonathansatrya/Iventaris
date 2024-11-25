<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanCondition;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoanController extends Controller
{
    public function create()
    {
        $items = Item::where('type_item', 'inventaris')->get();
        return view('loans.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'item_id' => 'required|exists:items,id',
            'borrow_start_date' => 'required|date',
            'borrow_end_date' => 'required|date|after_or_equal:borrow_start_date',
            'description' => 'nullable|string|max:255',
        ]);

        Loan::create([
            'student_name' => $request->student_name,
            'item_id' => $request->item_id,
            'borrow_start_date' => $request->borrow_start_date,
            'borrow_end_date' => $request->borrow_end_date,
            'description' => $request->description,
        ]);

        return redirect()->route('loans.index')->with('success', 'Peminjaman barang berhasil.');
    }

    public function index()
    {
        $loans = Loan::with('item')->get();
        return view('loans.index', compact('loans'));
    }

    public function returnItem(Loan $loan)
    {
        return view('loans.return', compact('loan'));
    }

    public function storeCondition(Request $request, Loan $loan)
    {
        $request->validate([
            'status_condition' => 'required|in:normal,rusak_ringan,rusak_berat',
            'damage_report' => 'nullable|string|max:255',
            'photo_report' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'responsibility' => 'required|string|max:255',
        ]);

        $photoReportPath = null;
        if ($request->hasFile('photo_report')) {
            $photoReportPath = $request->file('photo_report')->store('damage_photos');
        }

        LoanCondition::create([
            'loan_id' => $loan->id,
            'status_condition' => $request->status_condition,
            'damage_report' => $request->damage_report,
            'photo_report' => $photoReportPath,
            'responsibility' => $request->responsibility,
        ]);

        return redirect()->route('loans.index')->with('success', 'Kondisi barang berhasil dicatat.');
    }
}
