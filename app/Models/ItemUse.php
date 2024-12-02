<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemUse extends Model
{
    use HasFactory;

    protected $table = 'item_use';
    protected $fillable = ['item_id', 'total_use', 'date_use', 'description'];

    public function item()
    {
        return $this->belongsTo(ItemsIn::class, 'item_id');
    }
}
