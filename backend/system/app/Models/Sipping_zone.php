<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sipping_zone extends Model
{
    use HasFactory;
    protected $fillable = ['zone','cost'];
}
