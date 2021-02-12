<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name','address_one','address_two','address_three','country','postal_code','shipping_zone','email','phone','quantity','price','category','product_html','product_image_pdf'];
}
