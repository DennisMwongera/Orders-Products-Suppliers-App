<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupplierProducts;

class Products extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasMany(SupplierProducts::class);
    }
    
    
    protected $table = 'products';

    protected $fillable = [
        'name',
        'describtion',
        'quantity',
        'created_at'
    ];
}
