<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable =  [
        'id',
        'judul',
        'deskripsi',
        'lokasi',
        'tarif',
        'kategori',
        'province',
        'city',
        'user_id',
        'rating'
    ];
    public function image()
    {
        return $this->hasOne(Image::class, 'post_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province', 'code');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city', 'code');
    }
    public function getImageNameAttribute()
    {
        // Calculate or fetch the image name here
        $image_name = Image::where('post_id', $this->id)->first();
        return $image_name ? $image_name->name : null;
    }

    public function reports()
    {
        return $this->hasMany(PostReport::class);
    }
}
