<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = [ 'user_id', 'product_id', 'repair_id', 'quantity', 'summary_price', 'status' ];

    // Relations with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relations with product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
