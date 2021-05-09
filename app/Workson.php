<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workson extends Model
{
    protected $table = 'works_on';
    protected $primaryKey = 'Id_Works';
    public $timestamps = false;



    protected $fillable = [
        'Essn','Pno','Hours'
    ];



    public function employee()
    {
        return $this->hasMany(Employee::class, 'ssn', 'Essn');
    }

    public function projects()
    {
        return $this->hasOne(Project::class, 'Pnumber', 'Pno');
    }





}
