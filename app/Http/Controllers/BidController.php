<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Mail\BidPlacedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BidController extends Controller
{
    /**
     * Slaag een nieuw bod op
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'itemId' => 'required|integer',
            'value' => 'required|numeric|min:0.01',
        ]);
        $bid = new Bid();
        $bid->user_id = Auth()->id();
        $bid->item_id = $validated['itemId'];
        $bid->value = $validated['value'];
        $bid->save();

        Mail::to(Auth()->user()->email)->send(new BidPlacedMail($bid));

        return redirect()->route('homepage');
    }

    /**
     * Toon alle biedingen van een gebruiker
     */
    public function show()
    {
        return view('auctions.bids.show', [
            'bids' => Bid::where('user_id', Auth()->id())->get()
        ]);
    }
}
