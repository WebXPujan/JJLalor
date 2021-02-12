<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price_include extends Model
{
    use HasFactory;

    protected $fillable = ['category','additional_qty','additional_price','includes'];
}
