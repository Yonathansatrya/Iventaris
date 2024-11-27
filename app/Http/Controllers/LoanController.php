<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\LoansCondition;
use App\Models\ResponsibilityItemLoans;
use App\Models\ItemsIn;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Loans
    public function index()
    {
        $loans = Loans::all();
        return view('loans.index', compact('loans'));
    }

    public function show($id)
    {
        $loan = Loans::with(['item', 'condition', 'responsibility'])->findOrFail($id);
        return view('loans.show', compact('loan'));
    }

    public function create()
    {
        $items = ItemsIn::all();
        return view('loans.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_loan' => 'required|string|unique:loans,name_loan',
            'item_id' => 'required|exists:items_in,id',
            'role' => 'required|in:Guru,Karyawan',
            'total_loans' => 'required|integer|min:1',
            'loan_start_date' => 'required|date',
            'loan_end_date' => 'required|date|after:loan_start_date',
            'status' => 'required|in:Baik,Rusak',
        ]);

        $item = ItemsIn::findOrFail($validated['item_id']);
        if ($validated['total_loans'] > $item->total_item) {
            return response()->json(['error' => 'Jumlah peminjaman melebihi stok barang'], 400);
        }

        Loans::create($validated);
        return redirect()->route('loans.index');
    }

    public function edit($id)
    {
        $loan = Loans::findOrFail($id);
        $items = ItemsIn::all();
        return view('loans.edit', compact('loan', 'items'));
    }

    public function update(Request $request, $id)
    {
        $loan = Loans::findOrFail($id);
        $validated = $request->validate([
            'name_loan' => 'required|string|unique:loans,name_loan,' . $loan->id,
            'item_id' => 'required|exists:items_in,id',
            'role' => 'required|in:Guru,Karyawan',
            'total_loans' => 'required|integer|min:1',
            'loan_start_date' => 'required|date',
            'loan_end_date' => 'required|date|after:loan_start_date',
            'status' => 'required|in:Baik,Rusak',
        ]);

        $item = ItemsIn::findOrFail($validated['item_id']);
        if ($validated['total_loans'] > $item->total_item) {
            return response()->json(['error' => 'Jumlah peminjaman melebihi stok barang'], 400);
        }

        $loan->update($validated);
        return redirect()->route('loans.index');
    }

    public function destroy($id)
    {
        Loans::destroy($id);
        return redirect()->route('loans.index');
    }

    // LoansCondition
    public function createLoanCondition()
    {
        $loans = Loans::all();
        return view('loans_condition.create', compact('loans'));
    }

    public function storeLoanCondition(Request $request)
    {
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'date_return_item' => 'required|date',
            'status_condition' => 'required|in:normal,rusak_ringan,rusak_berat',
            'damage_report' => 'nullable|string',
            'photo_report' => 'nullable|image|max:2048',
        ]);

        LoansCondition::create($validated);
        return redirect()->route('loans_condition.index');
    }

    public function showLoanCondition($id)
    {
        $loanCondition = LoansCondition::with('loan')->findOrFail($id);
        return view('loans_condition.show', compact('loanCondition'));
    }

    public function editLoanCondition($id)
    {
        $loanCondition = LoansCondition::findOrFail($id);
        $loans = Loans::all();
        return view('loans_condition.edit', compact('loanCondition', 'loans'));
    }

    public function updateLoanCondition(Request $request, $id)
    {
        $loanCondition = LoansCondition::findOrFail($id);
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'date_return_item' => 'required|date',
            'status_condition' => 'required|in:normal,rusak_ringan,rusak_berat',
            'damage_report' => 'nullable|string',
            'photo_report' => 'nullable|image|max:2048',
        ]);

        $loanCondition->update($validated);
        return redirect()->route('loans_condition.index');
    }

    public function destroyLoanCondition($id)
    {
        LoansCondition::destroy($id);
        return redirect()->route('loans_condition.index');
    }

    // ResponsibilityItemLoans
    public function createResponsibilityLoan()
    {
        $loans = Loans::all();
        return view('responsibility_item_loans.create', compact('loans'));
    }

    public function storeResponsibilityLoan(Request $request)
    {
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'description_responsibility' => 'required|string',
        ]);

        ResponsibilityItemLoans::create($validated);
        return redirect()->route('responsibility_item_loans.index');
    }

    public function showResponsibilityLoan($id)
    {
        $responsibilityLoan = ResponsibilityItemLoans::with('loan')->findOrFail($id);
        return view('responsibility_item_loans.show', compact('responsibilityLoan'));
    }

    public function editResponsibilityLoan($id)
    {
        $responsibilityLoan = ResponsibilityItemLoans::findOrFail($id);
        $loans = Loans::all();
        return view('responsibility_item_loans.edit', compact('responsibilityLoan', 'loans'));
    }

    public function updateResponsibilityLoan(Request $request, $id)
    {
        $responsibilityLoan = ResponsibilityItemLoans::findOrFail($id);
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'description_responsibility' => 'required|string',
        ]);

        $responsibilityLoan->update($validated);
        return redirect()->route('responsibility_item_loans.index');
    }

    public function destroyResponsibilityLoan($id)
    {
        ResponsibilityItemLoans::destroy($id);
        return redirect()->route('responsibility_item_loans.index');
    }
}
