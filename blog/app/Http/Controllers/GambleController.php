<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GambleController extends Controller
{
    public function BJcounting()
    {
        return view('gamble_contents/Blackjack_counting');
    }
}
