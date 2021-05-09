<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deplocation extends Model
{
    protected $table = 'dept_locations';
    protected $primaryKey = 'Dnumber';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'Dnumber', 'Dlocation'
    ];

     public function depart()
    {
        return $this->hasOne(Department::class, 'Dnumber', 'Dnumber');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Essn', 'ssn');
    }

}
