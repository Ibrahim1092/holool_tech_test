<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_price'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_orders','product_id','order_id');
    }
}
