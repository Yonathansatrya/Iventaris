<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'date_damage', 'total_item', 'type_item'];

    public function item()
    {
        return $this->belongsTo(ItemsIn::class, 'item_id');
    }

    public function repairs()
    {
        return $this->hasMany(RepairDamageItem::class, 'damage_item_id');
    }
}

