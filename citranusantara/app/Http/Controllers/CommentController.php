<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($request->rating);
        $request->validate([
            'body' => 'required|string',
            'rating' => 'required|integer|min:1|max:5', // Add validation rules for rating
        ]);
        $imageName = NULL;
        if ($request->hasFile('image_comment')) {
            $imageName = uniqid() . '.' . $request->file('image_comment')->getClientOriginalExtension();
            $imagePath = $request->file('image_comment')->storeAs('image_comment', $imageName, 'public');
        }

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'image_comment' => $imageName,
            'body' => $request->body,
            'rating' => $request->rating, // Store the rating
        ]);
        $this->updatePostRating($request->post_id);

        return redirect()->route('posts.show', $request->post_id);
    }
    public function replyStore(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
        ]);
        // dd($request->post());
        // dd($request->hasFile('image_reply'));
        $imageName = NULL;
        if ($request->hasFile('image_reply') == 1) {
            $imageName = uniqid() . '.' . $request->file('image_reply')->getClientOriginalExtension();
            $imagePath = $request->file('image_reply')->storeAs('image_reply', $imageName, 'public');
        }

        CommentReply::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
            'image_reply' => $imageName,
            'body' => $request->body,
        ]);
        return back()->with('success', 'Reply posted successfully');
    }


    // calculate rating
    public function updatePostRating($postId)
    {
        
        $post = Post::find($postId);

        if (!$post) {
            return; 
        }

        // Calculate the average rating for the post
        $averageRating = Comment::where('post_id', $postId)->avg('rating');

        // Update the post's average rating
        $post->rating = $averageRating;
        $post->save();
    }
}
