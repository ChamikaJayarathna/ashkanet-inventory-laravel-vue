<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHistory extends Model
{

    protected $fillable = ['item_id', 'action', 'quantity'];

    /** @use HasFactory<\Database\Factories\InventoryHistoryFactory> */
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
