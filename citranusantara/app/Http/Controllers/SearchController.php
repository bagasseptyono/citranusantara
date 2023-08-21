<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $category = $request->input('kategori');
        $provinceCode = $request->input('province');
        $cityCode = $request->input('city');
        $searchQuery = $request->input('search');
        $query = Post::query();

        // Filter by category
        if ($category && $category != 'Kategori') {
            $query->where('kategori', $category);
        }

        // Filter by province
        if ($provinceCode && $provinceCode != 'Provinsi') {
            $query->where('province', $provinceCode);
        }

        // Filter by city
        if ($cityCode && $cityCode != 'Kabupaten/Kota') {
            $query->where('city', $cityCode);
        }
        if ($searchQuery) {
            $query->where(function ($query) use ($searchQuery) {
                $query->where('judul', 'like', '%' . $searchQuery . '%')
                    ->orWhere('tarif', 'like', '%' . $searchQuery . '%')
                    ->orWhere('lokasi', 'like', '%' . $searchQuery . '%');
            });
        }
        // Get the filtered posts
        $posts = $query->get();

        foreach ($posts as $post) {
            $image = Image::where('post_id', $post->id)->first();
            $post->image_name = $image ? $image->name : null;
            $province = Province::where('code', $post->province)->first();
            $post->province_name = $province->name;
            $city = City::where('code', $post->city)->first();
            $post->city_name = $city->name;
        }
        if ($request->input('admin') && $request->input('admin')=='admin') {
            return view('admin.mypost', compact('posts'));
        } else {
            return view('posts.index', compact('posts'));
        }
        
        
    }

    public function searchByIdUser(Request $request)
    {
        $category = $request->input('kategori');
        $provinceCode = $request->input('province');
        $cityCode = $request->input('city');
        $searchQuery = $request->input('search');
        $user = Auth::user(); // Get the authenticated user
        $query = Post::query();

        // Filter by user ID
        $query->where('user_id', Auth::id());

        // Filter by category
        if ($category && $category != 'Kategori') {
            $query->where('kategori', $category);
        }

        // Filter by province
        if ($provinceCode && $provinceCode != 'Provinsi') {
            $query->where('province', $provinceCode);
        }

        // Filter by city
        if ($cityCode && $cityCode != 'Kabupaten/Kota') {
            $query->where('city', $cityCode);
        }
        if ($searchQuery) {
            $query->where(function ($query) use ($searchQuery) {
                $query->where('judul', 'like', '%' . $searchQuery . '%')
                    ->orWhere('tarif', 'like', '%' . $searchQuery . '%')
                    ->orWhere('lokasi', 'like', '%' . $searchQuery . '%');
            });
        }

        // Get the filtered posts
        $posts = $query->get();
        foreach ($posts as $post) {
            $image = Image::where('post_id', $post->id)->first();
            $post->image_name = $image ? $image->name : null;
            $province = Province::where('code', $post->province)->first();
            $post->province_name = $province->name;
            $city = City::where('code', $post->city)->first();
            $post->city_name = $city->name;
        }


        return view('user.mypost', compact('posts'));
    }
}
