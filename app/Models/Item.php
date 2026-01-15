<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['name', 'unit', 'quantity'];

    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    public function history(){
        return $this->hasMany(InventoryHistory::class);
    }

}
