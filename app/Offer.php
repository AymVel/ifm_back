<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    protected $table="offre";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'entreprise','poste','ville','code_postal','presentation',
        'activite','description'
];

    public function Offers()
    {
        return $this->hasMany(Offer::class);
    }


}
