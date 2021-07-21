<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = "products";
    public $timestamps = false;

    protected $fillable = [
        'productID',
        'categoryID',
        'productName',
        'productImage',
        'listPrice',
        'discountPercent',
        'description',
        'created_at',
        'updated_at',
    ];
}
