<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class SupplierProducts extends Model
{
    use HasFactory;
    public function supplierProducts()
    {
        return $this->belongsTo(Products::class);
    }

    protected $table = 'supplier_products';
    protected $fillable = [
        'id',
        'supply_id',
        'product_id',
        'created_at'
    ];
}
