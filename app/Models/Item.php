<?php

namespace App\Models;

use App\Models\Bid;
use App\Models\Auction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    public function auction()
    {

        return $this->belongsTo(Auction::class);
    }
    public function bids()
    {

        return $this->hasMany(Bid::class);
    }
    use HasFactory, SoftDeletes;
}
