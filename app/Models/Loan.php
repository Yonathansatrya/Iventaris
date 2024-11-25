<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'item_id',
        'borrow_start_date',
        'borrow_end_date',
        'description',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function condition()
    {
        return $this->hasOne(Loan_condition::class);
    }
}
