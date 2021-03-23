<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetails;

class Orders extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->hasMany(OrdersDetails::class);
    }
    protected $fillable = [
        'id',
        'order_number',
        'created_at'
    ];

}
