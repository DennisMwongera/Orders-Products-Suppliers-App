<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupplierProducts;

class Suppliers extends Model
{
    use HasFactory;
    public function suppliers()
    {
        return $this->hasMany(SupplierProducts::class);
    }

    protected $table = 'suppliers';
    protected $fillable = [
        'id',
        'name',
        'created_at'
    ];
}
