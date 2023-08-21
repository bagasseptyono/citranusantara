<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable =  [
        'id',
        'user_id',
        'post_id',
        'body',
        'image_comment',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }

    public function reports()
{
    return $this->hasMany(CommentReport::class);
}
}
