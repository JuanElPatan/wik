<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class animefavoritos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'animefavoritos';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_animes';
}
