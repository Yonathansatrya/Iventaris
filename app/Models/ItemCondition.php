<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'condition_status',
        'description',
        'damage_report',
        'responsibility'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
