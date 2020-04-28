<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{

    /**
     * Les attributs qui sont assignables en masse.
     */ 
    protected $fillable = [
        'title', 'slug', 'livre', 'auteur', 'pages', 'couverture', 'synopsis', 'categorie_id'
    ];

    // Relation Livre et Categorie
    public function categorie() {
        return $this->belongsTo('App\Categorie');
    }

    /**
     * Relation Livre et User
     * Un Livre peut etre enregistre pour un ou n users
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
