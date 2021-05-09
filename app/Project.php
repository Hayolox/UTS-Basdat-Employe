<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'Pnumber';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'Pnumber', 'Pname', 'Plocation','Dnum'
    ];

    public function depart()
    {
        return $this->hasOne(Department::class, 'Dnumber', 'Dnum');
    }


}
