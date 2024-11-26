<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoansCondition extends Model
{
    use HasFactory;

    protected $fillable = ['loan_id', 'specification', 'total_loan', 'date_return_item', 'status_condition', 'damage_report', 'photo_report'];

    public function loan()
    {
        return $this->belongsTo(Loans::class, 'loan_id');
    }
}
