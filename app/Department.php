<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $primaryKey = 'Dnumber';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'Dnumber','Dname','Mgr_ssn','Mgr_start_date'
    ];

    public function locs()
    {
        return $this->hasOne(Deplocation::class, 'Dnumber', 'Dnumber');
    }
}
