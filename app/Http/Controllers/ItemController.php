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
    /**
     * Aanmaak formulier van een item voor een specifieke auction
     */
    public function create($id)
    {
        return view('auctions.items.create', [
            'auction' => Auction::find($id),
        ]);
    }
    /**
     * Slaag een item op
     */
    public function store(Request $request)
    {
        //Validatie
        $validated = $request->validate([
            'auctionId' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required', File::image()
        ]);

        //Bestand opslaan (vergeet geen storage:link te proberen indien bestand opslaan niet werkt)
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
    /**
     * Toon item detailpagina, met indien beschikbaar, het laatste bod
     */
    public function show($id)
    {
        return view('auctions.items.show', [
            'item' => Item::find($id),
            'lastBid' => Bid::where('item_id', $id)->where('user_id', Auth()->id())->orderBy('created_at')->first(),
        ]);
    }

    /**
     * Bewerk formulier bestaand item
     */
    public function edit($id)
    {
        return view('auctions.items.edit', [
            'item' => Item::find($id),
        ]);
    }
    /**
     * Update een bestaand item
     */
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

    /**
     * Verwijder een item
     */
    public function destroy(Item $item)
    {
        $auctionId = $item->auctionId;
        $item->delete();
        return redirect()->route('auction.show', ['id' => $auctionId]);
    }
}
