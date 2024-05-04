<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ListingController extends Controller
{
    public function index(): Response
    {
        $listings = Listing::all([
            'id', 'address', 'title', 'price_per_night'
        ])->each(
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
        $listing->images = collect([]);
        for ($i = 1; $i <= 4; $i++) {
            $listing->images->push(asset(
                'img/' . $listing->id . '/Image_' . $i . '.jpg'
            ));
        }
        // dd($listing);
        return Inertia::render('Listings/Show', [
            'listing' => $listing,
        ]);
    }

    public function toggleSaved(User $user, Listing $listing, Request $request)
    {
        if ($user->saved_listings === null) {
            $user->saved_listings = [$listing->id];
        } else {
            if (in_array($listing->id, $user->saved_listings)) {
                $filtered = collect($user->saved_listings)
                    ->filter(fn ($item) => $item !== $listing->id);
                $user->saved_listings = [...$filtered];
            } else {
                $user->saved_listings = [...$user->saved_listings, $listing->id];
            }
        }
        $user->save();
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
