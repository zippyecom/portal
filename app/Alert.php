<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'notification_text', 'to', 'from', 'link',
    ];
}
