<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable =  ['id',
            'judul',
            'deskripsi',
            'lokasi',
            'tarif',
            'kategori',
            'province',
            'city',
            'user_id'
        ];
}
