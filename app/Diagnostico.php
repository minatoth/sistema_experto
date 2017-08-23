<?php

namespace uno;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table = 'diagnostico';

    protected $fillable = [
        'codDia', 'fecDia','horDia','codPac','genPac','codUsu','codAgu','codCro','codCla','codHem','codVis','codCut','codMuc','codMal',
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

