<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentReply;
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

        return redirect()->route('posts.show',$request->post_id);
    }
    public function replyStore(Request $request){
        $request->validate([
            'body' => 'required|string',
        ]);
        // dd($request->post());
        // dd($request->hasFile('image_reply'));
        $imageName = NULL;
        if ($request->hasFile('image_reply')==1) {
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
}
