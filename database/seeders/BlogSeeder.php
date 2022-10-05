<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
//    public function run()
//    {
//        $cat = 1;
//        $subCat  =1;
//        for ($i=1; $i<=100; $i++){
//
//            DB::table('blogs')->insert([
//                'user_id'        => 1,
//                'category_id'    => $cat,
//                'subcategory_id' => $subCat,
//                'title'          => 'jnhjn',
//                'image_title'    => 'fn',
//                'image'          => 'fn',
//                'content'        => 'fn',
//            ]);
//
//            $cat < 6 ? $cat++ : $cat = 1;
//            $subCat < 4 ? $subCat++ : $subCat = 1;
//        }
//
//    }
}
