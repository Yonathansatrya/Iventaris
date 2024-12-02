<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairDamageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'damage_item_id',
        'information',
        'repair_completion_date',
        'name_technician',
    ];

    public function damage()
    {
        return $this->belongsTo(DamageItem::class, 'damage_item_id');
    }
}
