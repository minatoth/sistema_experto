<?php

namespace uno;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table = 'paciente';

    protected $fillable = [
        'codPac', 'nomPac','apePac','fecPac','genPac','ciPac','exPac','telPac','ocuPac','dirPac',
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

