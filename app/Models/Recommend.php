<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'recommend';


    protected $guarded = [

        'created_at',
        'updated_at',

    ];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'products_id');
    }
}
