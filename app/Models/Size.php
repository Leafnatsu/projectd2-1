<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'size';

    protected $guarded = [

        'created_at',
        'updated_at',

    ];

}
