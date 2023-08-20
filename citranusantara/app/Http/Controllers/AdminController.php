<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class AdminController extends Controller
{
    //
    public function userPost() {
        // if (!$user) {
        //     return redirect('/login');
        // }
        $posts = Post::get();
        foreach ($posts as $post) {
            $image = Image::where('post_id', $post->id)->first();
            $post->image_name = $image ? $image->name : null;
            $province = Province::where('code', $post->province)->first();
            $post->province_name = $province->name;
            $city = City::where('code', $post->city)->first();
            $post->city_name = $city->name;
        }
        return view('admin.mypost',compact('posts'));
    }
}
