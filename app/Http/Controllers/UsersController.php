<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = User::all();
        return view('admin.users.index')->with('etudiants', $etudiants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'prenom'    => 'required|min:2',
            'nom'       => 'required|min:2',
            'adresse'   => 'required|min:2',
            'telephone' => 'required|min:7',
            'email'     => 'required|email'
        ]);

        $user = new User;
        $user->prenom    = $request->prenom;
        $user->nom       = $request->nom;
        $user->adresse   = $request->adresse;
        $user->telephone = $request->telephone;
        $user->avatar    = 'backend/users/default.png';
        $user->admin     = 0;
        $user->email     = $request->email;
        $user->password  = bcrypt('12345678');
        $user->save();

        toastr()->success('L\'étudiant(e) a bien été ajouté.');
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
        $etudiant = User::find($id);
        return view('admin.users.show')->with('etudiant', $etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant = User::find($id);
        return view('admin.users.edit')->with('etudiant', $etudiant);
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
            'prenom'    => 'required|min:2',
            'nom'       => 'required|min:2',
            'adresse'   => 'required|min:2',
            'telephone' => 'required|min:7',
            'email'     => 'required|email'
        ]);

        $etudiant = User::find($id);
        $etudiant->prenom   = $request->prenom;
        $etudiant->nom      = $request->nom;
        $etudiant->adresse  = $request->adresse;
        $etudiant->telephone = $request->telephone;
        $etudiant->email     = $request->email;
        $etudiant->save();

        toastr()->success('Étudiant(e) a été modifié avec succès.');
        return redirect()->route('etudiants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = User::find($id);
        $etudiant->delete();

        toastr()->success('Le compte étudiant(e) a bien été supprimé.');
        return redirect()->back();
    }


    
}
