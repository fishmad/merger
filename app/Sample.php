<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'samples';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'email', 'date', 'description'];

}
