<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function show(Listing $listing): void
    {
        dd($listing);
    }
}
