<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(Request $request, $slug) {
        $item = TravelPackage::with('galleries')->where('slug', $slug)->firstOrFail();
        
        return view('pages.details', [
            'item' => $item
        ]);
    }
}
