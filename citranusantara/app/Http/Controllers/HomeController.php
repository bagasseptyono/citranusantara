<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class HomeController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->orderByDesc('rating') // Order by rating in descending order
            ->take(6) // Retrieve only the top 6 posts
            ->get();
        foreach ($posts as $post) {
            $image = Image::where('post_id', $post->id)->first();
            $post->image_name = $image ? $image->name : null;
            $province = Province::where('code', $post->province)->first();
            $post->province_name = $province->name;
            $city = City::where('code', $post->city)->first();
            $post->city_name = $city->name;
        }

        return view('index', compact('posts'));
    }
}
