<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}
