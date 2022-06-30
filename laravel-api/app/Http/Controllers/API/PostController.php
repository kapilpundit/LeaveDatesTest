<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create(Request $request, Website $website)
    {
        $validator = Validator::make(
            $request->all(),
            [
                // 'title' => 'required|unique:posts|max:255',
                'body' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()
                ->json(
                    $validator->errors(),
                    422
                );
        }

        $post = new Post(
            [
                'title' => $request->title,
                'body' => $request->body,
            ]
        );

        $website->posts()->save($post);

        return response()
                ->json(
                    [
                        'post' => $post,
                    ],
                    200
                );
    }
}
