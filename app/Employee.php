<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'ssn';
    public $incrementing = false;
    public $timestamps = false;



   protected $fillable = [
        'ssn', 'Fname', 'Minit', 'Lname', 'Bdate', 'Address','Sex','Salary','Super_ssn','Dno'
    ];

     public function depart()
    {
        return $this->hasOne(Department::class, 'Dnumber', 'Dno');
    }

    public function depen()
    {
        return $this->hasMany(Dependent::class, 'Essn', 'ssn');
    }

     public function works()
    {
        return $this->hasMany(Workson::class, 'Essn', 'ssn');
    }






}
