<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'mobile',
        'whatsapp',
        'address',
        'married_status',
        'occupation',
        'religion',
        'father_name',
        'mother_name',
        'image',
    ];

    public static function saveProfile($request, $id=null){

        Profile::updateOrCreate(['id' => $id], [
            'user_id'        => isset($id) ? $id : Auth::user()->id,
            'age'            => $request->age,
            'mobile'         => $request->mobile,
            'whatsapp'       => $request->whatsapp,
            'address'        => $request->address,
            'married_status' => $request->married_status,
            'occupation'     => $request->occupation,
            'religion'       => $request->religion,
            'father_name'    => $request->father_name,
            'mother_name'    => $request->mother_name,
            'image'          => isset($id) ? (isset($request->image) ?
                                Helper::getImageUrl($request->image, 'asset/profile-image/', Profile::find($id)->image) : null ) :
                                (isset($request->image) ? Helper::getImageUrl($request->image, 'asset/profile-image/') : null),
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
