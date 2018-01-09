<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Elequent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name','last_name'
    ];

    protected $dates = ['delete_at'];
}
