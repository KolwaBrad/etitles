<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use App\Models\Subcounty;
use App\Models\Admin;
use Session;
use Hash;

class MarketPlace extends Controller
{
    //
    public function markettitles() {
        $anyUserId = session('anyUserId');
        $titles = Title::where('market', 1)
    ->whereNotIn('owner_id', [$anyUserId])
    ->get();
        return view('market.allmarketplace', compact('titles'));
    }

    public function allmarketplace() {
        return view("market.allmarketplace");
    }

}
