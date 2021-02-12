<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;
    protected $fillable = ['step_position','category','sub_category','gender','name','address','age','dod','border','front_cover','back_cover','inside_right','inside_left','cover_type','photo','status'];
}
