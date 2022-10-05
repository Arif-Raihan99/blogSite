<?php


namespace App\helper;



use Faker\Core\File;

class Helper
{
    protected static $fileName;
    protected static $fileUrl;

//  To change status
    public static function changeStatus($row){
        $row->status = $row->status == 1 ? 0 : 1;
        $row->save();
    }

//  To count hit of any post
    public static function hitCount($row){
        $row->increment('hit_count');
        $row->save();
    }

//  Increase total_comment of any post
    public static function increaseTotalComment($row){
        $row->increment('total_comment');
        $row->save();
    }

//  Generate Image Url
    public static function getImageUrl($image, $imageDirectory, $existFileUrl=null)
    {
        if ($image) {
            if (file_exists($existFileUrl))
            {
                unlink($existFileUrl);
            }
            self::$fileName = time().rand(10,10000).'.'.$image->getClientOriginalExtension();
            $image->move($imageDirectory, self::$fileName);
            self::$fileUrl = $imageDirectory.self::$fileName;
        }
        else {
            if (isset($existFileUrl))
            {
                self::$fileUrl = $existFileUrl;
            } else {
                self::$fileUrl = '';
            }
        }
        return self::$fileUrl;
    }

}
