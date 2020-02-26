<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $table="profil";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nom','prenom','ville','email','tel','type_contrat',
        'emploi_recherche','localisation','rayon','disponibilite',
        'ad_cv','ad_photo'
];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }


}
