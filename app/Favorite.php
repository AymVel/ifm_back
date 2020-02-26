<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Favorite extends Model
{
    protected $table="favoris";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_offre'
];

    public function Favorites()
    {
        return $this->hasMany(Favorite::class);
    }


}
