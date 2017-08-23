<?php

namespace uno;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
     //
    protected $table = 'enfermedad';

    protected $fillable = [
        'conEnf', 'nomEnf','desEnf','tipEnf',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id',
    ];
}
