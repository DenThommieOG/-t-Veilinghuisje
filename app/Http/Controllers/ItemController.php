<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ItemController extends Controller
{
    //

    public function create($id)
    {
        return view('auctions.items.create', [
            'auction' => Auction::find($id),
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'auctionId' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required', File::image()
        ]);

        $filePath = $request->file('photo')->store('photos', 'public');
        Storage::setVisibility($filePath, 'public');

        $item = new Item();

        $item->auction_id = $validated['auctionId'];
        $item->name = $validated['name'];
        $item->description = $validated['description'];
        $item->photo_path = $filePath;
        $item->save();

        return redirect()->route('auction.list');
    }
}
