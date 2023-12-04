<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bid extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
