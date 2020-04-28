<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function() {
    //return App\Livre::find(4)->categorie->nom;
    //return Auth::user()->livres;
    //return ;
    /*
    $user =  App\Livre::find(2)->users;
    foreach($user as $u) {
        if ($u->id == 1) {
            return $u;
        }
    }
    */
    
    
});

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('/home', 'HomeController@index')->name('home');
    

    Route::get('results', function() {
       
        if (is_null(request('recherche'))) {
            
            return redirect()->back();
        }
        
        $livres = \App\Livre::where('title', 'like', '%' .request('recherche') . '%')->get();
        
        return view('admin.results')->with('livres', $livres)
                                    ->with('title', 'Résultats de recherche :' .request('recherche'))
                                    ->with('recherche', request('recherche'));
    })->name('results');
    /***************************
     * Routes Categories
     ***************************/
    Route::get('categories', [
        'uses' => 'CategoriesController@index',
        'as'   => 'categories'
    ]);
    Route::get('categorie/create', [
        'uses' => 'CategoriesController@create',
        'as'    => 'categorie.create'
    ]);
    Route::post('categorie/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'categorie.store'
    ]);
    Route::get('categorie/edit/{id}', [
        'uses'  => 'CategoriesController@edit',
        'as'    => 'categorie.edit'
    ]);
    Route::post('categorie/update/{id}', [
        'uses'  => 'CategoriesController@update',
        'as'    => 'categorie.update'
    ]);
    Route::get('categorie/delete/{id}', [
        'uses'  => 'CategoriesController@destroy',
        'as'    => 'categorie.delete'
    ]);
    Route::get('categorie/{slug}', [
        'uses'  => 'CategoriesController@single',
        'as'    => 'categorie'
    ]);

    /**
     * Routes Livres
     */
    Route::get('livres', [
        'uses'  => 'LivresController@index',
        'as'    => 'livres'
    ]);
    Route::get('livre/create', [
        'uses' => 'LivresController@create',
        'as'   => 'livre.create',
    ]);
    Route::post('livre/store', [
        'uses'  => 'LivresController@store',
        'as'    => 'livre.store'
    ]);
    Route::get('livre/edit/{id}', [
        'uses'  => 'LivresController@edit',
        'as'    => 'livre.edit'
    ]);
    Route::post('livre/update/{id}', [
        'uses'  => 'LivresController@update',
        'as'    => 'livre.update'
    ]);
    Route::get('livre/delete/{id}', [
        'uses'  => 'LivresController@destroy',
        'as'    => 'livre.delete'
    ]);
    Route::get('livre/detail/{slug}', [
        'uses'  => 'LivresController@detail',
        'as'    => 'livre.detail'
    ]);
    Route::get('livre/lire/{slug}', [
        'uses'  => 'LivresController@lire',
        'as'    => 'livre.lire'
    ]);

    /**
     * Routes Etudiants
     */
    Route::get('etudiants', [
        'uses' => 'UsersController@index',
        'as'   => 'etudiants'
    ]);
    Route::get('etudiant/create', [
        'uses'  => 'UsersController@create',
        'as'    => 'etudiant.create'
    ]);
    Route::post('etudiant/store', [
        'uses'  => 'UsersController@store',
        'as'    => 'etudiant.store'
    ]);
    Route::get('etudiant/edit/{id}', [
        'uses'  => 'UsersController@edit',
        'as'    => 'etudiant.edit'
    ]);
    Route::get('etudiant/show/{id}', [
        'uses'  => 'UsersController@show',
        'as'    => 'etudiant.show'
    ]);
    Route::post('etudiant/update/{id}', [
        'uses'  => 'UsersController@update',
        'as'    => 'etudiant.update'
    ]);
    Route::get('etudiant/delete/{id}', [
        'uses'  => 'UsersController@destroy',
        'as'    => 'etudiant.delete'
    ]);

    /****
     * Routes Livrary ()
     */
    Route::get('livrary', [
        'uses'  => 'LivraryController@index',
        'as'    => 'livrary'
    ]);
    Route::get('livrary/store/{slug}', [
        'uses'  => 'LivraryController@store',
        'as'    => 'livrary.store'
    ]);

    Route::get('livrary/retirer/{slug}', [
        'uses'  => 'LivraryController@retirer',
        'as'    => 'livrary.retirer'
    ]);

    


    /**
     * Profil 
     */
    Route::get('etudiant/profil', [
        'uses'  => 'ProfilsController@index',
        'as'    => 'etudiant.profil'
    ]);

    Route::post('profil/update/{id}', [
        'uses'  => 'ProfilsController@update',
        'as'    => 'profil.update'
    ]);


});


