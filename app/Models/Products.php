<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    // protected $fillable = ['name','detail','price','image'];

    protected $guarded = [

        'created_at',
        'updated_at',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
}

