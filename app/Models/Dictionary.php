<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'dictionary';

    protected $fillable = [
        'name',
        'departament',
        'location',
        'municipality',
        'active_years',
        'person_type',
        'type_job'
    ];
}
