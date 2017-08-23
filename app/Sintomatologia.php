<?php

namespace uno;

use Illuminate\Database\Eloquent\Model;

class Sintomatologia extends Model
{
    //
    protected $table = 'sintomatologia';

    protected $fillable = [
        'codEnf', 'conSint',
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
