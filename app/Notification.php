<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey= 'id_notif';
    public $timestamps = false;

    protected $fillable = [
        'id_notif', 'essn', 'notif'
    ];
}
