<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;

    protected $table = 'products';

    // protected $fillable = ['name','detail','price','image'];

    protected $guarded = [
        'created_at',
        // 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}

