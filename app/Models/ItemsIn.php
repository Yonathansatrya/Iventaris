<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsIn extends Model
{
    use HasFactory;


    protected $fillable = ['item_name', 'specification', 'procurement_sources', 'total_item', 'condition', 'type_item'];

    public function uses()
    {
        return $this->hasMany(ItemUse::class, 'item_id');
    }

    public function damages()
    {
        return $this->hasMany(DamageItem::class, 'item_id');
    }

    public function loans()
    {
        return $this->hasMany(Loans::class, 'item_id');
    }


    protected $table = 'items_in';
}
