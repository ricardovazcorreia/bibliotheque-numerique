<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Livre;
use Auth;
use Illuminate\Support\Str;

class LivresController extends Controller
{

    public function __construct() {
        $this->middleware('admin', ['except' => ['detail', 'lire']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livres = Livre::all();
        return view('admin.livres.index')->with('livres', $livres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.livres.create')->with('categories', $categories);
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
            'title'     => 'required|min:2',
            'livre'     => 'required',
            'auteur'    => 'required|min:2',
            'pages'     => 'required',
            'couverture' => 'required',
            'synopsis'  => 'required',
            'categorie_id' => 'required'
        ]);

        // Couverture
        $couverture = $request->couverture;
        $couverture_new_name = time().$couverture->getClientOriginalName();
        $couverture->move('backend/couvertures', $couverture_new_name);

        // Livre
        $livre = $request->livre;
        $livre_new_name = time().$livre->getClientOriginalName();
        $livre->move('backend/livres', $livre_new_name);

        $book = new Livre;
        $book->title        = $request->title;
        $book->slug         = Str::slug($request->title);
        $book->livre        = 'backend/livres/'.$livre_new_name;
        $book->auteur       = $request->auteur;
        $book->pages        = $request->pages;
        $book->couverture   = 'backend/couvertures/'.$couverture_new_name;
        $book->synopsis     = $request->synopsis;
        $book->categorie_id = $request->categorie_id;

        $book->save();

        toastr()->success('Livre a été ajouté avec succès.');
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
        $categories = Categorie::all();
        $livre = Livre::find($id);
        return view('admin.livres.edit')->with('livre', $livre)
                                        ->with('categories', $categories);
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
            'title'     => 'required|min:2',
            'auteur'    => 'required|min:2',
            'pages'     => 'required',
            'categorie_id' => 'required'
        ]);

        $livre =  Livre::find($id);

        // Check if file livre isn't empty
        if ($request->hasFile('livre')) {
            $book = $request->livre;
            $book_new_name = time().$book->getClientOriginalName();
            $book->move('backend/livres', $book_new_name);
            $livre->livre = 'backend/livres/'. $book_new_name;
        }

        // Check if file couverture isn't empty
        if ($request->hasFile('couverture')) {
            $couverture  = $request->couverture;
            $couverture_new_name = time().$couverture->getClientOriginalName();
            $couverture->move('backend/couvertures', $couverture_new_name);
            $livre->couverture = 'backend/couvertures/'.$couverture_new_name;
        }

        $livre->title        = $request->title;
        $livre->slug         = Str::slug($request->title);
        $livre->auteur       = $request->auteur;
        $livre->pages        = $request->pages;
        $livre->synopsis     = $request->synopsis;
        $livre->categorie_id = $request->categorie_id;
        $livre->save();

        toastr()->success('Livre mis à jour avec succès.');
        return redirect()->route('livres');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livre = Livre::find($id);
        $livre->delete();

        toastr()->success('Livre a été supprimé.');
        return redirect()->back();
    }


    /**
     * 
     */
    public function detail($slug) {

        $result = 0;
        
        // Recuperer le livre equivalent au slug transmis
        $livre  = Livre::where('slug', $slug)->first();

        /**
         * Recuperer id d'utilisateur connecte
         * Recuperer tous utilisateurs qui ont enregistre ce livre
         */
        $user_id = Auth::user()->id;
        $users = $livre->users;
        $sauvegarde = Auth::user()->livres;

        
        foreach($users as $usuario){
            foreach($sauvegarde as $stock) {
                if ($usuario->id == $user_id && $stock->id == $livre->id) {
                    $result = 1;
                }      
            }
        }
        //dd($result);
        //dd($user_id, $users->all());
        //dd($livre_id->all());
        
        return view('admin.livres.detail')->with('livre', $livre)
                                          ->with('result', $result);
    }

    /**
     * 
     */
    public function lire($slug) {
        $livre = Livre::where('slug', $slug)->first();
        return view('admin.livres.lire')->with('livre', $livre);
    }
}
