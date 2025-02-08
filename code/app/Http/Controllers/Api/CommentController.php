<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_name'  => 'required|string|max:255',
            'text'       => 'required|string',
            'rating'     => 'nullable|integer|min:1|max:5',
        ]);

        $comment = Comment::create([
            'product_id' => $request->input('product_id'),
            'user_name'  => $request->input('user_name'),
            'text'       => $request->input('text'),
            'rating'     => $request->input('rating'),
            'approved'   => false,
        ]);

        return response()->json($comment, 201);
    }
}
