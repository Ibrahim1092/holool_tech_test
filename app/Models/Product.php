<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'images',
        'price'
    ];
    public function order()
    {
        return $this->belongsToMany(' App\Models\Order','product_orders','product_id','order_id');
    }
}
