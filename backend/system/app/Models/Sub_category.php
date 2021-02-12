<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Sub_category extends Model
{
    use HasFactory;
    protected $fillable = ['name','category','slug','image','height','width'];

    public static function getAll(){
        $data = DB::table('sub_categories')->get();
        return $data;
    }

    public static function getName($id){
        $data = DB::table('sub_categories')->where('id','=',$id)->get();
        return $data[0]->name;
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category');
    }

   
}
