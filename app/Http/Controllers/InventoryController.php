<?php

namespace App\Http\Controllers;

use App\Models\InventoryHistory;
use App\Models\Item;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
    }

    public function addItem(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'unit' => 'required|string',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        $item = Item::firstOrCreate(
            ['name' => $data['name']],
            ['unit' => $data['unit'], 'quantity' => 0]
        );

        $item->quantity += $data['quantity'];
        $item->save();

        InventoryHistory::create([
            'item_id' => $item->id,
            'action' => 'Added',
            'quantity' => $data['quantity']
        ]);

        return redirect()->back()->with('success', 'Item added successfully');
    }

    public function deductItem()
    {
    }

    public function history()
    {
    }

    public function search()
    {
    }
}
