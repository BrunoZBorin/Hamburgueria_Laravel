<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = ['value', 'status', 'datetime','client_id'];
    public function orders_products()
    {
        return $this->hasMany(Orders_Products::class);
    }
    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
