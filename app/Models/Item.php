<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_item',
        'item_name',
        'type_item',
        'total_item',
        'date_in_item',
        'status',
    ];

    // Status item yang dapat dipilih
    const STATUS_AVAILABLE = 'available';
    const STATUS_DAMAGED = 'damaged';
    const STATUS_NOT_AVAILABLE = 'not_available';
    const STATUS_LOANED = 'loaned';

    public function uses()
    {
        return $this->hasMany(ItemUse::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function itemConditions()
    {
        return $this->hasMany(ItemCondition::class);
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_AVAILABLE => 'Tersedia',
            self::STATUS_DAMAGED => 'Rusak',
            self::STATUS_NOT_AVAILABLE => 'Tidak Tersedia',
            self::STATUS_LOANED => 'Dipinjamkan',
        ];
    }
}
