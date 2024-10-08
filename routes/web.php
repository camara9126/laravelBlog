<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PubsController;
use App\Models\article;
use App\Models\Categorie;
use App\Models\contact;
use GuzzleHttp\Middleware;

// page d'accueil blog
Route::resource('/', HomeController::class);

// retourne '/' sur la route 'home'
// Route::get('/', function () {
//     return redirect()->intended(route('home.index', absolute: false));
// });

// mdp bdd-> Prc-y_v-A4Q9

// mdp email-> HtrXHEU#[$Zy

// page de about 
Route::get('/about', function () {
    $categorie= Categorie::all();
    return view('pages.about',compact('categorie'));
})->name('about');

// page pour tous les articles
Route::get('/articles', function () {
    $articles= article::all();
    $categorie= Categorie::all();
    return view('pages.article',compact('articles','categorie'));
})->name('articles');

// page pour les Politique de Confidentialité et Conditions d’Utilisation
Route::get('/politique', function () {
    $categorie= Categorie::all();
    return view('pages.politique',compact('categorie'));
})->name('politic');

// page de contact user
 Route::resource('/contact', ContactController::class);
 Route::get('/contact/{contact}',[ContactController::class, 'view'])->name('contact.view');
 Route::get('/contact/{contact}',[ContactController::class, 'destroy'])->name('contact.destroy');
 
 // page de message admin
 Route::get('/message', function () {
    $contact= contact::all();
    return view('contact.message', compact('contact'));
    })->middleware('auth','verified')->name('message');


// barre de recherche 
Route::resource('/search', SearchController::class);


//page de profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//page article de admin
Route::resource('/article', ArticleController::class)->middleware(['auth', 'verified']);
Route::get('/article/{article}', [ArticleController::class, 'view'])->name('article.view');

// route pour les pubs
Route::group(['middleware'=>'auth','verified'],
    function () {
        Route::resource('/pub', PubsController::class);
        Route::patch('/pub/{pub}/activate', [PubsController::class, 'activate'])->name('pub.activate');
        Route::patch('/pub/{pub}/deactivate', [PubsController::class, 'deactivate'])->name('pub.deactivate');
    }
);

// route pour les categories 

   Route::resource('/categorie', CategorieController::class);

//    code google analytic
//    <!-- Google tag (gtag.js) -->
//    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DDYJ6K18FP"></script>
//    <script>
//      window.dataLayer = window.dataLayer || [];
//      function gtag(){dataLayer.push(arguments);}
//      gtag('js', new Date());
   
//      gtag('config', 'G-DDYJ6K18FP');
//    </script>



// activer/desactiver un article 
Route::patch('/article/{article}/activate', [ArticleController::class, 'activate'])->name('article.activate');
Route::patch('/article/{article}/desactivate', [ArticleController::class, 'deactivate'])->name('article.deactivate');


// route pour les commentaires 
Route::post('/article/{article}/commentaire', [CommentaireController::class, 'store']);
Route::delete('/commentaire/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaire.destroy');
Route::get('/commentaire', [CommentaireController::class, 'index'])->name('commentaire');


// route dashboard 
Route::middleware('auth')->group(function(){
    Route::resource('/dashboard', DashboardController::class);
});

require __DIR__.'/auth.php';
