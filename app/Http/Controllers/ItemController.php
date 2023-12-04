<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Auction;
use App\Models\Bid;
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
        $item->is_feature = $request->is_feature == 'on' ?: false;
        $item->save();

        return redirect()->route('auction.list');
    }
    public function show($id)
    {
        return view('auctions.items.show', [
            'item' => Item::find($id),
            'lastBid' => Bid::where('item_id', $id)->where('user_id', Auth()->id())->orderBy('created_at')->first(),
        ]);
    }
    public function edit($id)
    {
        return view('auctions.items.edit', [
            'item' => Item::find($id),
        ]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable', File::image()
        ]);
        $item = Item::find($request->id);
        if ($request->photo != null) {
            $filePath = $request->file('photo')->store('photos', 'public');
            Storage::setVisibility($filePath, 'public');
            $item->photo_path = $filePath;
        }

        $item->name = $validated['name'];
        $item->description = $validated['description'];
        $item->is_feature = $request->is_feature == 'on' ?: false;
        $item->update();

        return redirect()->route('auction.list');
    }
    public function destroy(Item $item)
    {
        $auctionId = $item->auctionId;
        $item->delete();
        return redirect()->route('auction.show', ['id' => $auctionId]);
    }
}
