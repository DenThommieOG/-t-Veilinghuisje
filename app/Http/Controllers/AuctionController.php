<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{

    /**
     * Startpagina waar de eerst volgende veiling wordt getoond
     */
    public function index()
    {
        return view('auctions.index', [
            'auction' => Auction::where('end_time', '>', now()->toDateTimeLocalString())->orderBy('end_time')->first(),
        ]);
    }
    /**
     * Lijst pagina waar alle auctions worden getoond samen met een aantal items
     */
    public function list()
    {
        return view('auctions.list', [
            'auctions' => Auction::get(),
        ]);
    }

    /**
     * Archief pagina waar alle afgelopen auctions worden getoond samen met een aantal items
     */
    public function archive()
    {
        return view('auctions.list', [
            'winnerWillBeSelectedAuctions' => Auction::where('end_time', '<', now()->toDateTimeLocalString())->where('is_closed_for_selection', 0)->where('winners_selected', 0)->orderBy('end_time')->get(),
            'auctions' => Auction::onlyTrashed()->get(),
        ]);
    }
    /**
     * Aanmaak formulier
     */
    public function create()
    {
        return view('auctions.create');
    }
    /**
     * Slaag nieuwe auction op
     */
    public function store(Request $request)
    {
        //Valiodatie
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

        Auction::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_time' => $validated['startDate'],
            'end_time' => $validated['endDate']
        ]);
        return redirect()->route('auction.list');
    }

    /**
     * Toon geselecteerde auction, indien niet geselecteerd, selecteer de eerst komende auction
     */
    public function show($id = '')
    {
        if ($id == null) {
            $auction = Auction::where('end_time', '>', now()->toDateTimeLocalString())->orderBy('end_time')->first();
        } else {
            $auction = Auction::withTrashed()->find($id);
        }
        return view('auctions.show', [
            'auction' => $auction
        ]);
    }
}
