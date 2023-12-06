<?php

namespace App\Console\Commands;

use App\Mail\WinnerMail;
use App\Models\Auction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AuctionLotWinnerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auction-lot-winner-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a winner mail if an auction ended';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //haal alle verlopen auctions op, waar geen winnaar is geselecteerd maar wel een winnaar mag krijgen
        $auctions = Auction::where('end_time', '<',  now()->toDateTimeLocalString())->where('is_closed_for_selection', 0)->where('winners_selected', 0)->get();
        foreach ($auctions as $auction) {
            foreach ($auction->items as $item) {
                $bids = $item->bids;
                if ($bids->count() > 0) {
                    $max_bid = $bids->max('value');
                    $highest_bids = $bids->where('value', $max_bid);
                    //Als er meerdere keren hetzelfde hoogste bod is, kies random 1
                    if ($highest_bids->count() > 1) {
                        $winner = $highest_bids->random();
                    } else {
                        $winner = $highest_bids->first();
                    }


                    //slaag het winnende bod op en stuur een mail naar de winnaar
                    $winner->is_winner = 1;
                    $winner->save();
                    Mail::to($winner->user->email)->send(new WinnerMail($winner));
                }
            }
            //nadat alle items waar een bod op is een winaar hebben markeer de auction dat winnaars
            $auction->winners_selected = 1;
            $auction->save();
            $auction->delete();
        }
    }
}
