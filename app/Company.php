<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo_path',
    ];

    /**
     * Get the employees of this company.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * The managers that may access this company. This only applies to users
     * with the "manager" role; the responsibility of ensuring that the pivot
     * table never references a user without the "manager" role is yours.
     */
    public function managers()
    {
        return $this->belongsToMany('App\User', 'company_manager');
    }
}
