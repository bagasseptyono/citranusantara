<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = DB::table('posts')->get();

        // $posts = Post::with(['image', 'province', 'city'])
        // ->orderByDesc('rating')
        // ->get();
        // foreach($posts as $post){
        //     dd($post->province);
        // }

        $posts = DB::table('posts')
            ->orderByDesc('rating')
            ->get();
        foreach ($posts as $post) {
            $image = Image::where('post_id', $post->id)->first();
            $post->image_name = $image ? $image->name : null;
            $province = Province::where('code', $post->province)->first();
            $post->province_name = $province->name;
            $city = City::where('code', $post->city)->first();
            $post->city_name = $city->name;
        }

        // $images = DB::table('images')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $province = Province::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        return view('posts.create', compact('province', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $userId = Auth::id();
        $request_data = $request->post();
        $request_data['user_id'] = $userId;
        $post = Post::create($request_data);

        foreach ($request->file('imageUpload') as $image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            // Store the image in the storage directory
            // $image->storeAs('public/images', $imageName);
            
                $image->storeAs('image_post', $imageName, 'public');

            // Create a new Image record in the database and associate it with the post
            Image::create([
                'post_id' => $post->id, // Associate with the post
                'name' => $imageName,
                // Add other image-related fields if needed
            ]);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $image = Image::where('post_id', $id)->get();
        $province = Province::where('code', $post->province)->first();
        $city = City::where('code', $post->city)->first();
        // $comments = Comment::where('post_id', $post->id)
        // ->with('user') // Eager load the associated user
        // ->orderBy('created_at')
        // ->get();
        $comments = Comment::with('replies', 'user')->where('post_id', $post->id)->get();
        return view('posts.detail', ['post' => $post], compact('province', 'city', 'image', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        
        $post = Post::find($id);
        if (Gate::denies('edit',$post)) {
            abort(403);
        }
        $image = Image::where('post_id', $id)->get();
        $province = Province::where('code', $post->province)->first();
        $city = City::where('code', $post->city)->first();
        $provinces = Province::all();
        $cities = City::all();
        return view('posts.edit', ['post' => $post], compact('province', 'city', 'image', 'provinces', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->judul = $request->judul;
        $post->deskripsi = $request->deskripsi;
        $post->lokasi = $request->lokasi;
        $post->tarif = $request->tarif;
        $post->kategori = $request->kategori;
        $post->province = $request->province;
        $post->city = $request->city;
        $post->save();
        // return redirect()->route('posts.show', $id);
        return redirect()->route('posts.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $images = Image::where('post_id', $id)->get();
        foreach ($images as $image) {
            $path = 'public/images/' . $image->name;
            if (Storage::exists($path)) {
                Storage::delete($path);
                Log::info('Deleted image: ' . $path);
            } else {
                Log::warning('Image not found: ' . $path);
            }
        }
        $delete = DB::table('images')->where('post_id', '=', $id)->delete();
        $post = Post::find($id)->delete();
        $delete;
        $post;
        return back()->with('success', 'Reply posted successfully');
    }

    public function reportPost(Request $request, $postId)
    {
        $user = Auth::user();

        $this->validate($request, [
            'reason' => 'required',
        ]);

        $post = Post::findOrFail($postId);
        $report = new PostReport();
        $report->user_id = $user->id;
        $report->post_id = $post->id;
        $report->reason = $request->input('reason');
        $report->save();

        return redirect()->back()->with('success', 'Post reported successfully.');
    }
}
