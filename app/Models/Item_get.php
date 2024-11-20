<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGet extends Model
{
    use HasFactory;

    protected $table = 'item_gets';

    // Tentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'item_id',
        'item_name',
        'total_item',
        'date_in',
        'type_item',
    ];

    // Relasi dengan tabel item, jika item memiliki relasi one-to-many
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
