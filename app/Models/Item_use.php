<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'total_use',
        'description',
        'status',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
