<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ListingController extends Controller
{
    public function index(): Response
    {
        $listings = Listing::all()->each(
            fn ($listing) => $listing->thumb = asset('img/'.$listing->id.'/Image_1_thumb.jpg')
        );
        return Inertia::render('Listings/Index', [
            'listings' => $listings,
        ]);
    }

    public function create(): void
    {
        dd('create listing');
    }

    public function store(Request $request): void
    {
        dd($request->all());
        // Listing::create();
    }

    public function show(Listing $listing): Response
    {
        // dd($listing);
        for ($i = 1; $i <= 4; $i++) {
            $listing['image_' . $i] = asset(
                'images/' . $listing->id . '/Image_' . $i . '.jpg'
            );
        }
        // dd($listing);
        return Inertia::render('Listings/Show', [
            'listing' => $listing,
        ]);
    }

    public function edit(Listing $listing): void
    {
        dd($listing);
    }

    public function update(Listing $listing): void
    {
        dd($listing);
    }

    public function delete(Listing $listing): void
    {
        dd($listing);
    }
}
