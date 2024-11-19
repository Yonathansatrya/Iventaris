<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'item_id',
        'name_borrows',
        'borrow_date',
        'return_date',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
