<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'cart';

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
