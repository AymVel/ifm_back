<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Candidate extends Model
{
    protected $table="candidature";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_offre'
];

    public function Candidates()
    {
        return $this->hasMany(Candidate::class);
    }


}
