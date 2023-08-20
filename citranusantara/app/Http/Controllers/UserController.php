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

class UserController extends Controller
{
    //

    public function index(){
        $user = Auth::id();
        $info = User::where('id',$user)->first();
        $province = Province::where('code', $info->province)->first();
        $city = City::where('code', $info->city)->first();
        // dd($info);
        return view('user.profile', ['info' => $info], compact('province','city'));
    }

    public function userPost() {
        $user = Auth::id();
        // if (!$user) {
        //     return redirect('/login');
        // }
        $posts = Post::where('user_id', $user)->get();
        foreach ($posts as $post) {
            $image = Image::where('post_id', $post->id)->first();
            $post->image_name = $image ? $image->name : null;
            $province = Province::where('code', $post->province)->first();
            $post->province_name = $province->name;
            $city = City::where('code', $post->city)->first();
            $post->city_name = $city->name;
        }
        return view('user.mypost',compact('posts'));
    }

    public function userEdit(){
        $user = Auth::id();
        $info = User::where('id',$user)->first();
        $province = Province::where('code', $info->province)->first();
        $city = City::where('code', $info->city)->first();
        // dd($info);
        return view('user.edit', ['info' => $info], compact('province','city'));
    }

    public function userUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'no_hp' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable',
            'province' => 'nullable',
            'city' => 'nullable',
            'image_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules
        ]);

        $userId = Auth::id();
        $user = User::find($userId);

        

        // Update user information
        $user->name = $request->input('name');
        $user->no_hp = $request->input('no_hp');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->alamat = $request->input('alamat');
        $user->province = $request->input('province');
        $user->city = $request->input('city');

        // Handle image upload
        if ($request->hasFile('image_profile')) {
            if ($user->image_profile) {
                $path = 'public/image_profile/' . $user->image_profile;
                Storage::delete($path);
            }
            $imageName = uniqid() . '.' . $request->file('image_profile')->getClientOriginalExtension();
            $imagePath = $request->file('image_profile')->storeAs('image_profile', $imageName, 'public');
            $user->image_profile = $imageName;
        }

        $user->save();

        return redirect()->route('user-index')->with('success', 'User information updated successfully.');
    }
}
