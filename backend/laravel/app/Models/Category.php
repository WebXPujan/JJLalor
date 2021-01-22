<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image'];

    public static function getName($id){
        $data = DB::table('categories')->where('id','=',$id)->get();
        return $data[0]->name;
    }

    public static function getAll(){
        $data = DB::table('categories')->get();
        return $data;
    }
}
