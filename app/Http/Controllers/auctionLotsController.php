<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class auctionLotsController extends Controller
{
    public function index(): View
    {
//        return view('index',['lots' => Lots::all()]);
        return view('index', ['lots' => Lots::with('category')->get()]);
    }
}
