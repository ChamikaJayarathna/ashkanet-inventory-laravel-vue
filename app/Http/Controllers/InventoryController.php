<?php

namespace App\Http\Controllers;

use App\Models\InventoryHistory;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryController extends Controller
{
    public function index() {}

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

    public function deductItem(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        $item = Item::findOrFail($data['item_id']);

        // Check if enough stock exists
        if ($item->quantity < $data['quantity']) {
            return redirect()->back()->with('error', 'Cannot deduct more than available quantity');
        }

        $item->quantity -= $data['quantity'];
        $item->save();

        InventoryHistory::create([
            'item_id' => $item->id,
            'action' => 'Deducted',
            'quantity' => $data['quantity']
        ]);

        return redirect()->back()->with('success', 'Item deducted successfully');
    }

    public function history(Item $item)
    {
        $history = $item->history()->orderBy('created_at', 'desc')->get();

        // return Inertia::render('Inventory/History', [
        //     'item' => $item,
        //     'history' => $history,
        // ]);
    }

    public function search() {}
}
