<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $request->validate([
            'text'     => 'required|string',
            'rating'   => 'nullable|integer|min:1|max:5',
            'approved' => 'required|boolean',
        ]);

        $comment->update($request->only('text', 'rating', 'approved'));

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully.']);
    }
}
