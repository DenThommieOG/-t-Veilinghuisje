<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{

    public function index()
    {
        return view('auctions.index');
    }

    public function list()
    {
        return view('auctions.list', [
            'auctions' => Auction::get(),
        ]);
    }
    public function create()
    {
        return view('auctions.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startdate'
        ]);
        if ($validated['endDate'] < now()->toDateTimeString()) {
            return back()->withErrors([
                'endDate' => 'De opgegeven einddatum is niet na de dag van vandaag',
            ]);
        }

        $auction = Auction::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_time' => $validated['startDate'],
            'end_time' => $validated['endDate']
        ]);
        return redirect()->route('auction.list');
    }
}
