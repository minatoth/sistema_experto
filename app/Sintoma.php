<?php

namespace uno;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    //
    protected $table = 'sintomas';

    protected $fillable = [
        'codSin', 'nomSin','desSin',
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
