<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barcode extends Model
{
    protected $fillable = [
        'number', 'barcode'
    ];
}
