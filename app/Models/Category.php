<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'hit_count',
    ];

    public static function saveCategory($request, $id=null){
        Category::updateOrCreate(['id' => $id], [
            'name' => Str::ucfirst($request->name),
            'slug' => Str::of($request->name)->slug('-'),
        ]);
    }

    public function subcategory(){
        return $this->hasOne(Subcategory::class, 'category_id');
    }

}
