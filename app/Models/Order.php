<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = ['status'];

    protected $guarded = [

        'created_at',
        'updated_at',

    ];

    public function carts() : HasMany
    {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
