<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsibilityItemLoans extends Model
{
    use HasFactory;

    protected $fillable = ['loan_id', 'total_loan', 'description_responsibility'];

    public function loan()
    {
        return $this->belongsTo(Loans::class, 'loan_id');
    }
}
