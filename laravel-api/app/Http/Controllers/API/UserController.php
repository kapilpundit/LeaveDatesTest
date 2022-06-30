<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $users = User::all();

        return response()->json(
            [
                'data' => [
                    'users' => $users,
                ]
            ],
            200
        );
    }
}
