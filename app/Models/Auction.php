<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use HasFactory, SoftDeletes;

    public function items()
    {

        return $this->hasMany(Item::class);
    }
    public function getFeaturedItems()
    {
        $auction = $this;
        $feauturedItems = Item::where('auction_id', $auction->id)->where('is_feature', true)->get();
        if ($feauturedItems->count() < 3) {
            $allItems = Item::where('auction_id', $auction->id)->inRandomOrder()->get();
            foreach ($allItems as $item) {
                if (!$feauturedItems->contains($item)) {
                    $feauturedItems->push($item);
                    if ($feauturedItems->count() >= 3) {
                        break;
                    }
                }
            }
        }
        return $feauturedItems;
    }
    protected  $fillable = [
        'name',
        'description',
        'start_time',
        'end_time'
    ];
}
