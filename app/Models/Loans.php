<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = ['name_loan', 'item_id', 'role', 'specification', 'total_loans', 'loan_start_date', 'loan_end_date', 'description', 'status'];

    public function item()
    {
        return $this->belongsTo(ItemsIn::class, 'item_id');
    }

    public function condition()
    {
        return $this->hasOne(LoansCondition::class, 'loan_id');
    }

    public function responsibility()
    {
        return $this->hasOne(ResponsibilityItemLoans::class, 'loan_id');
    }
}
