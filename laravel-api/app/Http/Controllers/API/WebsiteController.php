<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function show(Request $request)
    {
        $websites = Website::all();

        return response()->json(
            [
                'data' => [
                    'websites' => $websites,
                ]
            ],
            200
        );
    }

    public function subscribe(User $user, Website $website)
    {
        if (! $user->websites->contains($website->id)) {
            $user->websites()->attach($website->id);
        }

        return response()
                ->json(
                    [
                        'user' => new UserResource($user),
                    ],
                    200
                );
    }
}
