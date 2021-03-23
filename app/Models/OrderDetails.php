<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Products;

class OrderDetails extends Model
{
    use HasFactory;

    public function orderDetails()
    {
        return $this->belongsToMany('App\Models\Orders', 'App\Models\Products');
    }


    protected $fillable = [
        'id',
        'order_id',
        'product_id'
    ];
}
