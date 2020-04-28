<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    /**
     * Les attributs qui sont assignables en masse.
     */ 
    protected $fillable = ['nom', 'slug'];

    // Relation Categorie entre Livres
    public function livres() {
        return $this->hasMany('App\Livre');
    }
}
