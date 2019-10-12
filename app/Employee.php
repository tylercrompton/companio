<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    /**
     * Get the company for which this employee works.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
