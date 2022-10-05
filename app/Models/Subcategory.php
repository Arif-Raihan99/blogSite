<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',
        'hit_count',
    ];

    public static function saveSubcategory($request, $id=null){

        Subcategory::updateOrCreate(['id' => $id], [
            'category_id' => $request->category_id,
            'name'        => Str::ucfirst($request->name),
            'slug'        => Str::of($request->name)->slug('-'),
        ]);
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
