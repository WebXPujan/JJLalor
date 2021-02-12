<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Step;


class Cover extends Model
{
    use HasFactory;
    protected $fillable = ['name','category','sub_category','cover_type','cover_type_html','cover_type_text','photo'];

    public static function getVerse($image){
        $data = DB::table('covers')->where('photo','=',$image)->get(['cover_type_html']);
        return $data[0]->cover_type_html;
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class);
    }
    
}
