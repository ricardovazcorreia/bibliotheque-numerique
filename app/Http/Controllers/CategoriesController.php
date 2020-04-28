<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Livre;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => 'single']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Categorie::all();
        return view('admin.categories.index')->with('categories', $categories);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|min:2'
        ]);

        $categorie = new Categorie;
        $categorie->nom = $request->nom;
        $categorie->slug = Str::slug($request->nom);
        $categorie->save();

        toastr()->success('Categorie ajoutee avec success');

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        return view('admin.categories.edit')->with('categorie', $categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required|min:2'
        ]);

        $categorie = Categorie::find($id);
        $categorie->nom = $request->nom;
        $categorie->slug = Str::slug($request->nom);
        $categorie->save();

        toastr()->success('Categorie a été modifié.');

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();

        toastr()->success('Categorie supprimée');

        return redirect()->back();
    }


    /***
     * Show All Categories slug
     */
    public function single($slug) {
        $categorie = Categorie::where('slug', $slug)->first();

        $livres = Livre::where('categorie_id', $categorie->id)->get();
        return view('admin.livres.categorie')->with('livres', $livres)
                                             ->with('title', $categorie->nom);
    }
}
