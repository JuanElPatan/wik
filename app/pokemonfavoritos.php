<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pokemonfavoritos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pokemonfavoritos';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pokemon';
}
