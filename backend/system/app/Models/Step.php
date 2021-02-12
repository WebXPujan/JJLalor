<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable =['category','sub_category','step_position','step_name','cover_type','step_type','description'];

    public function parent()
    {
        return $this->belongsTo('covers', 'cover_type');
    }

    public function step_body_content()
    {
        return $this->hasMany('App\Models\Cover', 'cover_type','cover_type');        
    }
}
