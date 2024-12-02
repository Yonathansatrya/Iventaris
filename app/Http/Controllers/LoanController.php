<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\LoansCondition;
use App\Models\ResponsibilityItemLoans;
use App\Models\ItemsIn;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Loans Management
    public function indexLoans()
    {
        $loans = Loans::all();
        return view('loans.index', compact('loans'));
    }

    public function createLoan()
    {
        $items = ItemsIn::all();
        return view('loans.create', compact('items'));
    }

    public function storeLoan(Request $request)
    {
        $validated = $request->validate([
            'name_loan' => 'required|string|unique:loans,name_loan',
            'item_id' => 'required|exists:items_in,id',
            'role' => 'required|in:murid,karyawan',
            'specification' => 'required|string',
            'total_loans' => 'required|integer|min:1',
            'loan_start_date' => 'required|date',
            'loan_end_date' => 'required|date|after:loan_start_date',
            'status' => 'required|in:baik,rusak',
        ]);
    
        $item = ItemsIn::findOrFail($validated['item_id']);
        if ($validated['total_loans'] > $item->total_item) {
            return response()->json(['error' => 'Jumlah peminjaman melebihi stok barang'], 400);
        }
    
        Loans::create([
            'name_loan' => $validated['name_loan'],
            'item_id' => $validated['item_id'],
            'role' => $validated['role'],
            'specification' => $validated['specification'],
            'total_loans' => $validated['total_loans'],
            'loan_start_date' => $validated['loan_start_date'],
            'loan_end_date' => $validated['loan_end_date'],
            'description' => $request->description,
            'status' => $validated['status'],
        ]);
    
        return redirect()->route('loans.index')->with('success', 'Pinjaman berhasil ditambahkan');
    }
    

    public function editLoan($id)
    {
        $loan = Loans::findOrFail($id);
        $items = ItemsIn::all();
        return view('loans.edit', compact('loan', 'items'));
    }

    public function updateLoan(Request $request, $id)
    {
        $loan = Loans::findOrFail($id);
    
        $validated = $request->validate([
            'name_loan' => 'required|string|unique:loans,name_loan,' . $loan->id,
            'item_id' => 'required|exists:items_in,id',
            'role' => 'required|in:murid,karyawan',
            'specification' => 'required|string',
            'total_loans' => 'required|integer|min:1',
            'loan_start_date' => 'required|date',
            'loan_end_date' => 'required|date|after:loan_start_date',
            'status' => 'required|in:baik,rusak',
        ]);
    
        $item = ItemsIn::findOrFail($validated['item_id']);
        if ($validated['total_loans'] > $item->total_item) {
            return response()->json(['error' => 'Jumlah peminjaman melebihi stok barang'], 400);
        }
    
        $loan->update([
            'name_loan' => $validated['name_loan'],
            'item_id' => $validated['item_id'],
            'role' => $validated['role'],
            'specification' => $validated['specification'],
            'total_loans' => $validated['total_loans'],
            'loan_start_date' => $validated['loan_start_date'],
            'loan_end_date' => $validated['loan_end_date'],
            'description' => $request->description,
            'status' => $validated['status'],
        ]);
    
        return redirect()->route('loans.index')->with('success', 'Pinjaman berhasil diperbarui');
    }
    

    public function deleteLoan($id)
    {
        Loans::destroy($id);
        return redirect()->route('loans.index');
    }

    // Loans Condition Management
    public function indexLoanConditions()
    {
        $conditions = LoansCondition::all();
        return view('loans_conditions.index', compact('conditions'));
    }

    public function createLoanCondition()
    {
        $loans = Loans::all();
        return view('loans_conditions.create', compact('loans'));
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
        return redirect()->route('loan_conditions.index');
    }

    public function editLoanCondition($id)
    {
        $condition = LoansCondition::findOrFail($id);
        $loans = Loans::all();
        return view('loans_conditions.edit', compact('condition', 'loans'));
    }

    public function updateLoanCondition(Request $request, $id)
    {
        $condition = LoansCondition::findOrFail($id);
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'date_return_item' => 'required|date',
            'status_condition' => 'required|in:normal,rusak_ringan,rusak_berat',
            'damage_report' => 'nullable|string',
            'photo_report' => 'nullable|image|max:2048',
        ]);

        $condition->update($validated);
        return redirect()->route('loan_conditions.index');
    }

    public function deleteLoanCondition($id)
    {
        LoansCondition::destroy($id);
        return redirect()->route('loans_conditions.index');
    }

    // Responsibility Loans Management
    public function indexResponsibilityLoans()
    {
        $responsibilities = ResponsibilityItemLoans::all();
        return view('responsibility_loans.index', compact('responsibilities'));
    }

    public function createResponsibilityLoan()
    {
        $loans = Loans::all();
        return view('responsibility_loans.create', compact('loans'));
    }

    public function storeResponsibilityLoan(Request $request)
    {
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'description_responsibility' => 'required|string',
        ]);

        ResponsibilityItemLoans::create($validated);
        return redirect()->route('responsibility_loans.index');
    }

    public function editResponsibilityLoan($id)
    {
        $responsibility = ResponsibilityItemLoans::findOrFail($id);
        $loans = Loans::all();
        return view('responsibility_loans.edit', compact('responsibility', 'loans'));
    }

    public function updateResponsibilityLoan(Request $request, $id)
    {
        $responsibility = ResponsibilityItemLoans::findOrFail($id);
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'description_responsibility' => 'required|string',
        ]);

        $responsibility->update($validated);
        return redirect()->route('responsibility_loans.index');
    }

    public function deleteResponsibilityLoan($id)
    {
        ResponsibilityItemLoans::destroy($id);
        return redirect()->route('responsibility_loans.index');
    }
}
