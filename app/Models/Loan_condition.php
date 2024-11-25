<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_condition extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'status_condition',
        'damage_report',
        'photo_report',
        'responsibility',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
