<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['product_id', 'order_id','qtd'];
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
