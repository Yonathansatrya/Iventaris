<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'item_number',
        'item_name',
        'type_item',
        'status',
        'total_item',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function itemConditions()
    {
        return $this->hasMany(ItemCondition::class);
    }
}
