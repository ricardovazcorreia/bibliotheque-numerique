<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Livre;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        
        $categories = Categorie::all();
        $livres     = Livre::all();
        $categories_count = Categorie::all()->count();
        $livres_count     = Livre::all()->count();
        $etudiants_count  = User::all()->count();
        
        return view('home')->with('categories_count', $categories_count)
                           ->with('livres_count', $livres_count)
                           ->with('etudiants_count', $etudiants_count)
                           ->with('categories', $categories)
                           ->with('livres', $livres);
    }
}
