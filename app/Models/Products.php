<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name','detail','price','image'];
    // protected $guarded = [
    //     'created_at',
    //     'updated_at',
    // ];
    public function type_products()
    {
        return $this->belongsTo(TypeProduct::class, 'id_category', 'id');
    }
}

