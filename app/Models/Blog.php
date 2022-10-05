<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Str;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'subcategory_id',
        'title',
        'tags',
        'content',
        'image',
        'image_title',
        'status',
        'hit_count',
        'total_comment',
    ];

    public static function saveBlog($request, $id=null){

        Blog::updateOrCreate(['id' => $id], [

            'user_id'        => Auth::user()->id,
            'category_id'    => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'title'          => Str::title($request->title),
            'tags'           => $request->tags,
            'content'        => $request->content,
            'image'          => isset($id) ?
                                Helper::getImageUrl($request->image, 'asset/blog-image/', Blog::find($id)->image) :
                                Helper::getImageUrl($request->image, 'asset/blog-image/'),
            'image_title'    => $request->image_title,
            'status'         => Auth::user()->role == 'user' ? 0 : 1,
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function comment(){
        return $this->hasOne(Comment::class, 'blog_id');
    }
}
