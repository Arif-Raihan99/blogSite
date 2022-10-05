<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public static function saveRole($request, $id=null){

        Role::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug(),
        ]);

    }
}
