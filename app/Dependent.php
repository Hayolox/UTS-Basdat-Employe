<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    protected $table = 'dependent';
    protected $primaryKey = 'Id_Dependent';
    public $timestamps = false;

    public function employe()
    {
        return $this->hasMany(Employee::class, 'ssn', 'Essn');
    }

    protected $fillable = [
        'Dependent_name','Essn','sex','Bdate','Relationship'
    ];

}
