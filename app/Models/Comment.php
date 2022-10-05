<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
        'content',
        'like',
        'dislike',
        'status',
    ];

    public static function saveComment($request, $id){

        Comment::create([
            'user_id' => Auth::user()->id,
            'blog_id' => $id,
            'content' => $request->content,
            'status'  => 1,
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
